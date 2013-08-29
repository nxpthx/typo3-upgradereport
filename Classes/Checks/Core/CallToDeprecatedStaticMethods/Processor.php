<?php
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2013 Peter Beernink, Drecomm (p.beernink@drecomm.nl)
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *  A copy is found in the textfile GPL.txt and important notices to the license
 *  from the author is found in LICENSE.txt distributed with these scripts.
 *
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * Class Tx_Smoothmigration_Checks_Core_CallToDeprecatedStaticMethods_Definition
 *
 * @author Peter Beernink
 */
class Tx_Smoothmigration_Checks_Core_CallToDeprecatedStaticMethods_Processor implements Tx_Smoothmigration_Domain_Interface_CheckProcessor {

	/**
	 * Array of all deprecated static methods
	 *
	 * @var array
	 */
	protected $staticMethods = array(
		'BackendUtility::compilePreviewKeyword',
		'DebugUtility::prepareVariableForJavascript',
		'EidUtility::connectDB',
		'ExtensionManagementUtility::cannotCacheFilesWritable',
		'ExtensionManagementUtility::currentCacheFiles',
		'ExtensionManagementUtility::getCacheFilePrefix',
		'ExtensionManagementUtility::getEnabledExtensionList',
		'ExtensionManagementUtility::getExtensionCacheBehaviour',
		'ExtensionManagementUtility::getIgnoredExtensionList',
		'ExtensionManagementUtility::getRequiredExtensionList',
		'ExtensionManagementUtility::isCacheFilesAvailable',
		'ExtensionManagementUtility::isLocalconfWritable',
		'ExtensionManagementUtility::_makeIncludeHeader',
		'ExtensionManagementUtility::typo3_loadExtensions',
		'ExtensionManagementUtility::writeCacheFiles',
		'FlashMessageQueue::__callStatic',
		'GeneralUtility::calculateCHash',
		'GeneralUtility::cHashParams',
		'GeneralUtility::generateCHash',
		'GeneralUtility::getValidClassPrefixes',
		'GeneralUtility::hasValidClassPrefix',
		'GeneralUtility::int_from_ver',
		'GeneralUtility::loadTCA',
		'GeneralUtility::plainMailEncoded',
		'IconUtility::getIconImage',
		'Locales::initialize',
		'MailUtility::mail',
		'PhpOptionsUtility::isMagicQuotesGpcEnabled',
		'PhpOptionsUtility::isSafeModeEnabled',
		'SystemEnvironmentBuilder::setupClassAliasForLegacyBaseClasses',
		't3lib_BEfunc::compilePreviewKeyword',
		't3lib_BEfunc::DBcompileInsert',
		't3lib_BEfunc::DBcompileUpdate',
		't3lib_BEfunc::getListOfBackendModules',
		't3lib_BEfunc::getSetUpdateSignal',
		't3lib_BEfunc::listQuery',
		't3lib_BEfunc::mm_query',
		't3lib_BEfunc::searchQuery',
		't3lib_BEfunc::titleAttrib',
		't3lib_BEfunc::typo3PrintError',
		't3lib_cache::enableCachingFramework',
		't3lib_cache::initContentHashCache',
		't3lib_cache::initPageCache',
		't3lib_cache::initPageSectionCache',
		't3lib_div::array2json',
		't3lib_div::breakLinesForEmail',
		't3lib_div::breakTextForEmail',
		't3lib_div::calcParenthesis',
		't3lib_div::calcPriority',
		't3lib_div::calculateCHash',
		't3lib_div::cHashParams',
		't3lib_div::convUmlauts',
		't3lib_div::danish_strtoupper',
		't3lib_div::debug',
		't3lib_div::debug_ordvalue',
		't3lib_div::debugRows',
		't3lib_div::debug_trail',
		't3lib_div::fixed_lgd',
		't3lib_div::fixed_lgd_pre',
		't3lib_div::generateCHash',
		't3lib_div::GParrayMerged',
		't3lib_div::GPvar',
		't3lib_div::implodeParams',
		't3lib_div::int_from_ver',
		't3lib_div::intInRange',
		't3lib_div::intval_positive',
		't3lib_div::makeInstanceClassName',
		't3lib_div::print_array',
		't3lib_div::readLLPHPfile',
		't3lib_div::readLLXMLfile',
		't3lib_div::rm_endcomma',
		't3lib_div::testInt',
		't3lib_div::uniqueArray',
		't3lib_div::view_array',
		't3lib_l10n_Locales::initialize',
		'tx_em_Tools::getArrayFromLocallang',
		'Tx_Extbase_Dispatcher::getConfigurationManager',
		'Tx_Extbase_Dispatcher::getExtbaseFrameworkConfiguration',
		'Tx_Extbase_Dispatcher::getPersistenceManager',
		'Tx_Extbase_Reflection_ObjectAccess::getAccessibleProperties',
		'Tx_Extbase_Reflection_ObjectAccess::getAccessiblePropertyNames',
		'Tx_Extbase_Utility_Cache::clearPageCache',
		'Tx_Extbase_Utility_ClassLoader::loadClass',
		'Tx_Extbase_Utility_Extension::buildAutoloadRegistryForSinglePath',
		'Tx_Extbase_Utility_Extension::convertCamelCaseToLowerCaseUnderscored',
		'Tx_Extbase_Utility_Extension::convertLowerUnderscoreToUpperCamelCase',
		'Tx_Extbase_Utility_Extension::convertUnderscoredToLowerCamelCase',
		'Tx_Extbase_Utility_Extension::createAutoloadRegistryForExtension',
		'Tx_Extbase_Utility_Extension::extractClassNames',
		'Tx_Extbase_Utility_Extension::findToken',
		'Tx_Extbase_Utility_Extension::getPluginNameByAction',
		'Tx_Extbase_Utility_Extension::getPluginNamespace',
		'Tx_Extbase_Utility_Extension::getTargetPidByPlugin',
		'Tx_Extbase_Utility_Extension::isActionCacheable',
		'Tx_Extbase_Utility_TypeHandling::getTypeHandlingService',
		'Tx_Extbase_Utility_TypeHandling::normalizeType',
		'Tx_Extbase_Utility_TypeHandling::parseType',
		'Tx_Extbase_Utility_TypoScript::convertPlainArrayToTypoScriptArray',
		'Tx_Extbase_Utility_TypoScript::convertTypoScriptArrayToPlainArray',
		'Tx_Extbase_Utility_TypoScript::getTypoScriptService',
	);

