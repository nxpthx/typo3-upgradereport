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
 * Class Tx_Smoothmigration_Migrations_Database_CreateMissingTablesAndFields_Processor
 *
 * @author Michiel Roos
 */
class Tx_Smoothmigration_Migrations_Database_CreateMissingTablesAndFields_Processor extends Tx_Smoothmigration_Migrations_AbstractMigrationProcessor {

	/**
	 * @return void
	 */
	public function execute() {

		// check for the Bootstrap class to check if the current TYPO3 version meets our requirements
		if (class_exists('TYPO3\\CMS\\Core\\Core\\Bootstrap')) {
			/** @var \TYPO3\CMS\Install\Sql\SchemaMigrator $schemaMigrator */
			$schemaMigrator = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(
				'TYPO3\\CMS\\Install\\Sql\\SchemaMigrator'
			);

			/** @var \TYPO3\CMS\Core\Database\DatabaseConnection $databaseConnection */
			$databaseConnection = $GLOBALS['TYPO3_DB'];

			\TYPO3\CMS\Core\Core\Bootstrap::getInstance()->loadExtensionTables(FALSE);

			$tableDefinitionsString = $this->resolveTableDefinitions();

			$currentFieldDefinitions = $schemaMigrator->getFieldDefinitions_database();
			$updatedFieldDefinitions = $schemaMigrator->getFieldDefinitions_fileContent($tableDefinitionsString);

			$fieldDefinitionsDifferences = $schemaMigrator->getDatabaseExtra($updatedFieldDefinitions, $currentFieldDefinitions);

			$updateStatements = $schemaMigrator->getUpdateSuggestions($fieldDefinitionsDifferences);

			$allowedStatementTypes = array('add', 'create_table');

			if (!empty($updateStatements)) {
				$this->commandController->warningMessage('Difference detected in table definitions. Statement types: ' . implode(',', array_keys($updateStatements)), TRUE);

				foreach ($allowedStatementTypes as $statementType) {
					if (array_key_exists($statementType, $updateStatements) && is_array($updateStatements[$statementType])) {
						foreach ($updateStatements[$statementType] as $statement) {
							$this->commandController->infoMessage('Executing "' . $statement . '"');

							$result = $databaseConnection->admin_query($statement);

							if ($result !== TRUE) {
								$this->commandController->warningMessage('Executing query failed!');
							}
						}
					}
				}
			}
		}
	}

	/**
	 * @return string
	 */
	protected function resolveTableDefinitions() {
		$tableDefinitions = '';

		foreach ($GLOBALS['TYPO3_LOADED_EXT'] as $loadedExtConf) {
			if (is_array($loadedExtConf) && $loadedExtConf['ext_tables.sql']) {
				$extensionSqlContent = \TYPO3\CMS\Core\Utility\GeneralUtility::getUrl($loadedExtConf['ext_tables.sql']);
				$tableDefinitions .= PHP_EOL . PHP_EOL . PHP_EOL . PHP_EOL . $extensionSqlContent;
			}
		}

		// Add SQL content coming from the caching framework
		$tableDefinitions .= \TYPO3\CMS\Core\Cache\Cache::getDatabaseTableDefinitions();
		// Add SQL content coming from the category registry
		$tableDefinitions .= \TYPO3\CMS\Core\Category\CategoryRegistry::getInstance()->getDatabaseTableDefinitions();

		return $tableDefinitions;
	}
}