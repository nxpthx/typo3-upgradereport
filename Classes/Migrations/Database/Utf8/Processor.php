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
 * Class Tx_Smoothmigration_Migrations_Database_Utf8_Processor
 *
 * @author Michiel Roos
 */
class Tx_Smoothmigration_Migrations_Database_Utf8_Processor extends Tx_Smoothmigration_Migrations_AbstractMigrationProcessor {

	/**
	 * @return void
	 */
	public function execute() {
		$this->issues = $this->getIssues();
		if (count($this->issues)) {
			foreach ($this->issues as $issue) {
				$this->handleIssue($issue);
				$this->issueRepository->update($issue);
			}
		} else {
			$this->commandController->getMessageBus()->successMessage('No issues found', TRUE);
		}

		$persistenceManger = $this->objectManager->get('Tx_Extbase_Persistence_Manager');
		$persistenceManger->persistAll();
	}

	/**
	 * See if there are any issues
	 *
	 * @return array
	 */
	public function getIssues() {
		if ($this->issues === NULL) {
			$this->issues = $this->issueRepository->findPendingByInspection($this->parentMigration->getIdentifier())->toArray();
		}
		return $this->issues;
	}

	/**
	 * Handle issue
	 *
	 * @param Tx_Smoothmigration_Domain_Model_Issue $issue
	 * @return void
	 */
	protected function handleIssue(Tx_Smoothmigration_Domain_Model_Issue $issue) {
		if (is_string($issue->getLocationInfo())) {
			$locationInfo = unserialize($issue->getLocationInfo());
		} else {
			$locationInfo = $issue->getLocationInfo();
		}

		if (is_string($issue->getAdditionalInformation())) {
			$additionalInformation = unserialize($issue->getAdditionalInformation());
		} else {
			$additionalInformation = $issue->getAdditionalInformation();
		}

		$allowedCollations = array(
			'utf8_general_ci',
			'utf8_unicode_ci',
			'utf8_general_cs',
			'utf8_unicode_cs',
			'utf8_bin'
		);

		switch ($additionalInformation['type']) {
			case 'configuration':
				$this->commandController->getMessageBus()->message($this->ll(
					'result.typo3-database-database-utf8.databaseServerSetting',
					array(
						$additionalInformation['setting'],
						$additionalInformation['actualValue'],
						$additionalInformation['preferredValue']
					)
				));
				$this->commandController->getMessageBus()->warningMessage($this->ll('migration.manualInterventionNeeded'), TRUE);
				$this->commandController->getMessageBus()->message();
				break;
			case 'databaseCollation':
				$this->commandController->getMessageBus()->message($this->ll(
					'result.typo3-database-database-utf8.databaseCollation',
					array(
						$additionalInformation['characterSet'],
						$additionalInformation['defaultCollation']
					)
				));
				$collation = 'utf8_general_ci';
				if (in_array($additionalInformation['defaultCollation'], $allowedCollations)) {
					$collation = $additionalInformation['defaultCollation'];
				}

				if ($issue->getMigrationStatus() != 0) {
					$this->commandController->getMessageBus()->successMessage($this->ll('migration.alreadyMigrated'), TRUE);
					return;
				}

				$query = 'ALTER DATABASE CHARACTER SET utf8 COLLATE ' . $collation . ';';
				$this->commandController->getMessageBus()->message($this->ll(
					'migration.executingQuery',
					array (
						$query
					)
				));
				$GLOBALS['TYPO3_DB']->sql_query($query);
				if ($sqlError = $GLOBALS['TYPO3_DB']->sql_error()) {
					$this->commandController->getMessageBus()->errorMessage($sqlError . LF, TRUE);
				}
				$issue->setMigrationStatus(Tx_Smoothmigration_Domain_Interface_Migration::SUCCESS);
				$this->commandController->getMessageBus()->successMessage($this->ll('migrationsstatus.1') . LF, TRUE);
				break;
			case 'tableCollation':
				$this->commandController->getMessageBus()->message($this->ll(
					'result.typo3-database-database-utf8.databaseTableCollation',
					array(
						$additionalInformation['tableName'],
						$additionalInformation['tableCollation'],
						'utf8_general_ci'
					)
				));

				if ($issue->getMigrationStatus() != 0) {
					$this->commandController->getMessageBus()->successMessage($this->ll('migration.alreadyMigrated'), TRUE);
					return;
				}

				$query = 'ALTER TABLE `' . $additionalInformation['tableName'] . '` CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci;';
				$this->commandController->getMessageBus()->message($this->ll(
					'migration.executingQuery',
					array (
						$query
					)
				));
				$GLOBALS['TYPO3_DB']->sql_query($query);
				if ($sqlError = $GLOBALS['TYPO3_DB']->sql_error()) {
					$this->commandController->getMessageBus()->errorMessage($sqlError . LF, TRUE);
				} else {
					$issue->setMigrationStatus(Tx_Smoothmigration_Domain_Interface_Migration::SUCCESS);
					$this->commandController->getMessageBus()->successMessage($this->ll('migrationsstatus.1') . LF, TRUE);
				}
				break;
			case 'columnCollation':
				$this->commandController->getMessageBus()->message($this->ll(
					'result.typo3-database-database-utf8.databaseColumnCollation',
					array(
						$additionalInformation['tableName'],
						$additionalInformation['columnName'],
						$additionalInformation['characterSetName'],
						$additionalInformation['collationName']
					)
				));

				if ($issue->getMigrationStatus() != 0) {
					$this->commandController->getMessageBus()->successMessage($this->ll('migration.alreadyMigrated'), TRUE);
					return;
				}

				$query = 'ALTER TABLE `' . $additionalInformation['tableName'] . '` CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci;';
				$this->commandController->getMessageBus()->message($this->ll(
					'migration.executingQuery',
					array (
						$query
					)
				));
				$GLOBALS['TYPO3_DB']->sql_query($query);
				if ($sqlError = $GLOBALS['TYPO3_DB']->sql_error()) {
					$this->commandController->getMessageBus()->errorMessage($sqlError . LF, TRUE);
				} else {
					$issue->setMigrationStatus(Tx_Smoothmigration_Domain_Interface_Migration::SUCCESS);
					$this->commandController->getMessageBus()->successMessage($this->ll('migrationsstatus.1') . LF, TRUE);
				}
				break;
			default:
		}
	}
}

?>