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
		$preferredSettings = array(
			'character_set_connection' => 'utf8',
			'character_set_database' => 'utf8',
			'character_set_server' => 'utf8'
		);

		foreach ($characterSets as $key => $characterSet) {
			if (array_key_exists($key, $preferredSettings)) {
				if ($characterSet !== $preferredSettings[$key]) {
					$physicalLocation = new Tx_Smoothmigration_Domain_Model_IssueLocation_Database(TYPO3_db_username . '@' . TYPO3_db_host . '/' . TYPO3_db);
					$details = new Tx_Smoothmigration_Domain_Model_IssueLocation_Configuration(
						Tx_Smoothmigration_Domain_Model_IssueLocation_Configuration::TYPE_DATABASESERVER,
						TYPO3_db_username . '@' . TYPO3_db_host . '/' . TYPO3_db . ': ' . $key,
						$characterSet,
						$physicalLocation
					);

					$issue = new Tx_Smoothmigration_Domain_Model_Issue($this->parentCheck->getIdentifier(), $details);
					$issue->setAdditionalInformation(array(
						'setting' => $key,
						'preferredValue' => $preferredSettings[$key],
						'actualValue' => $characterSet
					));
					$this->issues[] = $issue;
				}
			}
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

}

?>