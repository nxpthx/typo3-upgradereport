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
 * Class Tx_Upgradereport_Service_FileLocatorService
 */
class Tx_Upgradereport_Service_FileLocatorService {


	/**
	 * @param string $searchPattern
	 * @param string $haystackFilePath
	 *
	 * @return int[]
	 */
	public function findLineNumbersOfStringInPhpFile($searchPattern, $haystackFilePath) {
		$positions = array();
		foreach (new SplFileObject($haystackFilePath) as $lineNumber => $lineContent) {
			if (preg_match('/' . trim($searchPattern, '/') . '/', $lineContent)) {
				$positions[] =  $lineNumber + 1;
			}
		}
		return $positions;
	}

	/**
	 * @param string $fileNamePattern
	 * @param string $searchPattern
	 *
	 * @return Tx_Upgradereport_Domain_Interface_IssueLocation[]
	 */
	public function searchInExtensions($fileNamePattern, $searchPattern) {
		$locations = array();

		$extensionKeys = array_keys($GLOBALS['TYPO3_LOADED_EXT']);
		array_pop($extensionKeys);
		foreach ($extensionKeys as $extensionKey) {
			if ($GLOBALS['TYPO3_LOADED_EXT'][$extensionKey]['type'] == 'S') {
				continue;
			}
			$locations = array_merge($locations, $this->searchInExtension($extensionKey, $fileNamePattern, $searchPattern));
		}
		return $locations;
	}

	/**
	 * @param string $extensionKey
	 * @param string $fileNamePattern
	 * @param string $searchPattern
	 *
	 * @return Tx_Upgradereport_Domain_Interface_IssueLocation[]
	 *
	 */
	public function searchInExtension($extensionKey, $fileNamePattern, $searchPattern) {
		$pathToExtensionFolder = t3lib_extMgm::extPath($extensionKey);
		$extensionIterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($pathToExtensionFolder));
		$regularExpressionIterator = new RegexIterator($extensionIterator, '/' . trim($fileNamePattern, '/') . '/');

		$positions = array();
		foreach ($regularExpressionIterator as $fileInfo) {
			$lineNumbers = $this->findLineNumbersOfStringInPhpFile($searchPattern, $fileInfo->getPathname());

			foreach ($lineNumbers as $line) {
				$positions[] = new Tx_Upgradereport_Domain_Model_IssueLocation_File($extensionKey, str_replace(PATH_site, '', $fileInfo->getPathname()), $line);
			}
		}
		return $positions;
	}

}

?>