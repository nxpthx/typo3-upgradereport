<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "smoothmigration".
 *
 * Auto generated 15-06-2013 11:14
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array(
	'title' => 'LTS to LTS smooth migration report',
	'description' => 'The module analyses your current setup, extensions and configuration in regard to features, functions and configuration which have been removed or changed since the release of TYPO3 4.5 LTS.',
	'category' => 'be',
	'author' => 'Steffen Ritter',
	'author_email' => 'steffen.ritter@typo3.org',
	'shy' => '',
	'dependencies' => 'extbase,fluid',
	'conflicts' => '',
	'priority' => '',
	'module' => '',
	'state' => 'alpha',
	'internal' => '',
	'uploadfolder' => 0,
	'createDirs' => '',
	'modify_tables' => '',
	'clearCacheOnLoad' => 1,
	'lockType' => '',
	'author_company' => 'rs websystems',
	'version' => '1.0.0',
	'constraints' => array(
		'depends' => array(
			'typo3' => '4.5.0-4.7.99',
			'extbase' => '1.3.0-1.3.99',
			'fluid' => '1.3.0-1.3.99',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
	'_md5_values_when_last_written' => 'a:13:{s:16:"ext_autoload.php";s:4:"2a1f";s:12:"ext_icon.gif";s:4:"cc54";s:17:"ext_localconf.php";s:4:"26b5";s:14:"ext_tables.php";s:4:"39bb";s:9:"README.md";s:4:"62ea";s:41:"Classes/Controller/AbstractController.php";s:4:"8f01";s:39:"Classes/Controller/ReportController.php";s:4:"7582";s:40:"Resources/Private/Language/locallang.xml";s:4:"3531";s:44:"Resources/Private/Language/locallang_mod.xml";s:4:"9ed1";s:37:"Resources/Private/Layouts/module.html";s:4:"2078";s:45:"Resources/Private/Templates/Report/Index.html";s:4:"547a";s:38:"Resources/Public/Images/ModuleIcon.png";s:4:"0bda";s:38:"Resources/Public/StyleSheet/module.css";s:4:"0ffd";}',
	'suggests' => array(
	),
);

?>