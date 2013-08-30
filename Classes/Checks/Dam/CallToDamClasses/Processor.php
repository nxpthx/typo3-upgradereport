<?php
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2013 Peter Beernink, Drecomm (p.beernink@drecomm.nl)
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
 * Class Tx_Smoothmigration_Checks_Core_CallToDeprecatedStaticMethods_Definition
 *
 * @author Peter Beernink
 */
class Tx_Smoothmigration_Checks_Dam_CallToDamClasses_Processor implements Tx_Smoothmigration_Domain_Interface_CheckProcessor {

	/**
	 * Array of all deprecated static methods
	 *
	 * @var array
	 */
	protected $damClasses  = array(
		'tx_dam\w+',
		'tx_damcatedit_positionMap',
		'tx_damcatedit_db',
		'tx_damcatedit_cm'
	);

	/**
	 * @var Tx_Smoothmigration_Checks_Dam_CallToDamClasses_Definition
	 */
	protected $parentCheck;

	/**
	 * @param Tx_Smoothmigration_Domain_Interface_Check $check
	 */
	public function __construct(Tx_Smoothmigration_Domain_Interface_Check $check) {
		$this->parentCheck = $check;
	}

	/**
	 * @var Tx_Smoothmigration_Domain_Model_Issue[]
	 */
	protected $issues = array();

	/**
	 * @return void
	 */
	public function execute() {
		/** @var Tx_Smoothmigration_Service_FileLocatorService $fileLocatorService */
		$fileLocatorService = t3lib_div::makeInstance('Tx_Smoothmigration_Service_FileLocatorService');
		$locations = $fileLocatorService->searchInExtensions('.*\.(php|inc)$',
			$this->generateRegularExpression()
		);
		foreach ($locations as $location) {
			$this->issues[] = new Tx_Smoothmigration_Domain_Model_Issue($this->parentCheck->getIdentifier(), $location);
		}
	}

	/**
	 * @return boolean
	 */
	public function hasIssues() {
		return count($this->issues) > 0;
	}

	/**
	 * @return Tx_Smoothmigration_Domain_Model_Issue[]
	 */
	public function getIssues() {
		return $this->issues;
	}

	/**
	 * Generate a regular expression to search for all deprecated static calls
	 */
	protected function generateRegularExpression() {
		$regularExpression = array();
		foreach ($this->damClasses as $damClass) {
			$regularExpression[] = '(' . $damClass . '\:\:\w+)';							// satic call
			$regularExpression[] = '(makeInstance\((\"|\')' . $damClass . '(\"|\')\))';		// makeInstance call
			$regularExpression[] = '(new\s+' . $damClass . '\s*\;)';						// new-call
		}
		return implode('|', $regularExpression);
	}


}

?>