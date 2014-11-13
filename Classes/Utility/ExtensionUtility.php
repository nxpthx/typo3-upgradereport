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
 * Class Tx_Smoothmigration_Utility_ExtensionUtility
 */
class Tx_Smoothmigration_Utility_ExtensionUtility implements t3lib_Singleton {

	/**
	 * @var null
	 */
	static $installedExtensions = NULL;

	/**
	 * @var null
	 */
	static $loadedExtensions = NULL;

	/**
	 * @var null
	 */
	static $loadedExtensionsFiltered = NULL;

	/**
	 * Current TYPO3 LTS version
	 */
	const CURRENT_LTS_VERSION = '6.2.0';

	/**
	 * Get extensions wich claim to be compatible in their ext_emconf.php
	 *
	 * Note that we are ignoring open ended comatibility here. These are the
	 * cases where the version requirements have a 0.0.0 at the end. This is
	 * because we assume that extension creators that care about compatibilty
	 * will specify the maximum supported version instead of providing a 0.0.0
	 * as upper limit.
	 *
	 * @param string $version The version to check against
	 * @param boolean $ignoreOpenEnd Should we ignore open ended requirements?
	 *
	 * @return array Array of compatible extension keys and their version ranges
	 */
	public static function getCompatibleExtensions($version = NULL, $ignoreOpenEnd = TRUE) {
		if ($version === NULL) {
			$version = self::CURRENT_LTS_VERSION;
		}
		$compatibleExtensions = array();
		$list = self::getInstalledExtensions();
		foreach ($list as $extensionName => $extensionData) {
			if (isset($extensionData['EM_CONF']['constraints']['depends']['typo3'])) {
				$versionRange = tx_em_Tools::splitVersionRange($extensionData['EM_CONF']['constraints']['depends']['typo3']);
				if ((bool)$ignoreOpenEnd) {
					$upperBound = $versionRange[1] !== '0.0.0' && version_compare($version, $versionRange[1], '<=');
				} else {
					$upperBound = $versionRange[1] === '0.0.0' || version_compare($version, $versionRange[1], '<=');
				}
				if (($versionRange[0] === '0.0.0' || version_compare($version, $versionRange[0], '>')) && $upperBound) {
					$compatibleExtensions[$extensionName] = $versionRange;
				}
			}
		}

		return $compatibleExtensions;
	}

	/**
	 * Get extensions wich do not claim to be compatible in their ext_emconf.php
	 *
	 * Note that we are ignoring open ended comatibility here. These are the
	 * cases where the version requirements have a 0.0.0 at the end. This is
	 * because we assume that extension creators that care about compatibilty
	 * will specify the maximum supported version instead of providing a 0.0.0
	 * as upper limit.
	 *
	 * @param string $version The version to check against
	 * @param boolean $ignoreOpenEnd Should we ignore open ended requirements?
	 *
	 * @return array Array of compatible extension keys and their version ranges
	 */
	public static function getIncompatibleExtensions($version = NULL, $ignoreOpenEnd = TRUE) {
		if ($version === NULL) {
			$version = self::CURRENT_LTS_VERSION;
		}
		$extensions = array();
		$list = self::getInstalledExtensions();
		if (t3lib_div::int_from_ver(TYPO3_version) < 6002000) {
			foreach ($list as $extensionName => $extensionData) {
				if (is_array($extensionData) && isset($extensionData['EM_CONF']['constraints']['depends']['typo3'])) {
					$versionRange = tx_em_Tools::splitVersionRange($extensionData['EM_CONF']['constraints']['depends']['typo3']);
					if ((bool)$ignoreOpenEnd) {
						$upperBound = $versionRange[1] !== '0.0.0' && version_compare($version, $versionRange[1], '>');
					} else {
						$upperBound = $versionRange[1] === '0.0.0' || version_compare($version, $versionRange[1], '>');
					}
					if (($versionRange[0] !== '0.0.0' && version_compare($version, $versionRange[0], '<=')) || $upperBound) {
						$extensions[$extensionName] = $versionRange;
					}
				}
			}
		} else {
			/** @var \TYPO3\CMS\Extensionmanager\Utility\EmConfUtility $emConfUtility */
			$emConfUtility = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('\TYPO3\CMS\Extensionmanager\Utility\EmConfUtility');
			foreach ($list as $extensionName => $extensionData) {
				if (is_array($extensionData) && isset($extensionData['EM_CONF']['constraints']['depends']['typo3'])) {
					$extensionData = array(); // FIXME . . .  use \TYPO3\CMS\Core\Package\PackageManager
					$versionRange = tx_em_Tools::splitVersionRange($extensionData['EM_CONF']['constraints']['depends']['typo3']);
					if ((bool)$ignoreOpenEnd) {
						$upperBound = $versionRange[1] !== '0.0.0' && version_compare($version, $versionRange[1], '>');
					} else {
						$upperBound = $versionRange[1] === '0.0.0' || version_compare($version, $versionRange[1], '>');
					}
					if (($versionRange[0] !== '0.0.0' && version_compare($version, $versionRange[0], '<=')) || $upperBound) {
						$extensions[$extensionName] = $versionRange;
					}
				}
			}
		}

		return $extensions;
	}

