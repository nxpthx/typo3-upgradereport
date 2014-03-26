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
 * Class Tx_Smoothmigration_Migrations_Core_CallToDeprecatedStaticMethods_Processor
 *
 * @author Michiel Roos
 */
class Tx_Smoothmigration_Migrations_Core_CallToDeprecatedStaticMethods_Processor extends Tx_Smoothmigration_Migrations_AbstractMigrationProcessor {

	/**
	 * @var Tx_Smoothmigration_Domain_Repository_DeprecationRepository
	 */
	protected $deprecationRepository;

	/**
	 * Inject the deprecation repository
	 *
	 * @param Tx_Smoothmigration_Domain_Repository_DeprecationRepository $deprecationRepository
	 * @return void
	 */
	public function injectDeprecationRepository(Tx_Smoothmigration_Domain_Repository_DeprecationRepository $deprecationRepository) {
		$this->deprecationRepository = $deprecationRepository;
	}

	/**
	 * @return void
	 */
	public function execute() {
		$this->migrationMessageManager->headerMessage($this->parentMigration->getTitle(), 'info');
		$this->issues = $this->getIssues();
		if (count($this->issues)) {
			foreach ($this->issues as $issue) {
				$this->handleIssue($issue);
				$this->issueRepository->update($issue);
			}
		} else {
			$this->migrationMessageManager->successMessage('No issues found', TRUE);
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

		if ($additionalInformation['isReplaceable'] == 1) {
			// No brainer, can be replaced all the time
			$this->performReplacement($issue, $locationInfo, $additionalInformation);
		} elseif ($additionalInformation['isReplaceable'] == 2) {
			// Not a no brainer, but might be replaced
			if ($this->experimental) {
				$this->performReplacement($issue, $locationInfo, $additionalInformation);
			} elseif (!$this->encounteredExperimentalIssues) {
				$this->migrationMessageManager->message(PATH_site . '/' . $locationInfo->getFilePath() . ' line: ' . $locationInfo->getLineNumber() . LF .
					'Method [' . trim($locationInfo->getMatchedString()) . '] is not easily replaceable.' . LF .
					$additionalInformation['deprecationMessage']
				);
				$this->migrationMessageManager->warningMessage('But you can try fixing. Run again with parameter --experimental=yes');
				$this->migrationMessageManager->warningMessage($this->ll('migration.manualInterventionNeeded'), TRUE);
				$this->encounteredExperimentalIssues = TRUE;
			}
		} else {
			$this->migrationMessageManager->message(PATH_site . '/' . $locationInfo->getFilePath() . ' line: ' . $locationInfo->getLineNumber() . LF .
			'Method [' . trim($locationInfo->getMatchedString()) . '] is not easily replaceable.' . LF .
			$additionalInformation['deprecationMessage']);
			if ($additionalInformation['replacementMessage']) {
				$this->migrationMessageManager->message($additionalInformation['replacementMessage']);
			}
			$this->migrationMessageManager->warningMessage($this->ll('migration.manualInterventionNeeded'), TRUE);
			$this->migrationMessageManager->message();
		}
	}

	/**
	 *
	 * @param Tx_Smoothmigration_Domain_Model_Issue $issue
	 * @param object $locationInfo
	 * @param array $additionalInformation
	 * @return type
	 */
	protected function performReplacement(Tx_Smoothmigration_Domain_Model_Issue $issue, $locationInfo, $additionalInformation) {
		$concatenator = '::';
		if ($additionalInformation['replacementClass'] == '$GLOBALS[\'TYPO3_DB\']') {
			$concatenator = '->';
		}
			// Some replacements are plain PHP functions
		if ($additionalInformation['replacementClass'] == '') {
			$concatenator = '';
		}
		$this->migrationMessageManager->message(PATH_site . '/' . $locationInfo->getFilePath() . ' line: ' . $locationInfo->getLineNumber() . LF .
		'Replacing [' . trim($locationInfo->getMatchedString()) . '] =>' .
		' [' . $additionalInformation['replacementClass'] . $concatenator . $additionalInformation['replacementMethod'] . '(]');

		if ($issue->getMigrationStatus() != 0) {
			$this->migrationMessageManager->successMessage('already migrated', TRUE);
			return;
		}

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
		$isRegexReplace = !empty($additionalInformation['regexSearch'])
			&& !empty($additionalInformation['regexReplace']);
		if ($isRegexReplace) {
			// When we have a semi-colon, we should assume its a new line
			$linesToReplace = count(explode(';', $additionalInformation['regexSearch']));
		} else {
			$linesToReplace = 1;
		}

		$contentBefore = '';
		$contentToProcess = '';
		$contentAfter = '';

		foreach ($fileObject as $lineNumber => $lineContent) {
			if ($lineNumber + 1 < $locationInfo->getLineNumber()) {
				$contentBefore .= $lineContent;
			} elseif ($lineNumber + 1 < $locationInfo->getLineNumber() + $linesToReplace) {
				$contentToProcess .= $lineContent;
			} else {
				$contentAfter .= $lineContent;
			}
		}

		if ($isRegexReplace) {
			$newContent = preg_replace(
				$additionalInformation['regexSearch'],
				$additionalInformation['regexReplace'],
				$contentToProcess
			);
		} else {
			$replacement = $additionalInformation['replacementClass'] .
				$concatenator .
				$additionalInformation['replacementMethod'] . '(';
			$newContent = str_replace($locationInfo->getMatchedString(), $replacement, $contentToProcess);
		}

		if ($newContent == $contentToProcess) {
			$issue->setMigrationStatus(Tx_Smoothmigration_Domain_Interface_Migration::ERROR_FILE_NOT_CHANGED);
			$this->migrationMessageManager->errorMessage('Error, file not changed', TRUE);
			return;
		}

		file_put_contents(PATH_site . '/' . $locationInfo->getFilePath(), $contentBefore . $newContent . $contentAfter);
		$issue->setMigrationStatus(Tx_Smoothmigration_Domain_Interface_Migration::SUCCESS);
		$this->migrationMessageManager->successMessage('Succes' . LF, TRUE);
	}

}
