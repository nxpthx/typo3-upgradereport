<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}
	// avoid that this block is loaded in the frontend or within the upgrade-wizards
if (TYPO3_MODE == 'BE' && !(TYPO3_REQUESTTYPE & TYPO3_REQUESTTYPE_INSTALL)) {
	/**
	* Registers a Backend Module
	*/
	Tx_Extbase_Utility_Extension::registerModule(
		$_EXTKEY,
		'tools',
		$_EXTKEY,
		'after:reports',
		array(
				// An array holding the controller-action-combinations that are accessible
			'Report'		=> 'index',
			'Ajax'			=> 'runTest,getResults'
		),
		array(
			'access' => 'user,group',
			'icon'   => 'EXT:' . $_EXTKEY . '/Resources/Public/Images/ModuleIcon.png',
			'labels' => 'LLL:EXT:' . $_EXTKEY . '/Resources/Private/Language/locallang_mod.xml'
		)
	);
}

$TCA['tx_upgradereport_domain_model_issue'] = array(
	'ctrl' => array(
		'title' => 'recognized upgrade issues',
		'label' => 'check',
		'enablecolumns' => array(
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/tx_upgradereport_domain_model_issue.php'
	)
);

// allow test results on normal pages
t3lib_extMgm::allowTableOnStandardPages('tx_upgradereport_domain_model_issue');

	// Add Icons
$icons = array(
//	'sendtonextstage' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Images/version-workspace-sendtonextstage.png',
);
//t3lib_SpriteManager::addSingleIcons($icons, $_EXTKEY);

?>