<?php
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2013 Peter Beernink <p.beernink@drecomm.nl>
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
 * Class Tx_Smoothmigration_Migrations_Core_RequireOnceInExtensions_Processor
 *
 * @author Peter Beernink
 */
class Tx_Smoothmigration_Migrations_Core_RequireOnceInExtensions_Processor implements Tx_Smoothmigration_Domain_Interface_MigrationProcessor {

	/**
	 * @var Tx_Smoothmigration_Domain_Repository_IssueRepository
	 */
	protected $issueRepository;

	/**
	 *
	 * @var Tx_Extbase_Object_Manager
	 */
	protected $objectManager;

	/**
	 * The issues found
	 *
	 * @var array
	 */
	protected $issues;

	/**
	 * Inject the issue repository
	 *
	 * @param Tx_Smoothmigration_Domain_Repository_IssueRepository $issueRepository
	 * @return void
	 */
	public function injectIssueRepository(Tx_Smoothmigration_Domain_Repository_IssueRepository $issueRepository) {
		$this->issueRepository = $issueRepository;
	}

	/**
	 * Inject the object manager
	 *
	 * @param Tx_Extbase_Object_Manager $objectManager
	 * @return void
	 */
	public function injectObjectManager(Tx_Extbase_Object_Manager $objectManager) {
		$this->objectManager = $objectManager;
	}

	/**
	 * @var Tx_Smoothmigration_Migrations_Core_RequireOnceInExtensions_Definition
	 */
	protected $parentMigration;

	/**
	 * @param Tx_Smoothmigration_Domain_Interface_Migration $migration
	 */
	public function __construct(Tx_Smoothmigration_Domain_Interface_Migration $migration) {
		$this->parentMigration = $migration;
	}

	/**
	 * Execute migration
	 *
	 * @return string
	 */
	public function execute() {
		$output = '';
		$this->getIssues();
		foreach ($this->issues as $issue) {
			$output .= $this->handleIssue($issue) . "\n";
			$this->issueRepository->update($issue);
		}

		$persistenceManger = $this->objectManager->get('Tx_Extbase_Persistence_Manager');
		$persistenceManger->persistAll();
		return $output;
	}

	/**
	 * Any issues?
	 *
	 * @return boolean
	 */
	public function hasIssues() {
		if ($this->issues === NULL) {
			$this->getIssues();
		}
		return (count($this->issues) > 0);
	}

	/**
	 * See if there are any issues
	 *
	 * @return array
	 */
	public function getIssues() {
		if ($this->issues === NULL) {
			$this->issues = $this->issueRepository->findByInspection($this->parentMigration->getIdentifier())->toArray();
		}
		return $this->issues;
	}

	/**
	 * Handle issue
	 *
	 * @param Tx_Smoothmigration_Domain_Model_Issue $issue
	 * @return string
	 */
	protected function handleIssue(Tx_Smoothmigration_Domain_Model_Issue $issue) {
		if (is_string($issue->getLocationInfo())) {
			$locationInfo = unserialize($issue->getLocationInfo());
		} else {
			$locationInfo = $issue->getLocationInfo();
		}

		$output = $locationInfo->getFilePath() . ':' . $locationInfo->getLineNumber() . ' [' . trim($locationInfo->getMatchedString()) . '] => ';

		if ($issue->getMigrationStatus() != 0) {
			return $output . 'already migrated';
		}
		$newFileContent = '';
		if (!file_exists($locationInfo->getFilePath())) {
			$issue->setMigrationStatus(Tx_Smoothmigration_Domain_Interface_Migration::ERROR_FILE_NOT_FOUND);
			return $output . 'Error, file not found';
		}
		if (!is_writable($locationInfo->getFilePath())) {
			$issue->setMigrationStatus(Tx_Smoothmigration_Domain_Interface_Migration::ERROR_FILE_NOT_WRITABLE);
			return $output . 'Error, file not writable';
		}
		$fileObject = new SplFileObject($locationInfo->getFilePath());
		foreach ($fileObject as $lineNumber => $lineContent) {
			if ($lineNumber + 1 != $locationInfo->getLineNumber()) {
				$newFileContent .= $lineContent;
			} else {
				$newLineContent = str_replace($locationInfo->getMatchedString(), '', $lineContent);
				if ($newLineContent == $lineContent) {
					$issue->setMigrationStatus(Tx_Smoothmigration_Domain_Interface_Migration::ERROR_FILE_NOT_CHANGED);
					return $output . 'Error, file not changed';
				}
				$newFileContent .= $newLineContent;
			}
		}
		file_put_contents($locationInfo->getFilePath(), $newFileContent);
		$issue->setMigrationStatus(Tx_Smoothmigration_Domain_Interface_Migration::SUCCESS);
		return $output . 'Succes';
	}

}

?>