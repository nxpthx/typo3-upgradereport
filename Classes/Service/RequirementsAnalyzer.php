<?php
/**
 *  Copyright notice
 *
 *  ⓒ 2014 Michiel Roos <michiel@maxserv.nl>
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is free
 *  software; you can redistribute it and/or modify it under the terms of the
 *  GNU General Public License as published by the Free Software Foundation;
 *  either version 2 of the License, or (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful, but
 *  WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY
 *  or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for
 *  more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 */

/**
 * Class CheckRegistry
 */
class Tx_Smoothmigration_Service_RequirementsAnalyzer implements t3lib_Singleton {

	/**
	 * @var integer
	 */
	protected $runningTypo3Version = 0;

	/**
	 * @var integer
	 */
	protected $runningPhpVersion = 0;

	/**
	 * @var array
	 */
	protected $installedPhpExtensions = array();

	/**
	 * @var array
	 */
	protected $installedTypo3Extensions = array();

	/**
	 * Creating the RequirementsAnalyzer
	 */
	public function __construct() {
		$this->runningTypo3Version = t3lib_utility_VersionNumber::convertVersionNumberToInteger(TYPO3_version);
		$this->runningPhpVersion = t3lib_utility_VersionNumber::convertVersionNumberToInteger(phpversion());
		$this->installedPhpExtensions = get_loaded_extensions();
	}

	/**
	 * @param Tx_Smoothmigration_Domain_Interface_Requirements $check
	 *
	 * @return boolean
	 */
	public function isActive(Tx_Smoothmigration_Domain_Interface_Requirements $check) {
		$active = TRUE;

		$active = ($active && $this->checkTypo3Version($check));
		$active = ($active && $this->checkPhpVersion($check));
		$active = ($active && $this->checkPhpExtensions($check));
		$active = ($active && $this->checkTypo3Extensions($check));

		return $active;
	}

	/**
	 * @param Tx_Smoothmigration_Domain_Interface_Requirements $check
	 *
	 * @return boolean
	 */
	protected function checkTypo3Version(Tx_Smoothmigration_Domain_Interface_Requirements $check) {
		$minimalTypo3Version = t3lib_utility_VersionNumber::convertVersionNumberToInteger(trim($check->getMinimalTypo3Version()) ?: '0.0.0');
		$maximalTypo3Version = t3lib_utility_VersionNumber::convertVersionNumberToInteger(trim($check->getMaximalTypo3Version()) ?: '99.0.0');

		return $this->checkVersionRange($this->runningTypo3Version, $minimalTypo3Version, $maximalTypo3Version);
	}

	/**
	 * @param Tx_Smoothmigration_Domain_Interface_Requirements $check
	 *
	 * @return boolean
	 */
	protected function checkPhpVersion(Tx_Smoothmigration_Domain_Interface_Requirements $check) {
		$minimalPhpVersion = t3lib_utility_VersionNumber::convertVersionNumberToInteger(trim($check->getMinimalPhpVersion()) ?: '0.0.0');
		$maximalPhpVersion = t3lib_utility_VersionNumber::convertVersionNumberToInteger(trim($check->getMaximalPhpVersion()) ?: '99.0.0');

		return $this->checkVersionRange($this->runningPhpVersion, $minimalPhpVersion, $maximalPhpVersion);
	}

	/**
	 * @param Tx_Smoothmigration_Domain_Interface_Requirements $check
	 *
	 * @return boolean
	 */
	protected function checkPhpExtensions(Tx_Smoothmigration_Domain_Interface_Requirements $check) {
		$checkActive = TRUE;

		$requiredExtensions = $check->getRequiredAvailablePhpModules();
		foreach ((array)$requiredExtensions as $extension) {
			if (!in_array($extension, $this->installedPhpExtensions)) {
				$checkActive = FALSE;
				break;
			}
		}

		$nonAllowedExtensions = $check->getRequiredAbsentPhpModules();
		foreach ((array)$nonAllowedExtensions as $extension) {
			if (in_array($extension, $this->installedPhpExtensions)) {
				$checkActive = FALSE;
				break;
			}
		}

		return $checkActive;
	}

	/**
	 * @param Tx_Smoothmigration_Domain_Interface_CheckRequirements $check
	 *
	 * @return boolean
	 */
	protected function checkTypo3Extensions(Tx_Smoothmigration_Domain_Interface_Requirements $check) {
		if (count($this->installedTypo3Extensions) == 0) {
			$this->initializeTypo3ExtensionArray();
		}
		$checkActive = TRUE;

		$requiredExtensions = $check->getRequiredExtensions();
		if (count($requiredExtensions) > 0) {
			$requiredExtensions = $this->normalizeExtensionRequirementArray($requiredExtensions);
			foreach ($requiredExtensions as $extensionKey => $versionRequirements) {
				if (!array_key_exists($extensionKey, $this->installedTypo3Extensions) ||
				    !$this->checkVersionRange($this->installedTypo3Extensions[$extensionKey], $versionRequirements['minimum'], $versionRequirements['maximum'])
				) {
					$checkActive = FALSE;
					break;
				}
			}
		}
		$conflictingExtensions = $check->getConflictingExtensions();
		if ($checkActive && count($conflictingExtensions) > 0) {
			$conflictingExtensions = $this->normalizeExtensionRequirementArray($conflictingExtensions);
			foreach ($conflictingExtensions as $extensionKey => $versionRequirements) {
				if (array_key_exists($extensionKey, $this->installedTypo3Extensions) &&
				    $this->checkVersionRange($this->installedTypo3Extensions[$extensionKey], $versionRequirements['minimum'], $versionRequirements['maximum'])
				) {
					$checkActive = FALSE;
					break;
				}
			}
		}

		return $checkActive;
	}

	/**
	 * @param array $data
	 *
	 * @return array
	 */
	protected function normalizeExtensionRequirementArray(array $data) {
		$normalizedData = array();

		foreach ($data as $key => $value) {
			if (is_numeric($key)) {
				$normalizedData[trim($value)] = array(
					'minimum' => 0,
					'maximum' => 9999999
				);
			} else {
				$normalizedData[trim($key)] = array();
				$versionNumbers = t3lib_div::trimExplode('-', $value, FALSE, 2);

				if (empty($versionNumbers[0])) {
					$normalizedData[trim($key)]['minimum'] = 0;
				} else {
					$normalizedData[trim($key)]['minimum'] = t3lib_utility_VersionNumber::convertVersionNumberToInteger($versionNumbers[0]);
				}

				if (empty($versionNumbers[1])) {
					$normalizedData[trim($key)]['maximum'] = 9999999;
				} else {
					$normalizedData[trim($key)]['maximum'] = t3lib_utility_VersionNumber::convertVersionNumberToInteger($versionNumbers[1]);
				}
			}
		}

		return $normalizedData;
	}

	/**
	 * Loads all Extension-Versions from ext_emconf files
	 *
	 * @return void
	 */
	protected function initializeTypo3ExtensionArray() {

		foreach (array_keys($GLOBALS['TYPO3_LOADED_EXT']) as $extensionKey) {
			if ($extensionKey !== '_CACHEFILE') {
				$this->installedTypo3Extensions[$extensionKey] = t3lib_extMgm::getExtensionVersion($extensionKey);
			}
		}
	}

	/**
	 * @param integer $actual
	 * @param integer $minimum
	 * @param integer $maximum
	 *
	 * @return boolean
	 */
	protected function checkVersionRange($actual, $minimum, $maximum) {
		return $actual >= $minimum && $actual <= $maximum;
	}
}
