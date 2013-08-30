<?php

if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$checkArray = array(
	'Tx_Smoothmigration_Checks_Core_Xclasses_Definition',
	'Tx_Smoothmigration_Checks_Core_RequireOnceInExtensions_Definition',
	'Tx_Smoothmigration_Checks_Core_CallToDeprecatedStaticMethods_Definition',
	'Tx_Smoothmigration_Checks_Core_CallToDeprecatedViewHelpers_Definition',
	'Tx_Smoothmigration_Checks_Dam_CallToDamClasses_Definition',
	'Tx_Smoothmigration_Checks_Core_Mysql_Definition',
);
Tx_Smoothmigration_Service_Check_Registry::getInstance()->registerChecks($checkArray);

$migrationArray = array(
	'Tx_Smoothmigration_Migrations_Core_CallToDeprecatedStaticMethods_Definition',
	'Tx_Smoothmigration_Migrations_Core_RequireOnceInExtensions_Definition',
);

Tx_Smoothmigration_Service_Migration_Registry::getInstance()->registerMigrations($migrationArray);

$TYPO3_CONF_VARS['SC_OPTIONS']['GLOBAL']['cliKeys']['smoothmigration'] = array(
	t3lib_extMgm::extPath('smoothmigration', 'Classes/Cli/class.smoothmigration_cli.php'),
	'_CLI_smoothmigration'
);

$GLOBALS['TYPO3_CONF_VARS'][TYPO3_MODE]['XCLASS']['NotExistingClass'] = 'Tx_Smoothmigration_Controller_AbstractModuleController';

?>