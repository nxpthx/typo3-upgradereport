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
class Tx_Upgradereport_Domain_Model_IssueLocation_File extends Tx_Upgradereport_Domain_Model_IssueLocation_PhysicalLocation {

	/**
	 * Extension Name file is located
	 * __ROOT for relative PATH_site
	 *
	 * @var string
	 */
	protected $extensionName = '__ROOT';

	/**
	 * Path relative to extension or __ROOT
	 *
	 * @var string
	 */
	protected $filePath;

	/**
	 * Line number the issue has been found in
	 *
	 * @var integer
	 */
	protected $lineNumber;

	/**
	 * @param string $extension
	 * @param string $path
	 * @param integer $lineNumber
	 */
	public function __construct($extension, $path, $lineNumber = -1) {
		$this->extensionName = $extension;
		$this->filePath = $path;
		$this->lineNumber = $lineNumber;
	}

	/**
	 * Creates ID which identifies the occurence of that issue
	 *
	 * @return string
	 */
	public function createIssueIdentifier() {
		return md5($this->extensionName . '/' . $this->filePath . '-' . $this->lineNumber);
	}

	/**
	 * @param string $extensionName
	 *
	 * @return void
	 */
	public function setExtensionName($extensionName) {
		$this->extensionName = $extensionName;
	}

	/**
	 * @return string
	 */
	public function getExtensionName() {
		return $this->extensionName;
	}

	/**
	 * @param string $filePath
	 *
	 * @return void
	 */
	public function setFilePath($filePath) {
		$this->filePath = $filePath;
	}

	/**
	 * @return string
	 */
	public function getFilePath() {
		return $this->filePath;
	}

	/**
	 * @param int $lineNumber
	 *
	 * @return void
	 */
	public function setLineNumber($lineNumber) {
		$this->lineNumber = $lineNumber;
	}

	/**
	 * @return int
	 */
	public function getLineNumber() {
		return $this->lineNumber;
	}

	/**
	 *
	 * @return string|NULL
	 */
	public function getExtension() {
		return $this->getExtensionName() == '__ROOT' ? NULL : $this->getExtensionName();
	}


}

?>