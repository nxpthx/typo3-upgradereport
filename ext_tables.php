<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}
// avoid that this block is loaded in the frontend or within the upgrade-wizards
if (TYPO3_MODE === 'BE' && !(TYPO3_REQUESTTYPE & TYPO3_REQUESTTYPE_INSTALL)) {
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
			'Report' => 'index,reportOverview,show,download',
			'Ajax' => 'runTest,getResults,clearTestResults'
		),
		array(
			'access' => 'user,group',
			'icon' => 'EXT:' . $_EXTKEY . '/Resources/Public/Images/ModuleIcon.png',
			'labels' => 'LLL:EXT:' . $_EXTKEY . '/Resources/Private/Language/locallang_mod.xml'
		)
	);
}

$TCA['tx_smoothmigration_domain_model_issue'] = array(
	'ctrl' => array(
		'title' => 'Recognized upgrade issues',
		'label' => 'title',
		'label_userFunc' => t3lib_extMgm::extPath($_EXTKEY) . 'Classes/UserFunctions/Tca.php:Tx_smoothmigration_UserFunctions_Tca->issueTitle',
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/tx_smoothmigration_domain_model_issue.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'ext_icon.gif'
	)
);

// allow test results on normal pages
t3lib_extMgm::allowTableOnStandardPages('tx_smoothmigration_domain_model_issue');

$TCA['tx_smoothmigration_domain_model_deprecation'] = array(
	'ctrl' => array(
		'title' => 'Deprecated methods',
		'label' => 'title',
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/tx_smoothmigration_domain_model_deprecation.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'ext_icon.gif'
	)
);

// enable label_userFunc only for TYPO3 v 4.1 and higher
if (t3lib_div::int_from_ver(TYPO3_version) >= 4001000) {
	$TCA['tx_smoothmigration_domain_model_deprecation']['ctrl']['label_userFunc'] =
		'Tx_smoothmigration_UserFunctions_Tca->deprecationTitle';
	$TCA['tx_smoothmigration_domain_model_issue']['ctrl']['label_userFunc'] =
		'Tx_smoothmigration_UserFunctions_Tca->issueTitle';
}

// allow test results on normal pages
t3lib_extMgm::allowTableOnStandardPages('tx_smoothmigration_domain_model_deprecation');

// Add Icons
$icons = array(//	'sendtonextstage' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Images/version-workspace-sendtonextstage.png',
);
//t3lib_SpriteManager::addSingleIcons($icons, $_EXTKEY);

?>