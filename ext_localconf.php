<?php

if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$checkArray = array(
	'Tx_Upgradereport_Checks_Core_Xclasses_Definition',
	'Tx_Upgradereport_Checks_Core_RequireOnceInExtensions_Definition',
	'Tx_Upgradereport_Checks_Core_CallToDeprecatedStaticMethods_Definition',
);
Tx_Upgradereport_Service_Check_Registry::getInstance()->registerChecks($checkArray);


$TYPO3_CONF_VARS['SC_OPTIONS']['GLOBAL']['cliKeys']['upgradereport'] = array(
	t3lib_extMgm::extPath('upgradereport', 'Classes/Cli/class.upgradereport_cli.php'),
	'_CLI_upgradereport'
);

$GLOBALS['TYPO3_CONF_VARS'][TYPO3_MODE]['XCLASS']['NotExistingClass'] = 'Tx_Upgradereport_Controller_AbstractModuleController';

?>