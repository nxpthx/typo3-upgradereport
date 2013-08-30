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
class Tx_Smoothmigration_Migrations_Core_CallToDeprecatedStaticMethods_Processor extends Tx_Smoothmigration_Migrations_AbstractMigrationProcessor implements Tx_Smoothmigration_Domain_Interface_MigrationProcessor {

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
		$this->getIssues();
		foreach ($this->issues as $issue) {
			$this->cliDispatcher->cli_echo($this->handleIssue($issue) . LF);
			$this->issueRepository->update($issue);
		}

		$persistenceManger = $this->objectManager->get('Tx_Extbase_Persistence_Manager');
		$persistenceManger->persistAll();
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

		if (is_string($issue->getAdditionalInformation())) {
			$additionalInformation = unserialize($issue->getAdditionalInformation());
		} else {
			$additionalInformation = $issue->getAdditionalInformation();
		}

		if ($additionalInformation['isReplaceable']) {
			$output = $locationInfo->getFilePath() . ' line: ' . $locationInfo->getLineNumber() . PHP_EOL .
			'Replacing [' . trim($locationInfo->getMatchedString()) . '] =>' .
			' [' . $additionalInformation['replacementClass'] . '::' . $additionalInformation['replacementMethod'] . '(]' . PHP_EOL;

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
			$replacement = $additionalInformation['replacementClass'] . '::' . $additionalInformation['replacementMethod'] . '(';
			foreach ($fileObject as $lineNumber => $lineContent) {
				if ($lineNumber + 1 != $locationInfo->getLineNumber()) {
					$newFileContent .= $lineContent;
				} else {
					$newLineContent = str_replace($locationInfo->getMatchedString(), $replacement, $lineContent);
					if ($newLineContent == $lineContent) {
						$issue->setMigrationStatus(Tx_Smoothmigration_Domain_Interface_Migration::ERROR_FILE_NOT_CHANGED);
						return $output . 'Error, file not changed';
					}
					$newFileContent .= $newLineContent;
				}
			}
			file_put_contents($locationInfo->getFilePath(), $newFileContent);
			$issue->setMigrationStatus(Tx_Smoothmigration_Domain_Interface_Migration::SUCCESS);
			$output .= 'Succes' . PHP_EOL;
		} else {
			$output = $locationInfo->getFilePath() . $locationInfo->getLineNumber() . PHP_EOL .
				'Method [' . trim($locationInfo->getMatchedString()) . '] is not easily replaceable.' . PHP_EOL .
			$additionalInformation['replacementMessage'];
		}
		return $output;
	}

}

?>