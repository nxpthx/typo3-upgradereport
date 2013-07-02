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
 * Class Tx_Upgradereport_Domain_Interface_CheckProcessor
 *
 * @author Steffen Ritter
 */
class Tx_Upgradereport_Domain_Model_Issue extends Tx_Extbase_DomainObject_AbstractEntity {

	/**
	 * @var string
	 */
	protected $inspection;

	/**
	 * @var string
	 */
	protected $identifier;

	/**
	 * @var string
	 */
	protected $extension;

	/**
	 * @var Tx_Upgradereport_Domain_Interface_IssueLocation
	 */
	protected $location;

	/**
	 * @var array
	 */
	protected $additionalInformation = array();

	/**
	 * @var string
	 */
	protected $additionalInfo;

	/**
	 * @var string
	 */
	protected $locationInfo = 'Test';

	/**
	 * @param string $checkIdentifier
	 * @param Tx_Upgradereport_Domain_Interface_IssueLocation $issueDetails
	 */
	public function __construct($checkIdentifier, Tx_Upgradereport_Domain_Interface_IssueLocation $issueDetails) {
		$this->setLocation($issueDetails);
		$this->inspection = $checkIdentifier;
	}

	public function initializeObject() {
		$this->additionalInformation = unserialize($this->additionalInfo);
		$this->location = unserialize($this->locationInfo);
	}
	/**
	 * @return string
	 */
	public function getIdentifier() {
		return $this->identifier;
	}

	/**
	 * @return string
	 */
	public function getInspection() {
		return $this->inspection;
	}

	/**
	 * @param \Tx_Upgradereport_Domain_Interface_IssueLocation $details
	 *
	 * @return void
	 */
	public function setLocation($details) {
		$this->location = $details;
		$this->extension = $details->getExtension();
		$this->identifier = $this->location->createIssueIdentifier();
		$this->locationInfo = serialize($details);
	}

	/**
	 * @return \Tx_Upgradereport_Domain_Interface_IssueLocation
	 */
	public function getLocation() {
		if ($this->location == NULL && $this->locationInfo !== NULL) {
			$this->location = unserialize($this->locationInfo);
		}
		return $this->location;
	}

	/**
	 * @param array $additionalInformation
	 *
	 * @return void
	 */
	public function setAdditionalInformation(array $additionalInformation) {
		$this->additionalInformation = $additionalInformation;
		$this->additionalInfo = serialize($additionalInformation);
	}

	/**
	 * @return array
	 */
	public function getAdditionalInformation() {
		if ($this->additionalInformation == NULL && $this->additionalInfo !== NULL) {
			$this->additionalInformation = unserialize($this->additionalInfo);
		}

		return $this->additionalInformation;
	}

	/**
	 * sets the Extension
	 *
	 * @param string $extension
	 *
	 * @return void
	 */
	public function setExtension($extension) {
		$this->extension = $extension;
	}

	/**
	 * get the Extension
	 *
	 * @return string
	 */
	public function getExtension() {
		return $this->extension;
	}

	/**
	 * @param string $additionalInfo
	 */
	public function setAdditionalInfo($additionalInfo) {
		$this->additionalInfo = $additionalInfo;
		$this->setAdditionalInformation(unserialize($additionalInfo));
	}

	/**
	 * @return string
	 */
	public function getAdditionalInfo() {
		return $this->additionalInfo;
	}

	/**
	 * @param string $locationInfo
	 */
	public function setLocationInfo($locationInfo) {
		$this->locationInfo = $locationInfo;
		$this->setLocation(unserialize($locationInfo));
	}

	/**
	 * @return string
	 */
	public function getLocationInfo() {
		return $this->locationInfo;
	}

}

?>