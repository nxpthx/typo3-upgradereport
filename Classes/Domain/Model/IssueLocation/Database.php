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
class Tx_Smoothmigration_Domain_Model_IssueLocation_Database extends Tx_Smoothmigration_Domain_Model_IssueLocation_PhysicalLocation {

	/**
	 * @var string
	 */
	protected $database;

	/**
	 * @var string
	 */
	protected $table;

	/**
	 * @var integer
	 */
	protected $record;

	/**
	 * @var string
	 */
	protected $field;

	/**
	 * Creates ID which identifies the occurence of that issue
	 *
	 * @return string
	 */
	public function createIssueIdentifier() {
		return $this->database . ':' . $this->table . ':' . $this->record . ':' . $this->field;
	}

	/**
	 * @param string $database
	 * @param string $table
	 * @param integer $recordUid
	 * @param string $field
	 */
	public function __construct($database, $table = NULL, $recordUid = NULL, $field = NULL) {
		$this->database = $database;
		$this->table = $table;
		$this->record = $recordUid;
		$this->field = $field;
	}

	/**
	 *
	 * @return string|NULL
	 */
	public function getExtension() {
		return 'Database: ' . $this->getDatabase();
	}

	/**
	 * @param string $field
	 * @return $this to allow for chaining
	 */
	public function setField($field) {
		$this->field = $field;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getField() {
		return $this->field;
	}

	/**
	 * @param int $record
	 * @return $this to allow for chaining
	 */
	public function setRecord($record) {
		$this->record = $record;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getRecord() {
		return $this->record;
	}

	/**
	 * @param string $table
	 * @return $this to allow for chaining
	 */
	public function setTable($table) {
		$this->table = $table;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getTable() {
		return $this->table;
	}

	/**
	 * @param string $database
	 * @return $this to allow for chaining
	 */
	public function setDatabase($database) {
		$this->database = $database;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getDatabase() {
		return $this->database;
	}

}

?>