<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "smoothmigration".
 *
 * Auto generated 14-03-2014 17:21
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
	'state' => 'beta',
	'internal' => '',
	'uploadfolder' => 0,
	'createDirs' => '',
	'modify_tables' => '',
	'clearCacheOnLoad' => 1,
	'lockType' => '',
	'author_company' => 'rs websystems',
	'version' => '1.0.1',
	'constraints' => array(
		'depends' => array(
			'typo3' => '4.5.0-6.2.99',
			'php' => '5.3.0-0.0.0'
		),
		'conflicts' => array(),
		'suggests' => array(
			'extbase' => '1.3.0-4.7.99',
			'fluid' => '1.3.0-4.7.99',
		),
	),
	'_md5_values_when_last_written' => '',
	'suggests' => array(),
);

?>