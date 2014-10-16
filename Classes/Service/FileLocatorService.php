<?php
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2013 Steffen Ritter, rs websystems <steffen.ritter@typo3.org>
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *  A copy is found in the textfile GPL.txt and important notices to the license
 *  from the author is found in LICENSE.txt distributed with these scripts.
 *
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * Class Tx_Smoothmigration_Service_FileLocatorService
 */
class Tx_Smoothmigration_Service_FileLocatorService {

	/**
	 * Current TYPO3 LTS version
	 */
	const CURRENT_LTS_VERSION = '6.2.0';

	/**
	 * @param string $searchPattern
	 * @param string $haystackFilePath
	 *
	 * @return array
	 */
	public function findLineNumbersOfStringInPhpFile($searchPattern, $haystackFilePath) {
		$positions = array();
		foreach (new SplFileObject($haystackFilePath) as $lineNumber => $lineContent) {
			$matches = array();
			if (preg_match('/' . trim($searchPattern, '/') . '/i', $lineContent, $matches)) {
				$positions[] = array('line' => $lineNumber + 1, 'match' => $matches[0]);
			}
		}
		return $positions;
	}

	/**
	 * @param string $fileNamePattern
	 * @param string $searchPattern
	 * @param array $excludedExtensions
	 *
	 * @return Tx_Smoothmigration_Domain_Interface_IssueLocation[]
	 */
	public function searchInExtensions($fileNamePattern, $searchPattern, $excludedExtensions = array()) {
		$locations = array();

		// get extension configuration
		$configuration = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['smoothmigration']);
		if (isset($configuration['excludeCompatibleExtensions']) &&
			intval($configuration['excludeCompatibleExtensions']) > 0
		) {
			if (isset($configuration['targetVersionOverride']) &&
				trim($configuration['targetVersionOverride'])) {
				$targetVersion = trim($configuration['targetVersionOverride']);
			} else {
				$targetVersion = self::CURRENT_LTS_VERSION;
			}
			$excludedExtensions = $this->excludeCompatibleExtensions($excludedExtensions, $targetVersion);
		}
		array_push($excludedExtensions, 'smoothmigration');

		$extensionKeys = array_keys($GLOBALS['TYPO3_LOADED_EXT']);
		array_pop($extensionKeys);
		foreach ($extensionKeys as $extensionKey) {
			if ($GLOBALS['TYPO3_LOADED_EXT'][$extensionKey]['type'] == 'S' ||
				in_array($extensionKey, $excludedExtensions)
			) {
				continue;
			}
			$locations = array_merge($this->searchInExtension($extensionKey, $fileNamePattern, $searchPattern), $locations);

		}
		return $locations;
	}

	/**
	 * @param string $extensionKey
	 * @param string $fileNamePattern
	 * @param string $searchPattern
	 *
	 * @return Tx_Smoothmigration_Domain_Interface_IssueLocation[]
	 *
	 */
	public function searchInExtension($extensionKey, $fileNamePattern, $searchPattern) {
		$pathToExtensionFolder = t3lib_extMgm::extPath($extensionKey);
		$extensionIterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($pathToExtensionFolder));
		$regularExpressionIterator = new RegexIterator($extensionIterator, '/' . trim($fileNamePattern, '/') . '/');

		$positions = array();
		foreach ($regularExpressionIterator as $fileInfo) {
			$locations = $this->findLineNumbersOfStringInPhpFile($searchPattern, $fileInfo->getPathname());

			foreach ($locations as $location) {
				$positions[] = new Tx_Smoothmigration_Domain_Model_IssueLocation_File($extensionKey, str_replace(PATH_site, '', $fileInfo->getPathname()), $location['line'], $location['match']);
			}
		}
		return $positions;
	}

	/**
	 * Exclude extensions wich claim to be compatible in their ext_emconf.php
	 *
	 * @param array $excludedExtensions
	 * @param string $version
	 *
	 * @return array
	 */
	private function excludeCompatibleExtensions($excludedExtensions, $version) {
		$extensionList = t3lib_div::makeInstance('tx_em_Extensions_List', $this);
		list($list,) = $extensionList->getInstalledExtensions();
		foreach ($list as $extensionName => $extensionData) {
			if (isset($extensionData['EM_CONF']['constraints']['depends']['typo3'])) {
				$versionRange = tx_em_Tools::splitVersionRange($extensionData['EM_CONF']['constraints']['depends']['typo3']);
				if ($versionRange[1] !== '0.0.0' && version_compare($version, $versionRange[1], '<=')) {
					array_push($excludedExtensions, $extensionName);
				}
			}
		}
		return $excludedExtensions;
	}
}

?>