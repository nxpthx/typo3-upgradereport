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
 * Class Tx_Upgradereport_Checks_Core_Xclasses_ResultAnalyzer
 *
 * @author Steffen Ritter
 */
class Tx_Upgradereport_Checks_Core_Xclasses_ResultAnalyzer implements Tx_Upgradereport_Domain_Interface_ResultAnalyzer {

	/**
	 * @var Tx_Upgradereport_Checks_Core_Xclasses_Definition
	 */
	protected $parentCheck;

	/**
	 * @param Tx_Upgradereport_Domain_Interface_Check $check
	 */
	public function __construct(Tx_Upgradereport_Domain_Interface_Check $check) {
		$this->parentCheck = $check;
	}


	/**
	 * @param Tx_Upgradereport_Domain_Model_Issue $issue
	 *
	 * @return string
	 */
	public function getSeverity(Tx_Upgradereport_Domain_Model_Issue $issue) {
		return 0;
	}

	/**
	 * @param Tx_Upgradereport_Domain_Model_Issue $issue
	 *
	 * @return string
	 */
	public function getExplanation(Tx_Upgradereport_Domain_Model_Issue $issue) {
		$information = $issue->getAdditionalInformation();

		$data = array(
			'EXTENSION' => $issue->getLocation()->getExtension() ?: 'Core',
		);
		$data = array_merge($data, $information);
		return str_replace(array_keys($data), array_values($data), 'The Class "IMPLEMENTATION_CLASS" is registered as replacement for "ORIGINAL_CLASS" via xClass-Mechanism. The new class won\'t be executed after upgrading to 6.2 as the method of registering xclasses has changed in TYPO3 CMS 6.0. Please check if the xclass-code is still needed in after upgrading to TYPO3 6.2 LTS and in that case register it the new way.');

	}

	/**
	 * @param Tx_Upgradereport_Domain_Model_Issue $issue
	 *
	 * @return string
	 */
	public function getSolution(Tx_Upgradereport_Domain_Model_Issue $issue) {
		$information = $issue->getAdditionalInformation();

		$originalClass = $information['ORIGINAL_CLASS'];
		$newClass = $information['IMPLEMENTATION_CLASS'];
		return 'Remove the XCLASS Code at ' . $issue->getLocation()->getPhysicalLocation()->getFilePath() . ($issue->getLocation()->getPhysicalLocation()->getLineNumber() > -1 ? ' line ' . $issue->getLocation()->getPhysicalLocation()->getLineNumber() : '') . ". Add the following code there:\n" .
			'$GLOBALS[\'TYPO3_CONF_VARS\'][\'SYS\'][\'Objects\'][\'' . $originalClass . '\'] = array(\'className\' => \'' . $newClass . '\');';
	}

	/**
	 * @param Tx_Upgradereport_Domain_Model_Issue $issue
	 *
	 * @return string
	 */
	public function getRawTextForCopyPaste(Tx_Upgradereport_Domain_Model_Issue $issue) {
		$information = $issue->getAdditionalInformation();

		$originalClass = $information['ORIGINAL_CLASS'];
		$newClass = $information['IMPLEMENTATION_CLASS'];
		return '$GLOBALS[\'TYPO3_CONF_VARS\'][\'SYS\'][\'Objects\'][\'' . $originalClass . '\'] = array(\'className\' => \'' . $newClass . '\');';

	}


}

?>