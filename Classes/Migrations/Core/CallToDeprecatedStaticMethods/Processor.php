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
		$this->getPendingIssues($this->parentMigration->getIdentifier());
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
				$this->commandController->getMessageBus()->message($locationInfo->getFilePath() . ' line: ' . $locationInfo->getLineNumber() . LF .
					'Method [' . trim($locationInfo->getMatchedString()) . '] is not easily replaceable.' . LF .
					$additionalInformation['deprecationMessage']
				);
				$this->commandController->getMessageBus()->warningMessage('But you can try fixing. Run again with parameter --experimental=yes');
				$this->commandController->getMessageBus()->warningMessage($this->ll('migration.manualInterventionNeeded'), TRUE);
				$this->encounteredExperimentalIssues = TRUE;
			}
		} else {
			$this->commandController->getMessageBus()->message($locationInfo->getFilePath() . ' line: ' . $locationInfo->getLineNumber() . LF .
			'Method [' . trim($locationInfo->getMatchedString()) . '] is not easily replaceable.' . LF .
			$additionalInformation['deprecationMessage']);
			if ($additionalInformation['replacementMessage']) {
				$this->commandController->getMessageBus()->message($additionalInformation['replacementMessage']);
			}
			$this->commandController->getMessageBus()->warningMessage($this->ll('migration.manualInterventionNeeded'), TRUE);
			$this->commandController->getMessageBus()->message();
		}
	}

	/**
	 *
	 * @param Tx_Smoothmigration_Domain_Model_Issue $issue
	 * @param object $locationInfo
	 * @param array $additionalInformation
	 * @return void
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
		$this->commandController->getMessageBus()->message($locationInfo->getFilePath() . ' line: ' . $locationInfo->getLineNumber() . LF .
		'Replacing [' . trim($locationInfo->getMatchedString()) . '] =>' .
		' [' . $additionalInformation['replacementClass'] . $concatenator . $additionalInformation['replacementMethod'] . '(]');

		if ($issue->getMigrationStatus() != 0) {
			$this->commandController->getMessageBus()->successMessage('already migrated', TRUE);
			return;
		}

		if (!file_exists($locationInfo->getFilePath())) {
			$issue->setMigrationStatus(Tx_Smoothmigration_Domain_Interface_Migration::ERROR_FILE_NOT_FOUND);
			$this->commandController->getMessageBus()->errorMessage('Error, file not found', TRUE);
			return;
		}
		if (!is_writable($locationInfo->getFilePath())) {
			$issue->setMigrationStatus(Tx_Smoothmigration_Domain_Interface_Migration::ERROR_FILE_NOT_WRITABLE);
			$this->commandController->getMessageBus()->errorMessage('Error, file not writable', TRUE);
			return;
		}
		$fileObject = new SplFileObject($locationInfo->getFilePath());
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
			$this->commandController->getMessageBus()->errorMessage($this->ll('migrationsstatus.4'), TRUE);
			return;
		}

		file_put_contents($locationInfo->getFilePath(), $contentBefore . $newContent . $contentAfter);
		$issue->setMigrationStatus(Tx_Smoothmigration_Domain_Interface_Migration::SUCCESS);
		$this->commandController->getMessageBus()->successMessage('Succes' . LF, TRUE);
	}

}
