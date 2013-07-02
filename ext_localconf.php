<?php

if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$checkArray = array(
	'Tx_Upgradereport_Checks_Core_Xclasses_Definition',
	'Tx_Upgradereport_Checks_Core_RequireOnceInExtensions_Definition'
);
Tx_Upgradereport_Service_Check_Registry::getInstance()->registerChecks($checkArray);


$GLOBALS['TYPO3_CONF_VARS'][TYPO3_MODE]['XCLASS']['NotExistingClass'] = 'Tx_Upgradereport_Controller_AbstractModuleController';

?>