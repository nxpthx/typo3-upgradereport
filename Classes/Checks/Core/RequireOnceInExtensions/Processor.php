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
 * Class Tx_Upgradereport_Checks_Core_RequireOnceInExtensions_Definition
 *
 * @author Steffen Ritter
 */
class Tx_Upgradereport_Checks_Core_RequireOnceInExtensions_Processor implements Tx_Upgradereport_Domain_Interface_CheckProcessor {

	/**
	 * @var Tx_Upgradereport_Checks_Core_RequireOnceInExtensions_Definition
	 */
	protected $parentCheck;

	/**
	 * @param Tx_Upgradereport_Domain_Interface_Check $check
	 */
	public function __construct(Tx_Upgradereport_Domain_Interface_Check $check) {
		$this->parentCheck = $check;
	}

	/**
	 * @var Tx_Upgradereport_Domain_Model_Issue[]
	 */
	protected $issues = array();

	/**
	 * @return void
	 */
	public function executeCheck() {
		/** @var Tx_Upgradereport_Service_FileLocatorService $fileLocatorService */
		$fileLocatorService = t3lib_div::makeInstance('Tx_Upgradereport_Service_FileLocatorService');
		$locations = $fileLocatorService->searchInExtensions('.*\.(php|inc)$', '(require|require_once|include|include_once)(\w*\(|\w+)');
		foreach ($locations as $location) {
			$this->issues[] = new Tx_Upgradereport_Domain_Model_Issue($this->parentCheck->getIdentifier(), $location);
		}
	}

	/**
	 * @return boolean
	 */
	public function hasIssues() {
		return count($this->issues) > 0;
	}

	/**
	 * @return Tx_Upgradereport_Domain_Model_Issue[]
	 */
	public function getIssues() {
		return $this->issues;
	}


}

?>