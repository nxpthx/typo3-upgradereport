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
 * Class Tx_Smoothmigration_Migrations_Core_Namespace_Processor
 *
 */
class Tx_Smoothmigration_Migrations_Core_Namespace_Processor extends Tx_Smoothmigration_Migrations_AbstractMigrationProcessor {

	/**
	 * Class Alias Map
	 *
	 * @var array
	 */
	protected $classAliasMap;

	/**
	 * Legacy Classes
	 *
	 * @var array
	 */
	protected $legacyClasses;

	/**
	 * Class Alias Provider
	 *
	 * @var Tx_Smoothmigration_Service_ClassAliasProvider
	 */
	private $classAliasProvider;

	/**
	 * @return void
	 */
	public function execute() {
		$this->classAliasProvider = $this->objectManager->get('Tx_Smoothmigration_Service_ClassAliasProvider');
		$this->legacyClasses = $this->classAliasProvider->getLegacyClasses();
		$this->classAliasMap = $this->classAliasProvider->getClassAliasMap();

		$this->getPendingIssues($this->parentMigration->getIdentifier());
		if (count($this->issues)) {
			foreach ($this->issues as $issue) {
				$this->handleIssue($issue);
				$this->issueRepository->update($issue);
			}
		} else {
			$this->messageService->successMessage('No issues found', TRUE);
		}

		$persistenceManger = $this->objectManager->get('Tx_Extbase_Persistence_Manager');
		$persistenceManger->persistAll();
	}

	/**
	 * Get replacement class
	 *
	 * @param $class
	 *
	 * @return string
	 */
	protected function getReplacementClass($class) {
		$replacement = '';
		if (array_key_exists($class, $this->legacyClasses)) {
			$replacement = $this->legacyClasses[$class];
		} elseif (array_key_exists($class, $this->classAliasMap)) {
			$replacement = $this->classAliasMap[$class];
		}

		return $replacement;
	}

	/**
	 * Handle issue
	 *
	 * @param Tx_Smoothmigration_Domain_Model_Issue $issue
	 *
	 * @return void
	 */
	protected function handleIssue(Tx_Smoothmigration_Domain_Model_Issue $issue) {
		if (is_string($issue->getLocationInfo())) {
			$locationInfo = unserialize($issue->getLocationInfo());
		} else {
			$locationInfo = $issue->getLocationInfo();
		}
		$this->performReplacement($issue, $locationInfo);
	}

	/**
	 * Perform the actual replacement
	 *
	 * @param Tx_Smoothmigration_Domain_Model_Issue $issue
	 * @param object $locationInfo
	 *
	 * @return boolean
	 */
	protected function performReplacement(Tx_Smoothmigration_Domain_Model_Issue $issue, $locationInfo) {

		$search = trim($locationInfo->getMatchedString());
		$replacement = $this->getReplacementClass($search);

		$this->messageService->message($locationInfo->getFilePath() . ' line: ' . $locationInfo->getLineNumber() . LF .
		                              'Replacing [' . $search . '] =>' .
		                              ' [' . $replacement . ']');

		if ($issue->getMigrationStatus() != 0) {
			$this->messageService->successMessage('already migrated', TRUE);

			return;
		}

		if (!file_exists($locationInfo->getFilePath())) {
			$issue->setMigrationStatus(Tx_Smoothmigration_Domain_Interface_Migration::ERROR_FILE_NOT_FOUND);
			$this->messageService->errorMessage('Error, file not found', TRUE);

			return;
		}
		if (!is_writable($locationInfo->getFilePath())) {
			$issue->setMigrationStatus(Tx_Smoothmigration_Domain_Interface_Migration::ERROR_FILE_NOT_WRITABLE);
			$this->messageService->errorMessage('Error, file not writable', TRUE);

			return;
		}

		$fileObject = new SplFileObject($locationInfo->getFilePath());
		$newFileContent = '';

		foreach ($fileObject as $lineNumber => $lineContent) {

			if ($lineNumber + 1 != $locationInfo->getLineNumber()) {
				$newFileContent .= $lineContent;
			} else {
				$newLineContent = str_replace($search, $replacement, $lineContent);
				if ($newLineContent == $lineContent) {
					$issue->setMigrationStatus(Tx_Smoothmigration_Domain_Interface_Migration::ERROR_FILE_NOT_CHANGED);
					$this->messageService->errorMessage($this->ll('migrationsstatus.4'), TRUE);

					return;
				}
				$newFileContent .= $newLineContent;
			}
		}

		file_put_contents($locationInfo->getFilePath(), $newFileContent);
		$issue->setMigrationStatus(Tx_Smoothmigration_Domain_Interface_Migration::SUCCESS);
		$this->messageService->successMessage('Succes' . LF, TRUE);
	}

}
