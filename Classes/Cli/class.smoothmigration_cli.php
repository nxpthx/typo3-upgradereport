<?php
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2013 Ingo Schmitt <is@marketing-factory.de>
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

if (t3lib_div::int_from_ver(TYPO3_version) < 6002000) {
	require_once(PATH_t3lib . 'class.t3lib_cli.php');
}

/**
 * Class tx_smoothmigration_cli
 */
class tx_smoothmigration_cli extends t3lib_cli {

	/**
	 * @var Tx_Smoothmigration_Controller_SmoothmigrationCommandController
	 */
	protected $commandController;

	/**
	 * The issue repostitory
	 *
	 * @var Tx_Smoothmigration_Domain_Repository_IssueRepository
	 */
	protected $issueRepository;

	/**
	 * @var Tx_Smoothmigration_Service_MessageService
	 */
	protected $messageBus;

	/**
	 * @var Tx_Extbase_Object_ObjectManager
	 */
	protected $objectManager;

	/**
	 * Constructor
	 */
	public function __construct() {
		if (t3lib_div::int_from_ver(TYPO3_version) < 6002000) {
				// Loads the cli_args array with command line arguments
			$this->cli_args = $this->cli_getArgIndex();
		} else {
				// Loads the cli_args array with command line arguments
			$this->cli_setArguments($_SERVER['argv']);
		}

		$this->objectManager = t3lib_div::makeInstance('Tx_Extbase_Object_ObjectManager');
		$this->commandController = $this->objectManager->get('Tx_Smoothmigration_Controller_SmoothmigrationCommandController');
		$this->issueRepository = $this->objectManager->get('Tx_Smoothmigration_Domain_Repository_IssueRepository');
		$this->messageBus = $this->objectManager->get('Tx_Smoothmigration_Service_MessageService');

			// Adding options to help archive:
		$this->cli_options = array();
		$this->cli_options[] = array('check', 'Check your code for needed migrations');
		$this->cli_options[] = array('report', 'Detailed Report including extension, codeline and check');
		$this->cli_options[] = array('executeAllChecks', 'Execute all checks and show a short summary');
		$this->cli_options[] = array('migrate', 'Try to migrate your code');
		$this->cli_options[] = array('help', 'Display this message');

			// Setting help texts:
		$this->cli_help['name'] = 'CLI Smoothmigration Agent';
		$this->cli_help['synopsis'] = 'cli_dispatch.phpsh smoothmigration {task}';
		$this->cli_help['description'] = 'Executes the report of the smoothmigration extension on CLI Basis';
		$this->cli_help['examples'] = './typo3/cli_dispatch.phpsh smoothmigration report';
		$this->cli_help['author'] = 'Ingo Schmitt <is@marketing-factory.de>';
	}

	/**
	 * CLI engine
	 *
	 * @param array $argv command line arguments
	 * @return string
	 */
	public function cli_main($argv) {
		$task = ((string)$this->cli_args['_DEFAULT'][1]) ?: '';

			// Analysis type:
		switch ($task) {
			case 'check':
				$checkKey = ((string)$this->cli_args['_DEFAULT'][2]) ?: '';
				$this->check($checkKey);
				break;
			case 'executeAllChecks':
				$this->executeAllChecks();
				break;
			case 'report':
				$this->report();
				break;
			case 'migrate':
				$migrationTask = ((string)$this->cli_args['_DEFAULT'][2]) ?: '';
				$experimental = in_array((string)$this->cli_args['--experimental'][0],  array('y', 'yes', 'true', '1'));
				$extension = trim((string)$this->cli_args['--extension'][0]);
				$this->migrate($migrationTask, $extension, $experimental);
				break;
			default:
				$this->cli_validateArgs();
				$this->cli_help();
				exit;
		}
	}

	/**
	 * Check
	 *
	 * @param string $checkKey
	 * @return void
	 */
	private function check($checkKey) {
		$check = NULL;
		/** @var Tx_Smoothmigration_Service_Check_Registry $registry */
		$registry = Tx_Smoothmigration_Service_Check_Registry::getInstance();

		if (!empty($checkKey)) {
			$check = $registry->getActiveCheckByIdentifier($checkKey);
		}
		if ($check === NULL) {
			$this->messageBus->message('Please choose a check to execute.' . LF . LF . 'Possible options are:' .  LF);
			$this->messageBus->message($this->getChecks());
			return;
		}

		/** @var Tx_Smoothmigration_Checks_AbstractCheckProcessor $processor */
		$processor = $check->getProcessor();
		$processor->execute();
		foreach ($processor->getIssues() as $issue) {
			$this->issueRepository->add($issue);
		}
		/** @var Tx_Extbase_Persistence_Manager $persistenceManger */
		$persistenceManger = $this->objectManager->get('Tx_Extbase_Persistence_Manager');
		$persistenceManger->persistAll();
		$this->messageBus->infoMessage('Check: ' . $check->getTitle() . ' has ' . count($processor->getIssues()) . ' issues ');
	}

