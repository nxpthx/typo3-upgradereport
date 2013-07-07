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




class tx_upgradereport_cli extends t3lib_cli {




	/**
	 * Constructor
	 *
	 * @return	void
	 */
	public function tx_upgradereport_cli() {
		// Running parent class constructor


		parent::t3lib_cli();
		$this->issueRepository = t3lib_div::makeInstance('Tx_Upgradereport_Domain_Repository_IssueRepository');


		// Adding options to help archive:
		$this->cli_options = array();
		$this->cli_options[] = array('report ', 'Detailed Report including extension, codeline and check');
		$this->cli_options[] = array('overview ', 'Just an overall overview');
		$this->cli_options[] = array('help ', 'Display this message');

		// Setting help texts:
		$this->cli_help['name'] = 'Upgradereport Reporct CLI Agent';
		$this->cli_help['synopsis'] = 'cli_dispatch.phpsh upgradereport {task}' ."\n";


		$this->cli_help['description'] = 'Executes the report of the upgradereport extension on CLI Basis';
		$this->cli_help['examples'] = './typo3/cli_dispatch.phpsh upgradereport report';
		$this->cli_help['author'] = 'Ingo Schmitt <is@marketing-factory.de>';
	}

	/**
	 * CLI engine
	 *
	 * @param array $argv command line arguments
	 * @return string
	 */
	public function cli_main($argv) {
		// Force user to admin state and set workspace to "Live":


		// Print Howto:

		// Print help
		$task = (string) $this->cli_args['_DEFAULT'][1];
		if (!$task) {
			$this->cli_validateArgs();
			$this->cli_help();
			exit;
		}

		// Analysis type:
		switch ((string) $task) {
			case 'overview':
				$this->cli_echo($this->overview());
			break;
			case 'report':
				$this->cli_echo($this->report());
			break;
			break;
		}
	}

	/**
	 * Renders a Report of Extensions as ASCI
	 *
	 * @return string
	 */
	private function report() {
		$report = '';
		$registry = Tx_Upgradereport_Service_Check_Registry::getInstance();
		$issuesWithInspections = $this->issueRepository->findAllGroupedByExtensionAndInspection();
		foreach ($issuesWithInspections as $Inspections) {
			$count=0;
			foreach ($Inspections as $Issues) {
				foreach($Issues as $oneIssue) {
					if ($count == 0) {
						// Render Extension Key
						$report .= '----------------------------------------------------------------' . "\n";
						$report .= '+ Extension : ' . sprintf("%-49s" ,$oneIssue->getExtension()). '+'. "\n";
						$report .= '----------------------------------------------------------------' . "\n";

					}
					$check = $registry->getActiveCheckByIdentifier($oneIssue->getInspection());
					$report .= $check->getResultAnalyzer()->getSolution($oneIssue) ."\n";
					$count ++;
				}
			}
			$report .= 'Total : ' .$count . ' Issues in ' . $oneIssue->getExtension();
			$report .= "\n";
			$report .= "\n";
		}
		return $report;
	}

	/**
	 * @return string	Report of Issues
	 */
	private function overview() {
		$report = '';
		$issues = 0;
		$registry = Tx_Upgradereport_Service_Check_Registry::getInstance();
		$checks = $registry->getActiveChecks();
		foreach($checks as $oneCheck) {
			$processor = $oneCheck->getProcessor();
			$processor->executeCheck();
			foreach ($processor->getIssues() as $issue) {
				$this->issueRepository->add($issue);
			}
			$issues = $issues + count($processor->getIssues());
			$report .= 'Check:' .$oneCheck->getTitle() . ' Has ' . count($processor->getIssues()) .' Issues ';
			$report .= "\n";
		}
		$report .= "\n" . 'Total Issues : ' . $issues . "\n";
		return $report;
	}

}

$cleanerObj = t3lib_div::makeInstance('tx_upgradereport_cli');
$cleanerObj->cli_main($_SERVER['argv']);

if (defined('TYPO3_MODE') && $GLOBALS['TYPO3_CONF_VARS'][TYPO3_MODE]['XCLASS']['ext/upgradereport/Classes/cli/class.upgradereport_cli.php']) {
	include_once($GLOBALS['TYPO3_CONF_VARS'][TYPO3_MODE]['XCLASS']['ext/upgradereport/Classes/cli/class.upgradereport_cli.php']);
}
?>