	/**
	 * Get extensions that have category plugin or category fe
	 *
	 * @param boolean $onlyKeys If true, only the extension keys are returned.
	 *
	 * @return array Array of frontend extension keys
	 */
	public static function getFrontendExtensions($onlyKeys = TRUE) {
		$extensions = array();
		if (t3lib_div::int_from_ver(TYPO3_version) < 6002000) {
			$list = array();
			/** @var $extensionList tx_em_Extensions_List */
			$extensionList = t3lib_div::makeInstance('tx_em_Extensions_List');
			$cat = tx_em_Tools::getDefaultCategory();
			$path = PATH_typo3conf . 'ext/';
			$extensionList->getInstExtList($path, $list, $cat, 'L');
		} else {
			$list = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getLoadedExtensionListArray();
		}
		foreach ($list as $extensionName => $extensionData) {
			if (isset($extensionData['EM_CONF']['category'])) {
				if ((trim($extensionData['EM_CONF']['category']) === 'plugin') ||
				    (trim($extensionData['EM_CONF']['category']) === 'fe')
				) {
					if ((bool)$onlyKeys) {
						array_push($extensions, $extensionName);
					} else {
						$extensions[$extensionName] = $extensionData;
					}
				}
			}
		}

		return $extensions;
	}

	/**
	 * Get a list of installed extensions
	 *
	 * @return array of installed extensions
	 */
	public static function getInstalledExtensions() {
		if (self::$installedExtensions !== NULL) {
			return self::$installedExtensions;
		}
		if (t3lib_div::int_from_ver(TYPO3_version) < 6001000) {
			/** @var $extensionList tx_em_Extensions_List */
			$extensionList = t3lib_div::makeInstance('tx_em_Extensions_List');
			list($list,) = $extensionList->getInstalledExtensions();
			$list = array_keys($list);
		} else {
			$list = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getLoadedExtensionListArray();
		}
		self::$installedExtensions = $list;
		return $list;
	}

	/**
	 * Get a list of loaded / active extensions
	 *
	 * @return array Array of installed
	 */
	public static function getLoadedExtensions() {
		if (self::$loadedExtensions !== NULL) {
			return self::$loadedExtensions;
		}
		$loadedExtensions = array();

		$installedExtensions = self::getInstalledExtensions();
		foreach ($installedExtensions as $key) {
			if (count($GLOBALS['TYPO3_LOADED_EXT'][$key]) > 2) {
				$loadedExtensions[] = $key;
			}
		}
		self::$loadedExtensions = $loadedExtensions;

		return $loadedExtensions;
	}

	/**
	 * Get a filtered list of loaded / active extensions
	 *
	 * Compatible extensions can be filtered out.
	 * Ignored extensions can be filtered out.
	 * System extensions can be filtered out.
	 * Smoothmigration is filtered out.
	 *
	 * @param bool $removeCompatible
	 * @param bool $removeIgnored
	 * @param bool $removeSystem
	 *
	 * @return array Array of installed
	 */
	public static function getLoadedExtensionsFiltered(
		$removeCompatible = TRUE,
		$removeIgnored = TRUE,
		$removeSystem = TRUE
	) {
		if (self::$loadedExtensionsFiltered !== NULL) {
			return self::$loadedExtensionsFiltered;
		}

		// get extension configuration
		$configuration = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['smoothmigration']);

		if (isset($configuration['includeInactiveExtensions']) &&
		    intval($configuration['includeInactiveExtensions']) > 0
		) {
			$loadedExtensionsFiltered = self::getInstalledExtensions();
		} else {
			$loadedExtensionsFiltered = self::getLoadedExtensions();
		}

		$loadedExtensionsFiltered = array_flip($loadedExtensionsFiltered);

		unset($loadedExtensionsFiltered['smoothmigration']);

		if ($removeCompatible) {
			if (isset($configuration['excludeCompatibleExtensions']) &&
			    intval($configuration['excludeCompatibleExtensions']) > 0
			) {
				$targetVersion = NULL;
				if (isset($configuration['targetVersionOverride']) &&
				    trim($configuration['targetVersionOverride'])
				) {
					$targetVersion = trim($configuration['targetVersionOverride']);
				}
				$compatibleExtensions = Tx_Smoothmigration_Utility_ExtensionUtility::getCompatibleExtensions($targetVersion);
				foreach ($compatibleExtensions as $key => $_) {
					unset($loadedExtensionsFiltered[$key]);
				}
			}
		}

		if ($removeIgnored) {
			if (isset($configuration['excludedExtensions']) &&
			    trim($configuration['excludedExtensions']) !== ''
			) {
				$ingoreExtensions = explode(',', str_replace(' ', '', $configuration['excludedExtensions']));
				foreach ($ingoreExtensions as $key) {
					unset($loadedExtensionsFiltered[$key]);
				}
			}
		}

		if ($removeSystem) {
			foreach ($loadedExtensionsFiltered as $key => $_) {
				if ($GLOBALS['TYPO3_LOADED_EXT'][$key]['type'] === 'S') {
					unset($loadedExtensionsFiltered[$key]);
				}
			}
		}

		$loadedExtensionsFiltered = array_flip($loadedExtensionsFiltered);

		self::$loadedExtensionsFiltered = $loadedExtensionsFiltered;

		return self::$loadedExtensionsFiltered;
	}

	/**
	 * Get extensions that are marked as obsolete in their ext_emconf.php
	 *
	 * @param boolean $onlyKeys If true, only the extension keys are returned.
	 *
	 * @return array Array of obsolete extension keys
	 */
	public static function getObsoleteExtensions($onlyKeys = TRUE) {
		$extensions = array();
		$list = self::getInstalledExtensions();
		foreach ($list as $extensionName => $extensionData) {
			if (isset($extensionData['EM_CONF']['state'])) {
				if (trim($extensionData['EM_CONF']['state']) === 'obsolete') {
					if ((bool)$onlyKeys) {
						array_push($extensions, $extensionName);
					} else {
						$extensions[$extensionName] = $extensionData;
					}
				}
			}
		}

		return $extensions;
	}

}
