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
 * Class Tx_Smoothmigration_Domain_Interface_CheckProcessor
 *
 * @author Steffen Ritter
 */
class Tx_Smoothmigration_Domain_Model_IssueLocation_Configuration implements Tx_Smoothmigration_Domain_Interface_IssueLocation {


	const TYPE_TCA = 1;
	const TYPE_PHP = 2;
	const TYPE_TYPOSCRIPT = 4;
	const TYPE_PAGETS = 8;
	const TYPE_EXTENSIONCONFIGURATION = 16;

	/**
	 * @var integer
	 */
	protected $type;

	/**
	 * @var string
	 */
	protected $path;

	/**
	 * @var mixed
	 */
	protected $currentValue;

	/**
	 * @var Tx_Smoothmigration_Domain_Model_IssueLocation_PhysicalLocation
	 */
	protected $physicalLocation;

	/**
	 * Creates ID which identifies the occurence of that issue
	 *
	 * @return string
	 */
	public function createIssueIdentifier() {
		return md5($this->type . '-' . $this->path) .
			($this->physicalLocation !== NULL ? $this->physicalLocation->createIssueIdentifier() : '');
	}

	/**
	 * @param integer $type
	 * @param string $path
	 * @param string $currentValue
	 * @param Tx_Smoothmigration_Domain_Model_IssueLocation_PhysicalLocation $location
	 */
	public function __construct($type, $path, $currentValue = '', Tx_Smoothmigration_Domain_Model_IssueLocation_PhysicalLocation $location = NULL) {
		$this->type = $type;
		$this->path = $path;
		$this->currentValue = $currentValue;
		$this->physicalLocation = $location;
	}

	/**
	 * @param mixed $currentValue
	 *
	 * @return void
	 */
	public function setCurrentValue($currentValue) {
		$this->currentValue = $currentValue;
	}

	/**
	 * @return mixed
	 */
	public function getCurrentValue() {
		return $this->currentValue;
	}

	/**
	 * @param string $path
	 *
	 * @return void
	 */
	public function setPath($path) {
		$this->path = $path;
	}

	/**
	 * @return string
	 */
	public function getPath() {
		return $this->path;
	}

	/**
	 * @param \Tx_Smoothmigration_Domain_Model_IssueLocation_PhysicalLocation $physicalLocation
	 *
	 * @return void
	 */
	public function setPhysicalLocation(Tx_Smoothmigration_Domain_Model_IssueLocation_PhysicalLocation $physicalLocation) {
		$this->physicalLocation = $physicalLocation;
	}

	/**
	 * @return \Tx_Smoothmigration_Domain_Model_IssueLocation_PhysicalLocation
	 */
	public function getPhysicalLocation() {
		return $this->physicalLocation;
	}

	/**
	 * @param int $type
	 *
	 * @return void
	 */
	public function setType($type) {
		$this->type = $type;
	}

	/**
	 * @return int
	 */
	public function getType() {
		return $this->type;
	}

	/**
	 * Developers want to group by Extension/not by test,
	 * implement that later
	 *
	 * @return string|NULL
	 */
	public function getExtension() {
		if ($this->physicalLocation !== NULL) {
			return $this->physicalLocation->getExtension();
		} else {
			return NULL;
		}
	}


}

?>