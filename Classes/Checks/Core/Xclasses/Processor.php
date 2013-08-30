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

		foreach ($contexts as $context) {
			if (is_array($GLOBALS['TYPO3_CONF_VARS'][$context]['XCLASS']) && count($GLOBALS['TYPO3_CONF_VARS'][$context]['XCLASS']) > 0) {
				foreach ($GLOBALS['TYPO3_CONF_VARS'][$context]['XCLASS'] AS $targetClass => $implementationClass) {
					$this->issues[] = $this->createIssue($context, $targetClass, $implementationClass);
				}
			}
		}

	}

	/**
	 * @param string $context
	 * @param string $targetClass
	 * @param string $implementationClass
	 *
	 * @return Tx_Smoothmigration_Domain_Model_Issue
	 */
	protected function createIssue($context, $targetClass, $implementationClass) {
		if (is_file($implementationClass)) {
			$path = str_replace(PATH_typo3conf . 'ext/', '', $implementationClass);
			$extKey = current(explode('/', $path));
		} else {
			$extKey = t3lib_extMgm::getExtensionKeyByPrefix(strtolower($implementationClass));
		}
		$physicalLocation = new Tx_Smoothmigration_Domain_Model_IssueLocation_File($extKey, 'EXT:' . $extKey . '/ext_localconf.php');
		$details = new Tx_Smoothmigration_Domain_Model_IssueLocation_Configuration(
			Tx_Smoothmigration_Domain_Model_IssueLocation_Configuration::TYPE_PHP,
			'$GLOBALS[TYPO3_CONF_VARS][' . $context . '][XCLASS][' . $targetClass . ']',
			$implementationClass,
			$physicalLocation
		);

		$issue = new Tx_Smoothmigration_Domain_Model_Issue($this->parentCheck->getIdentifier(), $details);
		$issue->setAdditionalInformation(array(
			'ORIGINAL_CLASS' => $targetClass,
			'IMPLEMENTATION_CLASS' => $implementationClass
		));
		return $issue;
	}
}

?>