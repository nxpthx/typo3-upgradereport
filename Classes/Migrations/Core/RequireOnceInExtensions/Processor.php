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
class Tx_Smoothmigration_Migrations_Core_RequireOnceInExtensions_Processor extends Tx_Smoothmigration_Migrations_AbstractMigrationProcessor {

	/**
	 * Execute migration
	 *
	 * @return void
	 */
	public function execute() {
        $this->migrationMessageManager->headerMessage($this->parentMigration->getTitle(), 'info');

		$this->getIssues();
		if (count($this->issues)) {
			foreach ($this->issues as $issue) {
				$this->handleIssue($issue);
				$this->migrationMessageManager->message();

				$this->issueRepository->update($issue);
			}
		} else {
			$this->migrationMessageManager->successMessage('No issues found', TRUE);
		}

		$persistenceManger = $this->objectManager->get('Tx_Extbase_Persistence_Manager');
		$persistenceManger->persistAll();
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

        $this->migrationMessageManager->message(PATH_site . '/' . $locationInfo->getFilePath() . ':' . $locationInfo->getLineNumber() . ' [' . trim($locationInfo->getMatchedString()) . '] => ');

		if ($issue->getMigrationStatus() != 0) {
            $this->migrationMessageManager->successMessage('already migrated', TRUE);
			return;
		}
		$newFileContent = '';

		if (!file_exists(PATH_site . '/' . $locationInfo->getFilePath())) {
			$issue->setMigrationStatus(Tx_Smoothmigration_Domain_Interface_Migration::ERROR_FILE_NOT_FOUND);
            $this->migrationMessageManager->errorMessage('Error, file not found', TRUE);
			return;
		}
		if (!is_writable(PATH_site . '/' . $locationInfo->getFilePath())) {
			$issue->setMigrationStatus(Tx_Smoothmigration_Domain_Interface_Migration::ERROR_FILE_NOT_WRITABLE);
            $this->migrationMessageManager->errorMessage('Error, file not writable', TRUE);
			return;
		}
		$fileObject = new SplFileObject(PATH_site . '/' . $locationInfo->getFilePath());
		foreach ($fileObject as $lineNumber => $lineContent) {
			if ($lineNumber + 1 != $locationInfo->getLineNumber()) {
				$newFileContent .= $lineContent;
			} else {
				$newLineContent = str_replace($locationInfo->getMatchedString(), '', $lineContent);
				if ($newLineContent == $lineContent) {
					$issue->setMigrationStatus(Tx_Smoothmigration_Domain_Interface_Migration::ERROR_FILE_NOT_CHANGED);
                    $this->migrationMessageManager->errorMessage('Error, file not changed', TRUE);
					return;
				}
				$newFileContent .= $newLineContent;
			}
		}

		file_put_contents(PATH_site . '/' . $locationInfo->getFilePath(), $newFileContent);
		$issue->setMigrationStatus(Tx_Smoothmigration_Domain_Interface_Migration::SUCCESS);
        $this->migrationMessageManager->successMessage('Succes', TRUE);
	}

}

?>