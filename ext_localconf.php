<?php

if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$checkArray = array(
	'Tx_Upgradereport_Checks_Core_Xclasses_Definition'
);
Tx_Upgradereport_Service_Check_Registry::getInstance()->registerChecks($checkArray);

?>