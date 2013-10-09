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
 * Class Tx_Smoothmigration_Checks_Database_Utf8_Processor
 *
 * @author Michiel Roos
 */
class Tx_Smoothmigration_Checks_Database_Utf8_Processor extends Tx_Smoothmigration_Checks_AbstractCheckProcessor {

	/**
	 * Execute the check
	 * @return void
	 */
	public function execute() {
		$characterSets = $this->getMySqlCharacterSets();
		$preferredCharacterSets = array(
			'character_set_connection' => 'utf8',
			'character_set_database' => 'utf8',
			'character_set_server' => 'utf8'
		);

		foreach ($characterSets as $key => $characterSet) {
			if (array_key_exists($key, $preferredCharacterSets)) {
				if ($characterSet !== $preferredCharacterSets[$key]) {
					$physicalLocation = new Tx_Smoothmigration_Domain_Model_IssueLocation_Database(TYPO3_db_username . '@' . TYPO3_db_host . '/' . TYPO3_db);
					$details = new Tx_Smoothmigration_Domain_Model_IssueLocation_Configuration(
						Tx_Smoothmigration_Domain_Model_IssueLocation_Configuration::TYPE_DATABASESERVER,
						TYPO3_db_username . '@' . TYPO3_db_host . '/' . TYPO3_db . ': ' . $key,
						$characterSet,
						$physicalLocation
					);

					$issue = new Tx_Smoothmigration_Domain_Model_Issue($this->parentCheck->getIdentifier(), $details);
					$issue->setAdditionalInformation(array(
						'type' => 'configuration',
						'setting' => $key,
						'preferredValue' => $preferredCharacterSets[$key],
						'actualValue' => $characterSet
					));
					$this->issues[] = $issue;
				}
			}
		}

		$tableCollations = $this->getTableCollations();
		foreach ($tableCollations as $collationInfo) {
			$key = $collationInfo['table_name'] . '#' . $collationInfo['collation_name'];
			$physicalLocation = new Tx_Smoothmigration_Domain_Model_IssueLocation_Database(TYPO3_db_username . '@' . TYPO3_db_host . '/' . TYPO3_db);
			$details = new Tx_Smoothmigration_Domain_Model_IssueLocation_Configuration(
				Tx_Smoothmigration_Domain_Model_IssueLocation_Configuration::TYPE_DATABASE,
				TYPO3_db_username . '@' . TYPO3_db_host . '/' . TYPO3_db . ': ' . $key,
				$key,
				$physicalLocation
			);

			$issue = new Tx_Smoothmigration_Domain_Model_Issue($this->parentCheck->getIdentifier(), $details);
			$issue->setAdditionalInformation(array(
				'type' => 'tableCollation',
				'tableName' => $collationInfo['table_name'],
				'tableCollation' => $collationInfo['table_collation']
			));
			$this->issues[] = $issue;
		}

		$columnCollations = $this->getColumnCollations();
		foreach ($columnCollations as $collationInfo) {
			$key = $collationInfo['table_name'] . '#' . $collationInfo['column_name'] . '#' . $collationInfo['character_set_name'] . '#' . $collationInfo['collation_name'];
			$physicalLocation = new Tx_Smoothmigration_Domain_Model_IssueLocation_Database(TYPO3_db_username . '@' . TYPO3_db_host . '/' . TYPO3_db);
			$details = new Tx_Smoothmigration_Domain_Model_IssueLocation_Configuration(
				Tx_Smoothmigration_Domain_Model_IssueLocation_Configuration::TYPE_DATABASE,
				TYPO3_db_username . '@' . TYPO3_db_host . '/' . TYPO3_db . ': ' . $key,
				$key,
				$physicalLocation
			);

			$issue = new Tx_Smoothmigration_Domain_Model_Issue($this->parentCheck->getIdentifier(), $details);
			$issue->setAdditionalInformation(array(
				'type' => 'columnCollation',
				'tableName' => $collationInfo['table_name'],
				'columnName' => $collationInfo['column_name'],
				'characterSetName' => $collationInfo['character_set_name'],
				'collationName' => $collationInfo['collation_name']
			));
			$this->issues[] = $issue;
		}
	}

	/**
	 * Get informations about the mysql server character_set
	 *
	 * @return array
	 */
	protected function getMySqlCharacterSets() {
		$characterSets = '';

		$res = $GLOBALS['TYPO3_DB']->sql_query('SHOW VARIABLES LIKE "character_set_%";');
		while ($row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res)) {
			$characterSets[$row['Variable_name']] = $row['Value'];
		}
		$GLOBALS['TYPO3_DB']->sql_free_result($res);

		return $characterSets;
	}

	/**
	 * Get the table collations for the current database
	 * utf8_general_ci is reccomended
	 * utf8_unicode_ci is also ok
	 * utf8_bin is also ok
	 * The cs versions (Case sensitive compare) are also ok
	 *
	 * @return array $mysqlTableCollations
	 */
	protected function getTableCollations() {
		$mysqlTableCollations = array();
		$res = $GLOBALS['TYPO3_DB']->sql_query('
			SELECT table_name, table_collation
			FROM information_schema.TABLES
			WHERE table_schema = "' . TYPO3_db . '"
			AND NOT table_collation = "utf8_general_ci"
			AND NOT table_collation = "utf8_unicode_ci"
			AND NOT table_collation = "utf8_general_cs"
			AND NOT table_collation = "utf8_unicode_cs"
			AND NOT table_collation = "utf8_bin"
			ORDER BY table_name, table_collation');
		while ($row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res)) {
			$mysqlTableCollations[] = $row;
		}
		$GLOBALS['TYPO3_DB']->sql_free_result($res);
		return $mysqlTableCollations;
	}


	/**
	 * Get the column collations for the current database
	 * utf8_general_ci is reccomended
	 * utf8_unicode_ci is also ok
	 * utf8_bin is also ok
	 * The cs versions (Case sensitive compare) are also ok
	 *
	 * @return array $mysqlColumnCollations
	 */
	protected function getColumnCollations() {
		$mysqlColumnCollations = array();
		$res = $GLOBALS['TYPO3_DB']->sql_query('
			SELECT table_name, column_name, character_set_name, collation_name
			FROM information_schema.COLUMNS
			WHERE table_schema = "' . TYPO3_db . '"
			AND (
				NOT character_set_name = "utf8"
				OR (
					NOT collation_name = "utf8_general_ci"
					AND NOT collation_name = "utf8_unicode_ci"
					AND NOT collation_name = "utf8_general_cs"
					AND NOT collation_name = "utf8_unicode_cs"
					AND NOT collation_name = "utf8_bin"
				)
			)
			ORDER BY table_name, column_name');
		while ($row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res)) {
			$mysqlColumnCollations[] = $row;
		}
		$GLOBALS['TYPO3_DB']->sql_free_result($res);
		return $mysqlColumnCollations;
	}

}

?>