	/**
	 * Renders a Report of Extensions as ASCII
	 *
	 * @return void
	 */
	private function report() {
		$registry = Tx_Smoothmigration_Service_Check_Registry::getInstance();
		$issuesWithInspections = $this->issueRepository->findAllGroupedByExtensionAndInspection();
		foreach ($issuesWithInspections as $extensionKey => $inspections) {
			$count = 0;
			foreach ($inspections as $issues) {
				/** @var Tx_Smoothmigration_Domain_Model_Issue $singleIssue */
				foreach ($issues as $singleIssue) {
					if ($count == 0) {
							// Render Extension Key
						$this->messageBus->headerMessage('Extension : ' . $singleIssue->getExtension(), 'info');
					}
					$check = $registry->getActiveCheckByIdentifier($singleIssue->getInspection());
					$this->messageBus->message($check->getResultAnalyzer()->getSolution($singleIssue));
					$count ++;
				}
			}
			$this->messageBus->successMessage('Total: ' . $count . ' issues in ' . $extensionKey . LF);
		}
	}

	/**
	 * Execute all checks
	 *
	 * @return void
	 */
	private function executeAllChecks() {
		$issues = 0;
		$registry = Tx_Smoothmigration_Service_Check_Registry::getInstance();
		$checks = $registry->getActiveChecks();

		/** @var Tx_Smoothmigration_Domain_Interface_Check $singleCheck */
		foreach ($checks as $singleCheck) {
			$processor = $singleCheck->getProcessor();
			$this->messageBus->headerMessage('Check: ' . $singleCheck->getTitle(), 'info');
			$processor->execute();
			foreach ($processor->getIssues() as $issue) {
				$this->issueRepository->add($issue);
			}
			$issues = $issues + count($processor->getIssues());
			$this->messageBus->infoMessage(count($processor->getIssues()) . ' issues found');
		}
		$persistenceManger = $this->objectManager->get('Tx_Extbase_Persistence_Manager');
		$persistenceManger->persistAll();
		$this->messageBus->infoMessage(LF . 'Total Issues : ' . $issues);
	}

	/**
	 * Migrate
	 *
	 * @param string $migrationTaskKey
	 * @param string $extensionKey
	 * @param boolean $experimental When TRUE, try to process experimental
	 *    migrations as well
	 * @return void
	 */
	private function migrate($migrationTaskKey, $extensionKey = '', $experimental) {
		$migrationTask = NULL;
		/** @var Tx_Smoothmigration_Service_Migration_Registry $registry */
		$registry = Tx_Smoothmigration_Service_Migration_Registry::getInstance();

		if (!empty($migrationTaskKey)) {
			$migrationTask = $registry->getActiveMigrationByCliKey($migrationTaskKey);
		}
		if ($migrationTask === NULL) {
			$this->messageBus->message('Please choose a migration to execute.' . LF . LF . 'Possible options are:' .  LF);
			$this->messageBus->message($this->getMigrations());
			return;
		}

		/** @var Tx_Smoothmigration_Migrations_AbstractMigrationProcessor $processor */
		$processor = $migrationTask->getProcessor();
		$processor->setCommandController($this->commandController);
		$processor->setExperimental($experimental);
		$processor->setExtensionKey($extensionKey);
		$processor->execute();
	}

	/**
	 * Get available checks
	 *
	 * @return string
	 */
	private function getChecks() {
		$output = '';
		$registry = Tx_Smoothmigration_Service_Check_Registry::getInstance();
		$checks = $registry->getActiveChecks();
		$maxLen = 0;
		/** @var Tx_Smoothmigration_Checks_AbstractCheckDefinition $check */
		foreach ($checks as $check) {
			if (strlen($check->getIdentifier()) > $maxLen) {
				$maxLen = strlen($check->getIdentifier());
			}
		}
		foreach ($checks as $check) {
			$output .= $check->getIdentifier() . substr($this->cli_indent(rtrim($check->getTitle()), $maxLen + 4), strlen($check->getIdentifier())) . LF;
		}

		return $output;
	}

	/**
	 * Get available migrations
	 *
	 * @return string
	 */
	private function getMigrations() {
		$output = '';
		/** @var Tx_Smoothmigration_Service_Migration_Registry $registry */
		$registry = Tx_Smoothmigration_Service_Migration_Registry::getInstance();
		$migrations = $registry->getActiveMigrations();
		$maxLen = 0;
		/** @var Tx_Smoothmigration_Migrations_AbstractMigrationDefinition $migration */
		foreach ($migrations as $migration) {
			if (strlen($migration->getCliKey()) > $maxLen) {
				$maxLen = strlen($migration->getCliKey());
			}
		}
		foreach ($migrations as $migration) {
			$output .= $migration->getCliKey() . substr($this->cli_indent(rtrim($migration->getTitle()), $maxLen + 4), strlen($migration->getCliKey())) . LF;
		}

		return $output;
	}
}

$cleanerObj = t3lib_div::makeInstance('tx_smoothmigration_cli');
$cleanerObj->cli_main($_SERVER['argv']);
