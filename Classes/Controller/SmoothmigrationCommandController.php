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
class Tx_Smoothmigration_Controller_SmoothmigrationCommandController extends Tx_Extbase_MVC_Controller_CommandController {

	/**
	 * @var array
	 */
	protected $autoCompleteValues = array();

	/**
	 * @var array
	 */
	protected $availableActions = array();

	/**
	 * @var array<\TYPO3\CMS\Extbase\Mvc\Cli\Command>
	 */
	protected $availableCommands = NULL;

	/**
	 * True if we are running in interactive mode
	 *
	 * @var bool
	 */
	protected $isInInteractiveMode = FALSE;

	/**
	 * True if we are running the checkAll comman
	 *
	 * @var bool
	 */
	protected $isCheckingAll = FALSE;

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
	 * @var Tx_Smoothmigration_Service_MessageService
	 */
	protected $messageBus;

	/**
	 * inject the messageBus
	 *
	 * @param Tx_Smoothmigration_Service_MessageService $messageBus
	 * @return void
	 */
	public function injectMessageBus(Tx_Smoothmigration_Service_MessageService $messageBus) {
		$this->messageBus = $messageBus;
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
					$this->messageBus->headerMessage('Check: \'' . $check->getTitle() . '\'' . $forExtension);
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
					if ($this->isInInteractiveMode && !$this->isCheckingAll) {
						$this->checkCommand();
					}
				}
			} catch (Tx_Extbase_MVC_Exception_Command $exception) {
				$this->messageBus->message($exception->getMessage());

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
		$this->isCheckingAll = TRUE;
		$availableCommands = $this->commandManager->getAvailableCommands();
		/** @var Tx_Smoothmigration_Checks_AbstractCheckDefinition $command */
		foreach ($availableCommands['check'] as $command) {
			$commandIdentifier = $command->getIdentifier();
			$this->checkCommand($commandIdentifier, $extensionKey);
		}
		$this->isCheckingAll = FALSE;
		if ($this->isInInteractiveMode) {
			$this->checkCommand();
		}
	}

	/**
	 * Run in interactive mode
	 *
	 * @return void
	 */
	public function interactiveCommand() {
		$this->isInInteractiveMode = TRUE;
		$this->messageBus->headerMessage('Smooth Migration:', 'info');
		$this->getAvailableCommands();

		if ($this->availableActions === array()) {
			$this->availableActions = $this->commandManager->getAvailableCommands();
		}
		foreach ($this->availableActions as $type => $actions) {
			foreach ($actions as $action) {
				$this->autoCompleteValues['actions'][$type][] = $action->getIdentifier();
			}
		}

		$colorizedIdentifierLength = $this->getMaximumCommandNameLength($this->availableCommands, TRUE);
		$identifierLength = $this->getMaximumCommandNameLength($this->availableCommands);

		$this->messageBus->message(vsprintf('   %-' . $identifierLength . 's %s', array(
			'Identifier',
			'Description'
		)));
		$this->messageBus->horizontalLine();

		/** @var \TYPO3\CMS\Extbase\Mvc\Cli\Command $command */
		$actions = array();
		$counter = 1;
		foreach ($this->availableCommands as $command) {
			$description = wordwrap($command->getShortDescription(), TERMINAL_WIDTH - $identifierLength - 6, PHP_EOL . str_repeat(' ', $identifierLength + 8), TRUE);
			$shortCommandIdentifier = $command->getControllerCommandName();
			$this->messageBus->message(vsprintf('%s) %-' . $colorizedIdentifierLength . 's %s', array(
				$counter,
				$this->messageBus->successString($shortCommandIdentifier),
				$description
			)));
			$actions[$counter] = $shortCommandIdentifier;
			$counter++;
		}
		$this->messageBus->message();
		$this->messageBus->setCompletions(array(
			'actions' => $this->autoCompleteValues['actions'],
			'commands' => $this->autoCompleteValues['commands'],
			'extensions' => Tx_Smoothmigration_Utility_ExtensionUtility::getLoadedExtensionsFiltered()
		));
		$this->messageBus->usage();
		$response = $this->messageBus->prompt();
		$this->messageBus->message();

		$responseParts = explode(' ', $response);
		$code = array_shift($responseParts);
		switch ($code) {
			case '0':
			case 'check':
				readline_add_history($response);
				$this->checkCommand(array_shift($responseParts), array_shift($responseParts));
				break;
			case '1':
			case 'migration':
				readline_add_history($response);
				$this->migrationCommand(array_shift($responseParts), array_shift($responseParts));
				break;
			default:
				if (array_key_exists($code, $actions)) {
					readline_add_history($response);
					$method = $actions[$code] . 'Command';
					$this->$method(array_shift($responseParts), array_shift($responseParts));
				} elseif (in_array($code, $actions)) {
					readline_add_history($response);
					$method = $code . 'Command';
					$this->$method(array_shift($responseParts), array_shift($responseParts));
				} elseif ($code == -1) {
					$this->messageBus->errorMessage('Can\'t go furter back.');
				} else {
					$this->messageBus->errorMessage('Uknown comand: ' . $code);
				}
		}
		$this->interactiveCommand();
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
					$this->messageBus->headerMessage('Migration: \'' . $migration->getTitle() . '\'' . $forExtension);
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
				$this->messageBus->message($exception->getMessage());

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
	public function reportCommand($extensionKey = '') {
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
							$this->messageBus->headerMessage('Extension : ' . $singleIssue->getExtension(), 'info');
						}
						$check = $registry->getActiveCheckByIdentifier($singleIssue->getInspection());
						$migrationStatus = $singleIssue->getMigrationStatus();
						Tx_Smoothmigration_Domain_Interface_Migration::SUCCESS;
						if ($check) {
							switch ($migrationStatus) {
								case Tx_Smoothmigration_Domain_Interface_Migration::SUCCESS:
									$this->messageBus->successMessage($check->getResultAnalyzer()->getSolution($singleIssue));
									break;
								default:
									$this->messageBus->message($check->getResultAnalyzer()->getSolution($singleIssue));
									$count++;
							}
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
	 * Returns an array of all commands in this class
	 *
	 * @return array<\TYPO3\CMS\Extbase\Mvc\Cli\Command>
	 * @api
	 */
	protected function getAvailableCommands() {
		if ($this->availableCommands === NULL) {
			$this->availableCommands = array();

			foreach (get_class_methods(get_class($this)) as $methodName) {
				if (substr($methodName, -7, 7) === 'Command' && $methodName !== 'interactiveCommand') {

					/** @var \TYPO3\CMS\Extbase\Mvc\Cli\Command $command */
					$command = $this->objectManager->get('TYPO3\\CMS\\Extbase\\Mvc\\Cli\\Command', get_class($this), substr($methodName, 0, -7));
					$this->availableCommands[] = $command;
					$this->autoCompleteValues['commands'][] = $command->getControllerCommandName();
				}
			}
		}
		return $this->availableCommands;
	}

	/**
	 * Display index of actions
	 *
	 * @param string $type
	 *
	 * @return void
	 */
	protected function displayActionIndex($type = 'Check') {
		$this->messageBus->headerMessage('Avaliable ' . $type . 's:', 'info');
		$type = strtolower($type);
		if ($this->availableActions === array()) {
			$this->availableActions = $this->commandManager->getAvailableCommands();
		}

		$colorizedIdentifierLength = $this->getMaximumIdentifierLength($this->availableActions[$type], TRUE);
		$identifierLength = $this->getMaximumIdentifierLength($this->availableActions[$type]);

		$this->messageBus->message(vsprintf('    %-' . $identifierLength . 's %s', array(
			'Identifier',
			'Description'
		)));
		$this->messageBus->horizontalLine();

		/** @var Tx_Smoothmigration_Checks_AbstractCheckDefinition $command */
		$counter = 1;
		foreach ($this->availableActions[$type] as $command) {
			$this->autoCompleteValues['actions'][] = $command->getIdentifier();
			$description = wordwrap($command->getShortDescription(), TERMINAL_WIDTH - $identifierLength - 7, PHP_EOL . str_repeat(' ', $identifierLength + 7), TRUE);
			$shortCommandIdentifier = $command->getIdentifier();
			$this->messageBus->message(vsprintf('%2s) %-' . $colorizedIdentifierLength . 's %s', array(
				$counter,
				$this->messageBus->successString($shortCommandIdentifier),
				$description
			)));
			$counter++;
		}
		$this->messageBus->message();
		if ($this->isInInteractiveMode) {
			$this->messageBus->setCompletions(array(
				'actions' => $this->autoCompleteValues['actions'],
				'extensions' => Tx_Smoothmigration_Utility_ExtensionUtility::getLoadedExtensionsFiltered()
			));
			$actions = $this->autoCompleteValues['actions'][$type];
			$this->messageBus->usage();
			$response = $this->messageBus->prompt();
			$this->messageBus->message();
			list($code, $extension) = explode(' ', $response);
			if (array_key_exists($code, $actions)) {
				readline_add_history($response);
				$method = $type . 'Command';
				$this->$method($actions[$code], $extension);
			} elseif (in_array($code, $actions)) {
				readline_add_history($response);
				$method = $type . 'Command';
				$this->$method($code, $extension);
			} elseif ($code == -1) {
				$this->interactiveCommand();
			} else {
				$this->messageBus->errorMessage('Uknown comand: ' . $code);
				$this->interactiveCommand();
			}
		} else {
			$this->messageBus->message('Usage: ./cli_dispatch.phpsh extbase smoothmigration:' . $type . ' <Identifier> [extensionName]');
		}
		$this->messageBus->message();
	}

	/**
	 * Get the maximum length of the command names
	 *
	 * @param array $commands
	 * @param bool $colorizedLength
	 *
	 * @return int
	 */
	protected function getMaximumCommandNameLength($commands, $colorizedLength = FALSE) {
		$length = 0;

		/** @var \TYPO3\CMS\Extbase\Mvc\Cli\Command $command */
		if ($colorizedLength) {
			foreach ($commands as $command) {
				if ($length < strlen($this->messageBus->successString($command->getControllerCommandName()))) {
					$length = strlen($this->messageBus->successString($command->getControllerCommandName()));
				}
			}
		} else {
			foreach ($commands as $command) {
				if ($length < strlen($command->getControllerCommandName())) {
					$length = strlen($command->getControllerCommandName());
				}
			}
		}

		return $length;
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
				if ($length < strlen($this->messageBus->successString($command->getIdentifier()))) {
					$length = strlen($this->messageBus->successString($command->getIdentifier()));
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
				$this->messageBus->successMessage('No issues found' . $forExtension, TRUE);
				break;
			case 1:
				$this->messageBus->warningMessage($count . ' issue found' . $forExtension, TRUE);
				break;
			default:
				$this->messageBus->warningMessage($count . ' issues found' . $forExtension, TRUE);
		}
	}

	/**
	 * @return Tx_Smoothmigration_Service_MessageService
	 */
	public function getMessageBus() {
		return $this->messageBus;
	}

}
