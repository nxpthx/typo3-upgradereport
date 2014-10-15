<?php
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2013 Michiel Roos <michiel@maxserv.nl>
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
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * Class Tx_Smoothmigration_Checks_AbstractCheckProcessor
 *
 * @author Michiel Roos
 */
abstract class Tx_Smoothmigration_Checks_AbstractCheckProcessor implements Tx_Smoothmigration_Domain_Interface_CheckProcessor {

	/**
	 * @var string
	 */
	private $extensionKey = NULL;

	/**
	 * @var Tx_Smoothmigration_Domain_Model_Issue[]
	 */
	protected $issues = array();

	/**
	 * @var Tx_Smoothmigration_Checks_Core_CallToDeprecatedStaticMethods_Definition
	 */
	protected $parentCheck;

	/**
	 * @param Tx_Smoothmigration_Domain_Interface_Check $check
	 */
	public function __construct(Tx_Smoothmigration_Domain_Interface_Check $check) {
		$this->parentCheck = $check;
	}

	/**
	 * @return Tx_Smoothmigration_Domain_Model_Issue[]
	 */
	public function getIssues() {
		return $this->issues;
	}

	/**
	 * @return boolean
	 */
	public function hasIssues() {
		return count($this->issues) > 0;
	}

	/**
	 * @return string
	 */
	public function getExtensionKey() {
		return $this->extensionKey;
	}

	/**
	 * @param string $extensionKey
	 *
	 * @return $this to allow for chaining
	 */
	public function setExtensionKey($extensionKey) {
		$this->extensionKey = $extensionKey;

		return $this;
	}

}
