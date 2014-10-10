<?php
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2014 Tizian Schmidlin <st@cabag.ch>
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
 * @author Tizian Schmidlin
 */
class Tx_Smoothmigration_Migrations_Core_RequireOnceInExtensions_Processor extends Tx_Smoothmigration_Migrations_AbstractMigrationProcessor {

	/**
	 * Execute migration
	 *
	 * @return void
	 */
	public function execute() {
		$this->cliDispatcher->headerMessage($this->parentMigration->getTitle(), 'info');
		$this->getPendingIssues($this->parentMigration->getIdentifier())->toArray();
		if (count($this->issues)) {
			foreach ($this->issues as $issue) {
				$this->handleIssue($issue);
				$this->cliDispatcher->message();
				$this->issueRepository->update($issue);
			}
		} else {
			$this->cliDispatcher->successMessage('No issues found', TRUE);
		}

		$persistenceManger = $this->objectManager->get('Tx_Extbase_Persistence_Manager');
		$persistenceManger->persistAll();
	}

	/**
	 * Handle issue
	 *
	 * @param Tx_Smoothmigration_Domain_Model_Issue $issue
	 *
	 * @return void
	 */
	protected function handleIssue(Tx_Smoothmigration_Domain_Model_Issue $issue) {

		// first retrieve the old ext_localconf.php that contained the xclass
		$physicalPath = str_replace('EXT:', 'ext/', $issue->getFilePath());

		if (file_exists(PATH_site . 'typo3conf/' . $physicalPath)) {
			$physicalPath = PATH_site . 'typo3conf/' . $physicalPath;
		} elseif (file_exists(PATH_site . 'typo3/sys' . $physicalPath)) {
			$physicalPath = PATH_site . 'typo3/sys' . $physicalPath;
		} elseif (file_exists(PATH_site . $physicalPath)) {
			$physicalPath = PATH_site . $physicalPath;
		} else {
			return;
		}

		$additionalInfo = $issue->getAdditionalInformation();
		$extPath = substr(0, -17, $physicalPath);

		if (file_exists(substr(0, -4, $physicalPath) . '.obsolete.php')) {
			// if it has already been processed, because it contains more than just one xclass, rebuild the new ext_localconf.php and ext_autoload.php by adding the current classes etc

			$xClasses = require $extPath . 'ext_autoload.php';

			$extLocalconfSource = substr(0, -2, file_get_contents($physicalPath));

			$xClasses[$additionalInfo['IMPLEMENTATION_CLASS']] = $additionalInfo['IMPLEMENTATION_CLASS_FILENAME'];

			$extLocalconfSource .= '$GLOBALS[\'TYPO3_CONF_VARS\'][\'SYS\'][\'Objects\'][\'' . $additionalInfo['ORIGINAL_CLASS'] . '\'] = array(\'className\' => \'' . $additionalInfo['IMPLEMENTATION_CLASS'] . '\');' . "\n?>";

			file_put_contents($physicalPath, $extLocalconfSource);
			unset($extLocalconfSource);

			$newAutoloadSource = '<?php return array(' . "\n";

			foreach ($xClasses as $xclass => $path) {
				$newAutoloadSource .= '\'' . $xclass . '\' => \'' . $path . '\',' . "\n";
			}

			file_put_contents($extPath . 'ext_autoload.php', $newAutoloadSource . '); ?>');

		} else {
			// else rename the ext_localconf.php and create a new one with the new style and also create the ext_autoload.php
			rename($physicalPath, substr(0, -4, $physicalPath) . '.obsolete.php');

			$extLocalconfSource = "<?php\n" . '$GLOBALS[\'TYPO3_CONF_VARS\'][\'SYS\'][\'Objects\'][\'' . $additionalInfo['ORIGINAL_CLASS'] . '\'] = array(\'className\' => \'' . $additionalInfo['IMPLEMENTATION_CLASS'] . '\');' . "\n?>";

			file_put_contents($physicalPath, $extLocalconfSource);

			$xClassCode = "<php\n" . 'return array(\'' . $additionalInfo['IMPLEMENTATION_CLASS'] . '\'=> \'' . ['IMPLEMENTATION_CLASS_FILENAME'] . '\',);' . "\n?>";

			file_put_contents($extPath . 'ext_autoload.php', $xClassCode);
		}
	}

}
