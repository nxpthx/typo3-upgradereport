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

require_once(PATH_t3lib . 'class.t3lib_cli.php');

	// I can haz color / use unicode?
if (DIRECTORY_SEPARATOR !== '\\') {
	define('USE_COLOR', function_exists('posix_isatty') && posix_isatty(STDOUT));
	define('UNICODE', TRUE);
} else {
	define('USE_COLOR', getenv('ANSICON') !== FALSE);
	define('UNICODE', FALSE);
}

	// Get terminal width
if (@exec('tput cols')) {
	define('TERMINAL_WIDTH', exec('tput cols'));
} else {
	define('TERMINAL_WIDTH', 79);
}


/**
 * Class tx_smoothmigration_cli
 */
class tx_smoothmigration_cli extends t3lib_cli {

	/**
	 * The issue repostitory
	 *
	 * @var Tx_Smoothmigration_Domain_Repository_IssueRepository
	 */
	protected $issueRepository;

	/**
	 * Constructor
	 */
	public function __construct() {
			// Running parent class constructor
		parent::t3lib_cli();

		$this->issueRepository = t3lib_div::makeInstance('Tx_Smoothmigration_Domain_Repository_IssueRepository');

			// Adding options to help archive:
		$this->cli_options = array();
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
			case 'executeAllChecks':
				$this->executeAllChecks();
				break;
			case 'report':
				$this->report();
				break;
			case 'migrate':
				$migrationTask = ((string)$this->cli_args['_DEFAULT'][2]) ?: '';
				$experimental = in_array((string)$this->cli_args['--experimental'][0],  array('y', 'yes', 'true', '1'));
				$this->migrate($migrationTask, $experimental);
				break;
			default:
				$this->cli_validateArgs();
				$this->cli_help();
				exit;
		}
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
						$this->headerMessage('Extension : ' . $singleIssue->getExtension(), 'info');
					}
					$check = $registry->getActiveCheckByIdentifier($singleIssue->getInspection());
					$this->message($check->getResultAnalyzer()->getSolution($singleIssue));
					$count ++;
				}
			}
			$this->successMessage('Total: ' . $count . ' issues in ' . $extensionKey . LF);
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
		foreach ($checks as $singleCheck) {
			$processor = $singleCheck->getProcessor();
			$processor->execute();
			foreach ($processor->getIssues() as $issue) {
				$this->issueRepository->add($issue);
			}
			$issues = $issues + count($processor->getIssues());
			$this->infoMessage('Check: ' . $singleCheck->getTitle() . ' has ' . count($processor->getIssues()) . ' issues ');
		}
		$this->infoMessage(LF . 'Total Issues : ' . $issues);
	}

	/**
	 * Migrate
	 *
	 * @param string $migrationTaskKey
	 * @param boolean $experimental When TRUE, try to process experimental migrations as well
	 * @return void
	 */
	private function migrate($migrationTaskKey, $experimental) {
		$migrationTask = NULL;
		$registry = Tx_Smoothmigration_Service_Migration_Registry::getInstance();

		if (!empty($migrationTaskKey)) {
			$migrationTask = $registry->getActiveMigrationByCliKey($migrationTaskKey);
		}
		if ($migrationTask === NULL) {
			$this->message('Please choose a migration to execute.' . LF . LF . 'Possible options are:' .  LF);
			$this->message($this->getMigrations());
			return;
		}

		/** @var Tx_Smoothmigration_Migrations_AbstractMigrationProcessor $processor */
		$processor = $migrationTask->getProcessor();
        $message = new Tx_Smoothmigration_Migrations_MigrationMessageManager();
        $message->setCliDispatcher($this);
        $processor->setMigrationMessageManager($message);
		$processor->setExperimental($experimental);
		$processor->execute();
	}

	/**
	 * Get available migrations
	 *
	 * @return string
	 */
	private function getMigrations() {
		$output = '';
		$registry = Tx_Smoothmigration_Service_Migration_Registry::getInstance();
		$migrations = $registry->getActiveMigrations();
		$maxLen = 0;
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

	/**
	 * Normal message
	 *
	 * @param $message
	 * @return void
	 */
	public function message($message = NULL) {
		$this->cli_echo($message . LF);
	}

	/**
	 * Informational message
	 *
	 * @param string $message
	 * @param boolean $showIcon
	 * @return void
	 */
	public function infoMessage($message = NULL, $showIcon = FALSE) {
		$icon = '';
		if ($showIcon && UNICODE) {
			$icon = '★ ';
		}
		if (USE_COLOR) {
			$this->cli_echo("\033[0;36m" . $icon . $message . "\033[0m" . LF);
		} else {
			$this->cli_echo($icon . $message . LF);
		}
	}

	/**
	 * Error message
	 *
	 * @param string $message
	 * @param boolean $showIcon
	 * @return void
	 */
	public function errorMessage($message = NULL, $showIcon = FALSE) {
		$icon = '';
		if ($showIcon && UNICODE) {
			$icon = '✖ ';
		}
		if (USE_COLOR) {
			$this->cli_echo("\033[31m" . $icon . $message . "\033[0m" . LF);
		} else {
			$this->cli_echo($icon . $message . LF);
		}
	}

	/**
	 * Warning message
	 *
	 * @param string $message
	 * @param boolean $showIcon
	 * @return void
	 */
	public function warningMessage($message = NULL, $showIcon = FALSE) {
		$icon = '';
		if ($showIcon) {
			$icon = '! ';
		}
		if (USE_COLOR) {
			$this->cli_echo("\033[0;33m" . $icon . $message . "\033[0m" . LF);
		} else {
			$this->cli_echo($icon . $message . LF);
		}
	}

	/**
	 * Success message
	 *
	 * @param string $message
	 * @param boolean $showIcon
	 * @return void
	 */
	public function successMessage($message = NULL, $showIcon = FALSE) {
		$icon = '';
		if ($showIcon && UNICODE) {
			$icon = '✔ ';
		}
		if (USE_COLOR) {
			$this->cli_echo("\033[0;32m" . $icon . $message . "\033[0m" . LF);
		} else {
			$this->cli_echo($icon . $message . LF);
		}
	}

	/**
	 * Show a header message
	 *
	 * @param $message
	 * @param string $style
	 * @return void
	 */
	public function headerMessage($message, $style = '') {
			// Crop the message
		$message = substr($message, 0, TERMINAL_WIDTH - 3);
		if (UNICODE) {
			$linePaddingLength = mb_strlen('─') * (TERMINAL_WIDTH - 2);
			$message =
				'┌' . str_pad('', $linePaddingLength, '─') . '┐' . LF .
				'│ ' . str_pad($message, TERMINAL_WIDTH - 3) . '│' . LF .
				'└' . str_pad('', $linePaddingLength, '─') . '┘';
		} else {
			$message =
				str_pad('', TERMINAL_WIDTH, '-') . LF .
				'+ ' . str_pad($message, TERMINAL_WIDTH - 3) . '+' . LF .
				str_pad('', TERMINAL_WIDTH, '-');
		}
		switch ($style) {
			case 'error':
				$this->errorMessage($message);
				break;
			case 'info':
				$this->infoMessage($message);
				break;
			case 'success':
				$this->successMessage($message);
				break;
			case 'warning':
				$this->warningMessage($message);
				break;
			default:
				$this->message($message);
		}
	}

}

$cleanerObj = t3lib_div::makeInstance('tx_smoothmigration_cli');
$cleanerObj->cli_main($_SERVER['argv']);

?>