<?php
/**
 *  Copyright notice
 *
 *  ⓒ 2014 Michiel Roos <michiel@maxserv.nl>
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is free
 *  software; you can redistribute it and/or modify it under the terms of the
 *  GNU General Public License as published by the Free Software Foundation;
 *  either version 2 of the License, or (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful, but
 *  WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY
 *  or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for
 *  more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 */

/**
 * Class Tx_Smoothmigration_Domain_Model_IssueLocation_Extension
 *
 * @author Michiel Roos
 */
class Tx_Smoothmigration_Domain_Model_IssueLocation_Extension
	extends Tx_Smoothmigration_Domain_Model_IssueLocation_PhysicalLocation {

	/**
	 * Extension Name
	 *
	 * @var string
	 */
	protected $extensionName = '';

	/**
	 * Minimum version
	 *
	 * @var string
	 */
	protected $minimumVersion = '';

	/**
	 * Maximum version
	 *
	 * @var string
	 */
	protected $maximumVersion = '';

	/**
	 * @param string $extension
	 * @param string $minimumVersion
	 * @param string $maximumVersion
	 */
	public function __construct($extension, $minimumVersion = '0.0.0', $maximumVersion = '0.0.0') {
		$this->extensionName = $extension;
		$this->minimumVersion = $minimumVersion;
		$this->maximumVersion = $maximumVersion;
	}

	/**
	 * Creates ID which identifies the occurence of that issue
	 *
	 * @return string
	 */
	public function createIssueIdentifier() {
		return md5($this->extensionName . '/' . $this->minimumVersion . '-' . $this->maximumVersion);
	}

	/**
	 *
	 * @return string
	 */
	public function getExtension() {
		return $this->getExtensionName();
	}

	/**
	 * @param string $extensionName
	 *
	 * @return $this to allow for chaining
	 */
	public function setExtensionName($extensionName) {
		$this->extensionName = $extensionName;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getExtensionName() {
		return $this->extensionName;
	}

	/**
	 * @param string $maximumVersion
	 *
	 * @return $this to allow for chaining
	 */
	public function setMaximumVersion($maximumVersion) {
		$this->maximumVersion = $maximumVersion;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getMaximumVersion() {
		return $this->maximumVersion;
	}

	/**
	 * @param string $minimumVersion
	 *
	 * @return $this to allow for chaining
	 */
	public function setMinimumVersion($minimumVersion) {
		$this->minimumVersion = $minimumVersion;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getMinimumVersion() {
		return $this->minimumVersion;
	}

}

?>