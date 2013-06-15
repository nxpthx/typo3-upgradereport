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
		'tools',	// Make module a submodule of 'web'
		'upgradereport',	// Submodule key
		'before:info', // Position
		array(
				// An array holding the controller-action-combinations that are accessible
			'Review'		=> 'index,fullIndex,singleIndex',
		),
		array(
			'access' => 'user,group',
			'icon'   => 'EXT:' . $_EXTKEY . ' /Resources/Public/Images/ModuleIcon.png',
			'labels' => 'LLL:EXT:' . $_EXTKEY . '/Resources/Private/Language/locallang_mod.xml',
			'navigationComponentId' => 'typo3-pagetree',
		)
	);
}

	// Add Icons
$icons = array(
//	'sendtonextstage' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Images/version-workspace-sendtonextstage.png',
);
t3lib_SpriteManager::addSingleIcons($icons, $_EXTKEY);

?>