<?php
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2013 Steffen Ritter, rs websystems (steffen.ritter@typo3.org)
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
 * Class Tx_Smoothmigration_Checks_Core_Xclasses_Definition
 *
 * @author Steffen Ritter
 */
class Tx_Smoothmigration_Checks_Core_Xclasses_Processor extends Tx_Smoothmigration_Checks_AbstractCheckProcessor {

	/**
	 * @return void
	 */
	public function execute() {
		$contexts = array('BE', 'FE');
		if ($this->getExtensionKey()) {
			$extensionList = array($this->getExtensionKey());
		} else {
			$extensionList = Tx_Smoothmigration_Utility_ExtensionUtility::getLoadedExtensionsFiltered();
		}

		foreach ($contexts as $context) {
			if (is_array($GLOBALS['TYPO3_CONF_VARS'][$context]['XCLASS']) && count($GLOBALS['TYPO3_CONF_VARS'][$context]['XCLASS']) > 0) {
				foreach ($GLOBALS['TYPO3_CONF_VARS'][$context]['XCLASS'] AS $targetClass => $implementationClass) {
					if (is_file($implementationClass)) {
						$path = str_replace(PATH_typo3conf . 'ext/', '', $implementationClass);
						$extKey = current(explode('/', $path));
					} else {
						$extKey = t3lib_extMgm::getExtensionKeyByPrefix(strtolower($implementationClass));
					}

					if (!in_array($extKey, $extensionList)) {
						continue;
					}
					$this->issues[] = $this->createIssue($context, $targetClass, $implementationClass, $extKey);
				}
			}
		}

	}

	/**
	 * @param string $context
	 * @param string $targetClass
	 * @param string $implementationClass
	 * @param string $extKey
	 *
	 * @return Tx_Smoothmigration_Domain_Model_Issue
	 */
	protected function createIssue($context, $targetClass, $implementationClass, $extKey) {
		$physicalLocation = new Tx_Smoothmigration_Domain_Model_IssueLocation_File($extKey, 'EXT:' . $extKey . '/ext_localconf.php');
		$details = new Tx_Smoothmigration_Domain_Model_IssueLocation_Configuration(
			Tx_Smoothmigration_Domain_Model_IssueLocation_Configuration::TYPE_PHP,
			'$GLOBALS[TYPO3_CONF_VARS][' . $context . '][XCLASS][' . $targetClass . ']',
			$implementationClass,
			$physicalLocation
		);

		if(file_exists(PATH_site . 'typo3conf/' . $targetClass)) {
			$originalFilePath = PATH_site . 'typo3conf/' . $targetClass;
		} elseif(file_exists(PATH_site . 'typo3/sys' . $targetClass)) {
			$originalFilePath = PATH_site . 'typo3/sys' . $targetClass;
		} else {
			$originalFilePath = PATH_site . $targetClass;
		}

		$originalClass = $this->getFirstClassInFile($originalFilePath);

		$xClass = $this->getFirstClassInFile($implementationClass);

		$issue = new Tx_Smoothmigration_Domain_Model_Issue($this->parentCheck->getIdentifier(), $details);
		$issue->setAdditionalInformation(array(
			'ORIGINAL_CLASS_FILENAME' => $targetClass,
			'IMPLEMENTATION_CLASS_FILENAME' => $implementationClass,
			'ORIGINAL_CLASS' => $originalClass,
			'IMPLEMENTATION_CLASS' => $xClass
		));
		return $issue;
	}

	/**
	 * @param string $physicalLocation
	 *
	 * @return string	the first class name in the given file
	 */
	protected function getFirstClassInFile($physicalLocation) {
		return $this->getClassInCode(file_get_contents($physicalLocation));
	}

	/**
	 * @param string $sourceCode
	 *
	 * @return string the first class name in the given source code
	 */
	protected function getClassInCode($sourceCode) {

		$tokens = token_get_all($sourceCode);
		$count = count($tokens);
		for ($i = 2; $i < $count; $i++) {
			if (   $tokens[$i - 2][0] == T_CLASS
				&& $tokens[$i - 1][0] == T_WHITESPACE
				&& $tokens[$i][0] == T_STRING) {

				return $tokens[$i][1];
			}
		}
	}
}
