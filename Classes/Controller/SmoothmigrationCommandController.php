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
 * Command Controller to execute smoothmigration checks
 *
 * @package smoothmigration
 * @subpackage Controller
 */
class Tx_Smoothmigration_Controller_SmoothmigrationCommandController extends Tx_Smoothmigration_Controller_AbstractCommandController {

	/**
	 * @var Tx_Smoothmigration_Cli_CommandManager
	 */
	protected $commandManager;

	/**
	 * @param Tx_Smoothmigration_Cli_CommandManager $commandManager
	 *
	 * @return void
	 */
	public function injectCommandManager(Tx_Smoothmigration_Cli_CommandManager $commandManager) {
		$this->commandManager = $commandManager;
	}

	/**
	 * Display available checks
	 *
	 * The check command displays available checks
	 *
	 * @param string $commandIdentifier Identifier of a command for more details
	 * @param string $extensionKey A single extension to migratie
	 *
	 * @return void
	 */
	public function checkCommand($commandIdentifier = NULL, $extensionKey = '') {
		if ($commandIdentifier === NULL) {
			$this->displayActionIndex();
		} else {
			try {
				/** @var Tx_Smoothmigration_Domain_Interface_Check $check */
				$check = $this->commandManager->getCommandByTypeAndIdentifier('Check', $commandIdentifier);
				if ($check) {
					$forExtension = (trim($extensionKey)) ? ' in extension: ' . $extensionKey : '';
					$this->headerMessage('Check: \'' . $check->getTitle() . '\'' . $forExtension);
					/** @var Tx_Smoothmigration_Checks_AbstractCheckProcessor $processor */
					$processor = $check->getProcessor();
					if (trim($extensionKey)) {
						$processor->setExtensionKey($extensionKey);
					}
					$processor->execute();
					$issueRepository = $this->objectManager->get('Tx_Smoothmigration_Domain_Repository_IssueRepository');
					foreach ($processor->getIssues() as $issue) {
						$issueRepository->add($issue);
					}

					/** @var Tx_Extbase_Persistence_Manager $persistenceManger */
					$persistenceManger = $this->objectManager->get('Tx_Extbase_Persistence_Manager');
					$persistenceManger->registerRepositoryClassName('Tx_Smoothmigration_Domain_Repository_IssueRepository');
					$persistenceManger->persistAll();
					$this->issueReport(count($processor->getIssues()), $extensionKey);
				}
			} catch (Tx_Extbase_MVC_Exception_Command $exception) {
				$this->message($exception->getMessage());

				return;
			}
		}
	}

	/**
	 * Run all checks on all- or on a single extension
	 *
	 * @param string $extensionKey A single extension to migratie
	 *
	 * @return void
	 */
	public function checkAllCommand($extensionKey = '') {
		$availableCommands = $this->commandManager->getAvailableCommands('check');
		/** @var Tx_Smoothmigration_Checks_AbstractCheckDefinition $command */
		foreach ($availableCommands['check'] as $command) {
			$commandIdentifier = $command->getIdentifier();
			$this->checkCommand($commandIdentifier, $extensionKey);
		}
	}

	/**
	 * Display available migrations
	 *
	 * The migrate command displays available migrations
	 *
	 * @param string $commandIdentifier Identifier of a command for more details
	 * @param string $extensionKey A single extension to migratie
	 * @param boolean $experimental Execute experimental migrations
	 *
	 * @return void
	 */
	public function migrationCommand($commandIdentifier = NULL, $extensionKey = '', $experimental = FALSE) {
		if ($commandIdentifier === NULL) {
			$this->displayActionIndex('Migration');
		} else {
			try {
				/** @var Tx_Smoothmigration_Domain_Interface_Migration $migration */
				$migration = $this->commandManager->getCommandByTypeAndIdentifier('Migration', $commandIdentifier);
				if ($migration) {
					$forExtension = (trim($extensionKey)) ? ' for extension: ' . $extensionKey : '';
					$this->headerMessage('Migration: \'' . $migration->getTitle() . '\'' . $forExtension);
					/** @var Tx_Smoothmigration_Migrations_AbstractMigrationProcessor $processor */
					$processor = $migration->getProcessor();
					if (trim($extensionKey)) {
						$processor->setExtensionKey($extensionKey);
					}
					if ((bool)$experimental) {
						$processor->setExperimental($experimental);
					}
					$processor->setCommandController($this);
					$processor->execute();

					/** @var Tx_Extbase_Persistence_Manager $persistenceManger */
					$persistenceManger = $this->objectManager->get('Tx_Extbase_Persistence_Manager');
					$persistenceManger->persistAll();
				}
			} catch (Tx_Extbase_MVC_Exception_Command $exception) {
				$this->message($exception->getMessage());

				return;
			}
		}
	}