	/**
	 * @var Tx_Smoothmigration_Checks_Core_CallToDeprecatedStaticMethods_Definition
	 */
	protected $parentCheck;

	/**
	 * @param Tx_Smoothmigration_Domain_Interface_Check $check
	 */
	public function __construct(Tx_Smoothmigration_Domain_Interface_Check $check) {
		$this->parentCheck = $check;
	}

	/**
	 * @var Tx_Smoothmigration_Domain_Model_Issue[]
	 */
	protected $issues = array();

	/**
	 * @return void
	 */
	public function executeCheck() {
		/** @var Tx_Smoothmigration_Service_FileLocatorService $fileLocatorService */
		$fileLocatorService = t3lib_div::makeInstance('Tx_Smoothmigration_Service_FileLocatorService');
		$locations = $fileLocatorService->searchInExtensions('.*\.(php|inc)$',
			$this->generateRegularExpression()
		);
		foreach ($locations as $location) {
			$this->issues[] = new Tx_Smoothmigration_Domain_Model_Issue($this->parentCheck->getIdentifier(), $location);
		}
	}

	/**
	 * @return boolean
	 */
	public function hasIssues() {
		return count($this->issues) > 0;
	}

	/**
	 * @return Tx_Smoothmigration_Domain_Model_Issue[]
	 */
	public function getIssues() {
		return $this->issues;
	}

	/**
	 * Generate a regular expression to search for all deprecated static calls
	 */
	protected function generateRegularExpression() {
		$regularExpression = array();
		foreach ($this->staticMethods as $staticMethod) {
			$regularExpression[] = '(' . $staticMethod . '\s?\(' . ')';
		}
		return implode('|', $regularExpression);
	}


}

?>