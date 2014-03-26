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

$EM_CONF[$_EXTKEY] = array (
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
	'version' => '1.0.0',
	'constraints' => array(
		'depends' => array(
			'typo3' => '4.5.0-6.2.99',
			'extbase' => '1.3.0-6.2.99',
			'fluid' => '1.3.0-6.2.99',
		),
		'conflicts' => array(),
		'suggests' => array(),
	),
	'_md5_values_when_last_written' => 'a:74:{s:16:"ext_autoload.php";s:4:"36c4";s:12:"ext_icon.gif";s:4:"cc54";s:17:"ext_localconf.php";s:4:"b705";s:14:"ext_tables.php";s:4:"b2a9";s:14:"ext_tables.sql";s:4:"8245";s:25:"ext_tables_static+adt.sql";s:4:"de2f";s:9:"README.md";s:4:"5307";s:42:"Classes/Checks/AbstractCheckDefinition.php";s:4:"e682";s:64:"Classes/Checks/Core/CallToDeprecatedStaticMethods/Definition.php";s:4:"5f98";s:63:"Classes/Checks/Core/CallToDeprecatedStaticMethods/Processor.php";s:4:"41c2";s:68:"Classes/Checks/Core/CallToDeprecatedStaticMethods/ResultAnalyzer.php";s:4:"1b7f";s:62:"Classes/Checks/Core/CallToDeprecatedViewHelpers/Definition.php";s:4:"fb7a";s:61:"Classes/Checks/Core/CallToDeprecatedViewHelpers/Processor.php";s:4:"882d";s:66:"Classes/Checks/Core/CallToDeprecatedViewHelpers/ResultAnalyzer.php";s:4:"63ff";s:40:"Classes/Checks/Core/Mysql/Definition.php";s:4:"c4bc";s:39:"Classes/Checks/Core/Mysql/Processor.php";s:4:"c924";s:44:"Classes/Checks/Core/Mysql/ResultAnalyzer.php";s:4:"31bc";s:58:"Classes/Checks/Core/RequireOnceInExtensions/Definition.php";s:4:"211e";s:57:"Classes/Checks/Core/RequireOnceInExtensions/Processor.php";s:4:"e2ed";s:62:"Classes/Checks/Core/RequireOnceInExtensions/ResultAnalyzer.php";s:4:"e126";s:43:"Classes/Checks/Core/Xclasses/Definition.php";s:4:"ad78";s:42:"Classes/Checks/Core/Xclasses/Processor.php";s:4:"0aa6";s:47:"Classes/Checks/Core/Xclasses/ResultAnalyzer.php";s:4:"97cf";s:50:"Classes/Checks/Dam/CallToDamClasses/Definition.php";s:4:"6afe";s:49:"Classes/Checks/Dam/CallToDamClasses/Processor.php";s:4:"12e9";s:54:"Classes/Checks/Dam/CallToDamClasses/ResultAnalyzer.php";s:4:"91ee";s:41:"Classes/Cli/class.smoothmigration_cli.php";s:4:"5f91";s:47:"Classes/Controller/AbstractModuleController.php";s:4:"e835";s:37:"Classes/Controller/AjaxController.php";s:4:"8f49";s:39:"Classes/Controller/ReportController.php";s:4:"02f4";s:34:"Classes/Domain/Interface/Check.php";s:4:"7466";s:45:"Classes/Domain/Interface/CheckDescription.php";s:4:"445f";s:43:"Classes/Domain/Interface/CheckProcessor.php";s:4:"c0ab";s:46:"Classes/Domain/Interface/CheckRequirements.php";s:4:"0ef9";s:48:"Classes/Domain/Interface/CheckResultAnalyzer.php";s:4:"88a4";s:40:"Classes/Domain/Interface/Description.php";s:4:"d614";s:42:"Classes/Domain/Interface/IssueLocation.php";s:4:"8d6a";s:38:"Classes/Domain/Interface/Migration.php";s:4:"6ec7";s:49:"Classes/Domain/Interface/MigrationDescription.php";s:4:"8625";s:47:"Classes/Domain/Interface/MigrationProcessor.php";s:4:"d3b9";s:50:"Classes/Domain/Interface/MigrationRequirements.php";s:4:"c592";s:52:"Classes/Domain/Interface/MigrationResultAnalyzer.php";s:4:"dfc2";s:38:"Classes/Domain/Interface/Processor.php";s:4:"0f02";s:41:"Classes/Domain/Interface/Requirements.php";s:4:"c989";s:43:"Classes/Domain/Interface/ResultAnalyzer.php";s:4:"cfd2";s:36:"Classes/Domain/Model/Deprecation.php";s:4:"6f6a";s:30:"Classes/Domain/Model/Issue.php";s:4:"5747";s:52:"Classes/Domain/Model/IssueLocation/Configuration.php";s:4:"79ae";s:47:"Classes/Domain/Model/IssueLocation/Database.php";s:4:"bee0";s:43:"Classes/Domain/Model/IssueLocation/File.php";s:4:"997d";s:55:"Classes/Domain/Model/IssueLocation/PhysicalLocation.php";s:4:"1c07";s:51:"Classes/Domain/Repository/DeprecationRepository.php";s:4:"8579";s:45:"Classes/Domain/Repository/IssueRepository.php";s:4:"22f5";s:50:"Classes/Migrations/AbstractMigrationDefinition.php";s:4:"41f9";s:68:"Classes/Migrations/Core/CallToDeprecatedStaticMethods/Definition.php";s:4:"a904";s:67:"Classes/Migrations/Core/CallToDeprecatedStaticMethods/Processor.php";s:4:"d445";s:72:"Classes/Migrations/Core/CallToDeprecatedStaticMethods/ResultAnalyzer.php";s:4:"993c";s:38:"Classes/Service/FileLocatorService.php";s:4:"ee94";s:34:"Classes/Service/Check/Registry.php";s:4:"63b4";s:46:"Classes/Service/Check/RequirementsAnalyzer.php";s:4:"1479";s:44:"Classes/ViewHelpers/InspectionViewHelper.php";s:4:"cbf3";s:48:"Classes/ViewHelpers/ResultAnalyzerViewHelper.php";s:4:"faa8";s:65:"Configuration/TCA/tx_smoothmigration_domain_model_deprecation.php";s:4:"8b5c";s:59:"Configuration/TCA/tx_smoothmigration_domain_model_issue.php";s:4:"0989";s:40:"Resources/Private/Language/locallang.xml";s:4:"e2f9";s:44:"Resources/Private/Language/locallang_mod.xml";s:4:"8ba3";s:37:"Resources/Private/Layouts/module.html";s:4:"b12a";s:45:"Resources/Private/Templates/Report/Index.html";s:4:"bd70";s:54:"Resources/Private/Templates/Report/ReportOverview.html";s:4:"8e88";s:44:"Resources/Private/Templates/Report/Show.html";s:4:"0fd1";s:38:"Resources/Public/Images/ModuleIcon.png";s:4:"0bda";s:38:"Resources/Public/JavaScript/General.js";s:4:"9ac2";s:48:"Resources/Public/JavaScript/jquery-1.10.1.min.js";s:4:"cc5f";s:38:"Resources/Public/StyleSheet/module.css";s:4:"38b3";}',
	'suggests' => array (),
);

?>