	/**
	 * Display report for all issues or for a single extension
	 *
	 * The report command displays a report of found issues
	 *
	 * @param string $extensionKey A single extension to migratie
	 *
	 * @return void
	 */
	public function reportCommand($extensionKey = FALSE) {
		$registry = Tx_Smoothmigration_Service_Check_Registry::getInstance();
		/** @var Tx_Smoothmigration_Domain_Repository_IssueRepository $issueRepository */
		$issueRepository = $this->objectManager->get('Tx_Smoothmigration_Domain_Repository_IssueRepository');
		if ($extensionKey) {
			$issuesWithInspections = $issueRepository->findByExtensionGroupedByInspection($extensionKey);
		} else {
			$issuesWithInspections = $issueRepository->findAllGroupedByExtensionAndInspection();
		}
		if (count($issuesWithInspections)) {
			foreach ($issuesWithInspections as $extensionKey => $inspections) {
				$count = 0;
				foreach ($inspections as $issues) {
					/** @var Tx_Smoothmigration_Domain_Model_Issue $singleIssue */
					foreach ($issues as $singleIssue) {
						if ($count == 0) {
							// Render Extension Key
							$this->headerMessage('Extension : ' . $singleIssue->getExtension(), 'info');
						}
						$check = $registry->getActiveCheckByIdentifier($singleIssue->getInspection());
						if ($check) {
							$this->message($check->getResultAnalyzer()->getSolution($singleIssue));
							$count++;
						}
					}
				}
				$this->issueReport($count, $extensionKey);
			}
		} else {
			$this->issueReport('0', $extensionKey);
		}
	}

	/**
	 * Display index of actions
	 *
	 * @param string $type
	 *
	 * @return void
	 */
	protected function displayActionIndex($type = 'Check') {
		$this->headerMessage('Avaliable ' . $type . 's:', 'info');
		$availableCommands = $this->commandManager->getAvailableCommands(strtolower($type));

		$colorizedIdentifierLength = $this->getMaximumIdentifierLength($availableCommands[strtolower($type)], TRUE);
		$identifierLength = $this->getMaximumIdentifierLength($availableCommands[strtolower($type)]);

		$this->message(vsprintf('%-' . $identifierLength . 's %s', array(
			$type . ' Identifier',
			'Description'
		)));
		$this->horizontalLine();

		/** @var Tx_Smoothmigration_Checks_AbstractCheckDefinition $command */
		foreach ($availableCommands[strtolower($type)] as $command) {
			$description = wordwrap($command->getShortDescription(), TERMINAL_WIDTH - $identifierLength - 3, PHP_EOL . str_repeat(' ', $identifierLength + 4), TRUE);
			$shortCommandIdentifier = $command->getIdentifier();
			$this->message(vsprintf('%-' . $colorizedIdentifierLength . 's %s', array(
				$this->successString($shortCommandIdentifier),
				$description
			)));

		}
		$this->message();
		$this->message('Usage: ./cli_dispatch.phpsh extbase smoothmigration:' . strtolower($type) . ' <' . $type . ' Identifier> [extensionName]');
		$this->message();
	}

	/**
	 * Get the maximum length of the indentifiers
	 *
	 * @param array $commands
	 * @param bool $colorizedLength
	 *
	 * @return int
	 */
	protected function getMaximumIdentifierLength($commands, $colorizedLength = FALSE) {
		$length = 0;

		if ($colorizedLength) {
			/** @var Tx_Smoothmigration_Checks_AbstractCheckDefinition $command */
			foreach ($commands as $command) {
				if ($length < strlen($this->successString($command->getIdentifier()))) {
					$length = strlen($this->successString($command->getIdentifier()));
				}
			}
		} else {
			/** @var Tx_Smoothmigration_Checks_AbstractCheckDefinition $command */
			foreach ($commands as $command) {
				if ($length < strlen($command->getIdentifier())) {
					$length = strlen($command->getIdentifier());
				}
			}
		}

		return $length;
	}

	/**
	 * Show an issue report
	 *
	 * @param integer $count
	 * @param string $extensionKey
	 */
	protected function issueReport($count, $extensionKey = '') {

		$forExtension = (trim($extensionKey)) ? ' for extension: ' . $extensionKey : '';
		switch ((int)$count) {
			case 0:
				$this->successMessage('No issues found' . $forExtension, TRUE);
				break;
			case 1:
				$this->warningMessage($count . ' issue found' . $forExtension, TRUE);
				break;
			default:
				$this->warningMessage($count . ' issues found' . $forExtension, TRUE);
		}
	}
}
