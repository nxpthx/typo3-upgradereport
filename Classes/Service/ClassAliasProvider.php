<?php
/**
 *  Copyright notice
 *
 *  ⓒ 2014 Michiel Roos <michiel@maxserv.nl>
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is free
 *  software; you can redistribute it and/or modify it under the terms of the
 *  GNU General Public License as published by the Free Software Foundation;
 *  either version 2 of the License, or (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful, but
 *  WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY
 *  or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for
 *  more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 */

/**
 * Class Tx_Smoothmigration_Service_ClassAliasProvider
 *
 * @author Michiel Roos
 */
class Tx_Smoothmigration_Service_ClassAliasProvider implements t3lib_Singleton {
	/**
	 * Class Alias Map
	 *
	 * This array was generated from the TYPO3 6.2 file:
	 * typo3/sysext/core/Migrations/Code/ClassAliasMap.php
	 *
	 * @var array
	 */
	protected $classAliasMap = array(
		't3lib_cli' => 'TYPO3\CMS\Core\Controller\CommandLineController',
		'extDirect_DataProvider_ContextHelp' => 'TYPO3\CMS\ContextHelp\ExtDirect\ContextHelpDataProvider',
		't3lib_userAuth' => 'TYPO3\CMS\Core\Authentication\AbstractUserAuthentication',
		't3lib_beUserAuth' => 'TYPO3\CMS\Core\Authentication\BackendUserAuthentication',
		't3lib_autoloader' => 'TYPO3\CMS\Core\Core\ClassLoader',
		't3lib_cache_backend_AbstractBackend' => 'TYPO3\CMS\Core\Cache\Backend\AbstractBackend',
		't3lib_cache_backend_ApcBackend' => 'TYPO3\CMS\Core\Cache\Backend\ApcBackend',
		't3lib_cache_backend_Backend' => 'TYPO3\CMS\Core\Cache\Backend\BackendInterface',
		't3lib_cache_backend_FileBackend' => 'TYPO3\CMS\Core\Cache\Backend\FileBackend',
		't3lib_cache_backend_MemcachedBackend' => 'TYPO3\CMS\Core\Cache\Backend\MemcachedBackend',
		't3lib_cache_backend_NullBackend' => 'TYPO3\CMS\Core\Cache\Backend\NullBackend',
		't3lib_cache_backend_PdoBackend' => 'TYPO3\CMS\Core\Cache\Backend\PdoBackend',
		't3lib_cache_backend_PhpCapableBackend' => 'TYPO3\CMS\Core\Cache\Backend\PhpCapableBackendInterface',
		't3lib_cache_backend_RedisBackend' => 'TYPO3\CMS\Core\Cache\Backend\RedisBackend',
		't3lib_cache_backend_TransientMemoryBackend' => 'TYPO3\CMS\Core\Cache\Backend\TransientMemoryBackend',
		't3lib_cache_backend_DbBackend' => 'TYPO3\CMS\Core\Cache\Backend\Typo3DatabaseBackend',
		't3lib_cache' => 'TYPO3\CMS\Core\Cache\Cache',
		't3lib_cache_Factory' => 'TYPO3\CMS\Core\Cache\CacheFactory',
		't3lib_cache_Manager' => 'TYPO3\CMS\Core\Cache\CacheManager',
		't3lib_cache_Exception' => 'TYPO3\CMS\Core\Cache\Exception',
		't3lib_cache_exception_ClassAlreadyLoaded' => 'TYPO3\CMS\Core\Cache\Exception\ClassAlreadyLoadedException',
		't3lib_cache_exception_DuplicateIdentifier' => 'TYPO3\CMS\Core\Cache\Exception\DuplicateIdentifierException',
		't3lib_cache_exception_InvalidBackend' => 'TYPO3\CMS\Core\Cache\Exception\InvalidBackendException',
		't3lib_cache_exception_InvalidCache' => 'TYPO3\CMS\Core\Cache\Exception\InvalidCacheException',
		't3lib_cache_exception_InvalidData' => 'TYPO3\CMS\Core\Cache\Exception\InvalidDataException',
		't3lib_cache_exception_NoSuchCache' => 'TYPO3\CMS\Core\Cache\Exception\NoSuchCacheException',
		't3lib_cache_frontend_AbstractFrontend' => 'TYPO3\CMS\Core\Cache\Frontend\AbstractFrontend',
		't3lib_cache_frontend_Frontend' => 'TYPO3\CMS\Core\Cache\Frontend\FrontendInterface',
		't3lib_cache_frontend_PhpFrontend' => 'TYPO3\CMS\Core\Cache\Frontend\PhpFrontend',
		't3lib_cache_frontend_StringFrontend' => 'TYPO3\CMS\Core\Cache\Frontend\StringFrontend',
		't3lib_cache_frontend_VariableFrontend' => 'TYPO3\CMS\Core\Cache\Frontend\VariableFrontend',
		't3lib_cs' => 'TYPO3\CMS\Core\Charset\CharsetConverter',
		't3lib_collection_AbstractRecordCollection' => 'TYPO3\CMS\Core\Collection\AbstractRecordCollection',
		't3lib_collection_Collection' => 'TYPO3\CMS\Core\Collection\CollectionInterface',
		't3lib_collection_Editable' => 'TYPO3\CMS\Core\Collection\EditableCollectionInterface',
		't3lib_collection_Nameable' => 'TYPO3\CMS\Core\Collection\NameableCollectionInterface',
		't3lib_collection_Persistable' => 'TYPO3\CMS\Core\Collection\PersistableCollectionInterface',
		't3lib_collection_RecordCollection' => 'TYPO3\CMS\Core\Collection\RecordCollectionInterface',
		't3lib_collection_RecordCollectionRepository' => 'TYPO3\CMS\Core\Collection\RecordCollectionRepository',
		't3lib_collection_Sortable' => 'TYPO3\CMS\Core\Collection\SortableCollectionInterface',
		't3lib_collection_StaticRecordCollection' => 'TYPO3\CMS\Core\Collection\StaticRecordCollection',
		't3lib_flexformtools' => 'TYPO3\CMS\Core\Configuration\FlexForm\FlexFormTools',
		't3lib_matchCondition_abstract' => 'TYPO3\CMS\Core\Configuration\TypoScript\ConditionMatching\AbstractConditionMatcher',
		't3lib_DB' => 'TYPO3\CMS\Core\Database\DatabaseConnection',
		't3lib_PdoHelper' => 'TYPO3\CMS\Core\Database\PdoHelper',
		't3lib_DB_postProcessQueryHook' => 'TYPO3\CMS\Core\Database\PostProcessQueryHookInterface',
		't3lib_db_PreparedStatement' => 'TYPO3\CMS\Core\Database\PreparedStatement',
		't3lib_DB_preProcessQueryHook' => 'TYPO3\CMS\Core\Database\PreProcessQueryHookInterface',
		't3lib_queryGenerator' => 'TYPO3\CMS\Core\Database\QueryGenerator',
		't3lib_fullsearch' => 'TYPO3\CMS\Core\Database\QueryView',
		't3lib_refindex' => 'TYPO3\CMS\Core\Database\ReferenceIndex',
		't3lib_loadDBGroup' => 'TYPO3\CMS\Core\Database\RelationHandler',
		't3lib_softrefproc' => 'TYPO3\CMS\Core\Database\SoftReferenceIndex',
		't3lib_sqlparser' => 'TYPO3\CMS\Core\Database\SqlParser',
		't3lib_extTables_PostProcessingHook' => 'TYPO3\CMS\Core\Database\TableConfigurationPostProcessingHookInterface',
		't3lib_TCEmain' => 'TYPO3\CMS\Core\DataHandling\DataHandler',
		't3lib_TCEmain_checkModifyAccessListHook' => 'TYPO3\CMS\Core\DataHandling\DataHandlerCheckModifyAccessListHookInterface',
		't3lib_TCEmain_processUploadHook' => 'TYPO3\CMS\Core\DataHandling\DataHandlerProcessUploadHookInterface',
		't3lib_browseLinksHook' => 'TYPO3\CMS\Core\ElementBrowser\ElementBrowserHookInterface',
		't3lib_codec_JavaScriptEncoder' => 'TYPO3\CMS\Core\Encoder\JavaScriptEncoder',
		't3lib_error_AbstractExceptionHandler' => 'TYPO3\CMS\Core\Error\AbstractExceptionHandler',
		't3lib_error_DebugExceptionHandler' => 'TYPO3\CMS\Core\Error\DebugExceptionHandler',
		't3lib_error_ErrorHandler' => 'TYPO3\CMS\Core\Error\ErrorHandler',
		't3lib_error_ErrorHandlerInterface' => 'TYPO3\CMS\Core\Error\ErrorHandlerInterface',
		't3lib_error_Exception' => 'TYPO3\CMS\Core\Error\Exception',
		't3lib_error_ExceptionHandlerInterface' => 'TYPO3\CMS\Core\Error\ExceptionHandlerInterface',
		't3lib_error_http_AbstractClientErrorException' => 'TYPO3\CMS\Core\Error\Http\AbstractClientErrorException',
		't3lib_error_http_AbstractServerErrorException' => 'TYPO3\CMS\Core\Error\Http\AbstractServerErrorException',
		't3lib_error_http_BadRequestException' => 'TYPO3\CMS\Core\Error\Http\BadRequestException',
		't3lib_error_http_ForbiddenException' => 'TYPO3\CMS\Core\Error\Http\ForbiddenException',
		't3lib_error_http_PageNotFoundException' => 'TYPO3\CMS\Core\Error\Http\PageNotFoundException',
		't3lib_error_http_ServiceUnavailableException' => 'TYPO3\CMS\Core\Error\Http\ServiceUnavailableException',
		't3lib_error_http_StatusException' => 'TYPO3\CMS\Core\Error\Http\StatusException',
		't3lib_error_http_UnauthorizedException' => 'TYPO3\CMS\Core\Error\Http\UnauthorizedException',
		't3lib_error_ProductionExceptionHandler' => 'TYPO3\CMS\Core\Error\ProductionExceptionHandler',
		't3lib_exception' => 'TYPO3\CMS\Core\Exception',
		't3lib_extjs_ExtDirectApi' => 'TYPO3\CMS\Core\ExtDirect\ExtDirectApi',
		't3lib_extjs_ExtDirectDebug' => 'TYPO3\CMS\Core\ExtDirect\ExtDirectDebug',
		't3lib_extjs_ExtDirectRouter' => 'TYPO3\CMS\Core\ExtDirect\ExtDirectRouter',
		't3lib_extMgm' => 'TYPO3\CMS\Core\Utility\ExtensionManagementUtility',
		't3lib_formprotection_Abstract' => 'TYPO3\CMS\Core\FormProtection\AbstractFormProtection',
		't3lib_formprotection_BackendFormProtection' => 'TYPO3\CMS\Core\FormProtection\BackendFormProtection',
		't3lib_formprotection_DisabledFormProtection' => 'TYPO3\CMS\Core\FormProtection\DisabledFormProtection',
		't3lib_formprotection_InvalidTokenException' => 'TYPO3\CMS\Core\FormProtection\Exception',
		't3lib_formprotection_Factory' => 'TYPO3\CMS\Core\FormProtection\FormProtectionFactory',
		't3lib_formprotection_InstallToolFormProtection' => 'TYPO3\CMS\Core\FormProtection\InstallToolFormProtection',
		't3lib_frontendedit' => 'TYPO3\CMS\Core\FrontendEditing\FrontendEditingController',
		't3lib_parsehtml' => 'TYPO3\CMS\Core\Html\HtmlParser',
		't3lib_parsehtml_proc' => 'TYPO3\CMS\Core\Html\RteHtmlParser',
		'TYPO3AJAX' => 'TYPO3\CMS\Core\Http\AjaxRequestHandler',
		't3lib_http_Request' => 'TYPO3\CMS\Core\Http\HttpRequest',
		't3lib_http_observer_Download' => 'TYPO3\CMS\Core\Http\Observer\Download',
		't3lib_stdGraphic' => 'TYPO3\CMS\Core\Imaging\GraphicalFunctions',
		't3lib_admin' => 'TYPO3\CMS\Core\Integrity\DatabaseIntegrityCheck',
		't3lib_l10n_exception_FileNotFound' => 'TYPO3\CMS\Core\Localization\Exception\FileNotFoundException',
		't3lib_l10n_exception_InvalidParser' => 'TYPO3\CMS\Core\Localization\Exception\InvalidParserException',
		't3lib_l10n_exception_InvalidXmlFile' => 'TYPO3\CMS\Core\Localization\Exception\InvalidXmlFileException',
		't3lib_l10n_Store' => 'TYPO3\CMS\Core\Localization\LanguageStore',
		't3lib_l10n_Locales' => 'TYPO3\CMS\Core\Localization\Locales',
		't3lib_l10n_Factory' => 'TYPO3\CMS\Core\Localization\LocalizationFactory',
		't3lib_l10n_parser_AbstractXml' => 'TYPO3\CMS\Core\Localization\Parser\AbstractXmlParser',
		't3lib_l10n_parser' => 'TYPO3\CMS\Core\Localization\Parser\LocalizationParserInterface',
		't3lib_l10n_parser_Llphp' => 'TYPO3\CMS\Core\Localization\Parser\LocallangArrayParser',
		't3lib_l10n_parser_Llxml' => 'TYPO3\CMS\Core\Localization\Parser\LocallangXmlParser',
		't3lib_l10n_parser_Xliff' => 'TYPO3\CMS\Core\Localization\Parser\XliffParser',
		't3lib_lock' => 'TYPO3\CMS\Core\Locking\Locker',
		't3lib_mail_Mailer' => 'TYPO3\CMS\Core\Mail\Mailer',
		't3lib_mail_MailerAdapter' => 'TYPO3\CMS\Core\Mail\MailerAdapterInterface',
		't3lib_mail_Message' => 'TYPO3\CMS\Core\Mail\MailMessage',
		't3lib_mail_MboxTransport' => 'TYPO3\CMS\Core\Mail\MboxTransport',
		't3lib_mail_Rfc822AddressesParser' => 'TYPO3\CMS\Core\Mail\Rfc822AddressesParser',
		't3lib_mail_SwiftMailerAdapter' => 'TYPO3\CMS\Core\Mail\SwiftMailerAdapter',
		't3lib_message_AbstractMessage' => 'TYPO3\CMS\Core\Messaging\AbstractMessage',
		't3lib_message_AbstractStandaloneMessage' => 'TYPO3\CMS\Core\Messaging\AbstractStandaloneMessage',
		't3lib_message_ErrorpageMessage' => 'TYPO3\CMS\Core\Messaging\ErrorpageMessage',
		't3lib_FlashMessage' => 'TYPO3\CMS\Core\Messaging\FlashMessage',
		't3lib_FlashMessageQueue' => 'TYPO3\CMS\Core\Messaging\FlashMessageQueue',
		't3lib_PageRenderer' => 'TYPO3\CMS\Core\Page\PageRenderer',
		't3lib_Registry' => 'TYPO3\CMS\Core\Registry',
		't3lib_Compressor' => 'TYPO3\CMS\Core\Resource\ResourceCompressor',
		't3lib_svbase' => 'TYPO3\CMS\Core\Service\AbstractService',
		't3lib_Singleton' => 'TYPO3\CMS\Core\SingletonInterface',
		't3lib_TimeTrackNull' => 'TYPO3\CMS\Core\TimeTracker\NullTimeTracker',
		't3lib_timeTrack' => 'TYPO3\CMS\Core\TimeTracker\TimeTracker',
		't3lib_tree_Tca_AbstractTcaTreeDataProvider' => 'TYPO3\CMS\Core\Tree\TableConfiguration\AbstractTableConfigurationTreeDataProvider',
		't3lib_tree_Tca_DatabaseTreeDataProvider' => 'TYPO3\CMS\Core\Tree\TableConfiguration\DatabaseTreeDataProvider',
		't3lib_tree_Tca_DatabaseNode' => 'TYPO3\CMS\Core\Tree\TableConfiguration\DatabaseTreeNode',
		't3lib_tree_Tca_ExtJsArrayRenderer' => 'TYPO3\CMS\Core\Tree\TableConfiguration\ExtJsArrayTreeRenderer',
		't3lib_tree_Tca_TcaTree' => 'TYPO3\CMS\Core\Tree\TableConfiguration\TableConfigurationTree',
		't3lib_tree_Tca_DataProviderFactory' => 'TYPO3\CMS\Core\Tree\TableConfiguration\TreeDataProviderFactory',
		't3lib_tsStyleConfig' => 'TYPO3\CMS\Core\TypoScript\ConfigurationForm',
		't3lib_tsparser_ext' => 'TYPO3\CMS\Core\TypoScript\ExtendedTemplateService',
		't3lib_TSparser' => 'TYPO3\CMS\Core\TypoScript\Parser\TypoScriptParser',
		't3lib_TStemplate' => 'TYPO3\CMS\Core\TypoScript\TemplateService',
		't3lib_utility_Array' => 'TYPO3\CMS\Core\Utility\ArrayUtility',
		't3lib_utility_Client' => 'TYPO3\CMS\Core\Utility\ClientUtility',
		't3lib_exec' => 'TYPO3\CMS\Core\Utility\CommandUtility',
		't3lib_utility_Command' => 'TYPO3\CMS\Core\Utility\CommandUtility',
		't3lib_utility_Debug' => 'TYPO3\CMS\Core\Utility\DebugUtility',
		't3lib_diff' => 'TYPO3\CMS\Core\Utility\DiffUtility',
		't3lib_basicFileFunctions' => 'TYPO3\CMS\Core\Utility\File\BasicFileUtility',
		't3lib_extFileFunctions' => 'TYPO3\CMS\Core\Utility\File\ExtendedFileUtility',
		't3lib_extFileFunctions_processDataHook' => 'TYPO3\CMS\Core\Utility\File\ExtendedFileUtilityProcessDataHookInterface',
		't3lib_div' => 'TYPO3\CMS\Core\Utility\GeneralUtility',
		't3lib_utility_Http' => 'TYPO3\CMS\Core\Utility\HttpUtility',
		't3lib_utility_Mail' => 'TYPO3\CMS\Core\Utility\MailUtility',
		't3lib_utility_Math' => 'TYPO3\CMS\Core\Utility\MathUtility',
		't3lib_utility_Monitor' => 'TYPO3\CMS\Core\Utility\MonitorUtility',
		't3lib_utility_Path' => 'TYPO3\CMS\Core\Utility\PathUtility',
		't3lib_utility_PhpOptions' => 'TYPO3\CMS\Core\Utility\PhpOptionsUtility',
		't3lib_utility_VersionNumber' => 'TYPO3\CMS\Core\Utility\VersionNumberUtility'
	);

	/**
	 * This array was generated from the TYPO3 6.2 file:
	 * typo3/sysext/core/Migrations/Code/LegacyClassesForIde.php
	 *
	 * Using the following vim regex replace command:
	 * %s/^\%(\%(abstract \)\?class\|interface\) \([^ ]*\) extends \([^ ]*\)
	 * {}/'\1' => '\2',/
	 *
	 * @var array
	 */
	protected $legacyClasses = array(
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_About_Controller_AboutController' => '\TYPO3\CMS\About\Controller\AboutController',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_About_Domain_Model_Extension' => '\TYPO3\CMS\About\Domain\Model\Extension',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_About_Domain_Repository_ExtensionRepository' => '\TYPO3\CMS\About\Domain\Repository\ExtensionRepository',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_About_ViewHelpers_SkinImageViewHelper' => '\TYPO3\CMS\About\ViewHelpers\SkinImageViewHelper',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Aboutmodules_Controller_ModulesController' => '\TYPO3\CMS\Aboutmodules\Controller\ModulesController',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'AjaxLogin' => '\TYPO3\CMS\Backend\AjaxLoginHandler',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'clickMenu' => '\TYPO3\CMS\Backend\ClickMenu\ClickMenu',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_clipboard' => '\TYPO3\CMS\Backend\Clipboard\Clipboard',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_transl8tools' => '\TYPO3\CMS\Backend\Configuration\TranslationConfigurationProvider',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_TSparser_TSconfig' => '\TYPO3\CMS\Backend\Configuration\TsConfigParser',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_matchCondition_backend' => '\TYPO3\CMS\Backend\Configuration\TypoScript\ConditionMatching\ConditionMatcher',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_contextmenu_AbstractContextMenu' => '\TYPO3\CMS\Backend\ContextMenu\AbstractContextMenu',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_contextmenu_AbstractDataProvider' => '\TYPO3\CMS\Backend\ContextMenu\AbstractContextMenuDataProvider',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_contextmenu_Action' => '\TYPO3\CMS\Backend\ContextMenu\ContextMenuAction',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_formmail' => '\TYPO3\CMS\Frontend\Controller\DataSubmissionController',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_contextmenu_ActionCollection' => '\TYPO3\CMS\Backend\ContextMenu\ContextMenuActionCollection',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_contextmenu_extdirect_ContextMenu' => '\TYPO3\CMS\Backend\ContextMenu\Extdirect\AbstractExtdirectContextMenu',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_contextmenu_pagetree_DataProvider' => '\TYPO3\CMS\Backend\ContextMenu\Pagetree\ContextMenuDataProvider',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_contextmenu_pagetree_extdirect_ContextMenu' => '\TYPO3\CMS\Backend\ContextMenu\Pagetree\Extdirect\ContextMenuConfiguration',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_contextmenu_renderer_Abstract' => '\TYPO3\CMS\Backend\ContextMenu\Renderer\AbstractContextMenuRenderer',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'TYPO3backend' => '\TYPO3\CMS\Backend\Controller\BackendController',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'SC_wizard_backend_layout' => '\TYPO3\CMS\Backend\Controller\BackendLayoutWizardController',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'SC_alt_clickmenu' => '\TYPO3\CMS\Backend\Controller\ClickMenuController',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'SC_show_rechis' => '\TYPO3\CMS\Backend\Controller\ContentElement\ElementHistoryController',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'SC_show_item' => '\TYPO3\CMS\Backend\Controller\ContentElement\ElementInformationController',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'SC_move_el' => '\TYPO3\CMS\Backend\Controller\ContentElement\MoveElementController',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'SC_db_new_content_el' => '\TYPO3\CMS\Backend\Controller\ContentElement\NewContentElementController',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'SC_dummy' => '\TYPO3\CMS\Backend\Controller\DummyController',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'SC_alt_doc' => '\TYPO3\CMS\Backend\Controller\EditDocumentController',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'SC_file_newfolder' => '\TYPO3\CMS\Backend\Controller\File\CreateFolderController',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'SC_file_edit' => '\TYPO3\CMS\Backend\Controller\File\EditFileController',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'TYPO3_tcefile' => '\TYPO3\CMS\Backend\Controller\File\FileController',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'SC_file_upload' => '\TYPO3\CMS\Backend\Controller\File\FileUploadController',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'SC_file_rename' => '\TYPO3\CMS\Backend\Controller\File\RenameFileController',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'SC_alt_file_navframe' => '\TYPO3\CMS\Backend\Controller\FileSystemNavigationFrameController',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'SC_listframe_loader' => '\TYPO3\CMS\Backend\Controller\ListFrameLoaderController',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'SC_index' => '\TYPO3\CMS\Backend\Controller\LoginController',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'SC_login_frameset' => '\TYPO3\CMS\Backend\Controller\LoginFramesetController',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'SC_logout' => '\TYPO3\CMS\Backend\Controller\LogoutController',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'SC_db_new' => '\TYPO3\CMS\Backend\Controller\NewRecordController',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'SC_alt_doc_nodoc' => '\TYPO3\CMS\Backend\Controller\NoDocumentsOpenController',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'SC_db_layout' => '\TYPO3\CMS\Backend\Controller\PageLayoutController',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'SC_alt_db_navframe' => '\TYPO3\CMS\Backend\Controller\PageTreeNavigationController',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'SC_tce_db' => '\TYPO3\CMS\Backend\Controller\SimpleDataHandlerController',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'SC_wizard_add' => '\TYPO3\CMS\Backend\Controller\Wizard\AddController',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'SC_wizard_colorpicker' => '\TYPO3\CMS\Backend\Controller\Wizard\ColorpickerController',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'SC_wizard_edit' => '\TYPO3\CMS\Backend\Controller\Wizard\EditController',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'SC_wizard_forms' => '\TYPO3\CMS\Backend\Controller\Wizard\FormsController',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'SC_wizard_list' => '\TYPO3\CMS\Backend\Controller\Wizard\ListController',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'SC_wizard_rte' => '\TYPO3\CMS\Backend\Controller\Wizard\RteController',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'SC_wizard_table' => '\TYPO3\CMS\Backend\Controller\Wizard\TableController',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_transferData' => '\TYPO3\CMS\Backend\Form\DataPreprocessor',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_TCEforms_inline' => '\TYPO3\CMS\Backend\Form\Element\InlineElement',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_tceformsInlineHook' => '\TYPO3\CMS\Backend\Form\Element\InlineElementHookInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_TCEforms_FE' => '\TYPO3\CMS\Backend\Form\FrontendFormEngine',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_TCEforms_dbFileIconsHook' => '\TYPO3\CMS\Backend\Form\DatabaseFileIconsHookInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_TCEforms_Suggest_DefaultReceiver' => '\TYPO3\CMS\Backend\Form\Element\SuggestDefaultReceiver',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_TCEforms_Suggest' => '\TYPO3\CMS\Backend\Form\Element\SuggestElement',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_TCEforms_Tree' => '\TYPO3\CMS\Backend\Form\Element\TreeElement',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_TCEforms_ValueSlider' => '\TYPO3\CMS\Backend\Form\Element\ValueSlider',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_TCEforms_Flexforms' => '\TYPO3\CMS\Backend\Form\FlexFormsHelper',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_TCEforms' => '\TYPO3\CMS\Backend\Form\FormEngine',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_tsfeBeUserAuth' => '\TYPO3\CMS\Backend\FrontendBackendUserAuthentication',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'recordHistory' => '\TYPO3\CMS\Backend\History\RecordHistory',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'extDirect_DataProvider_State' => '\TYPO3\CMS\Backend\InterfaceState\ExtDirect\DataProvider',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_extobjbase' => '\TYPO3\CMS\Backend\Module\AbstractFunctionModule',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_SCbase' => '\TYPO3\CMS\Backend\Module\BaseScriptClass',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_loadModules' => '\TYPO3\CMS\Backend\Module\ModuleLoader',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Typo3_ModuleStorage' => '\TYPO3\CMS\Backend\Module\ModuleStorage',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_modSettings' => '\TYPO3\CMS\Backend\ModuleSettings',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_recordList' => '\TYPO3\CMS\Backend\RecordList\AbstractRecordList',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'TBE_browser_recordList' => '\TYPO3\CMS\Backend\RecordList\ElementBrowserRecordList',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_localRecordListGetTableHook' => '\TYPO3\CMS\Backend\RecordList\RecordListGetTableHookInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_rteapi' => '\TYPO3\CMS\Backend\Rte\AbstractRte',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'extDirect_dataProvider_BackendLiveSearch' => '\TYPO3\CMS\Backend\Search\LiveSearch\ExtDirect\LiveSearchDataProvider',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_search_liveSearch' => '\TYPO3\CMS\Backend\Search\LiveSearch\LiveSearch',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_search_liveSearch_queryParser' => '\TYPO3\CMS\Backend\Search\LiveSearch\QueryParser',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_spritemanager_AbstractHandler' => '\TYPO3\CMS\Backend\Sprite\AbstractSpriteHandler',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_spritemanager_SimpleHandler' => '\TYPO3\CMS\Backend\Sprite\SimpleSpriteHandler',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_spritemanager_SpriteBuildingHandler' => '\TYPO3\CMS\Backend\Sprite\SpriteBuildingHandler',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_spritemanager_SpriteGenerator' => '\TYPO3\CMS\Backend\Sprite\SpriteGenerator',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_spritemanager_SpriteIconGenerator' => '\TYPO3\CMS\Backend\Sprite\SpriteIconGeneratorInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_SpriteManager' => '\TYPO3\CMS\Backend\Sprite\SpriteManager',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'bigDoc' => '\TYPO3\CMS\Backend\Template\BigDocumentTemplate',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'template' => '\TYPO3\CMS\Backend\Template\DocumentTemplate',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'frontendDoc' => '\TYPO3\CMS\Backend\Template\FrontendDocumentTemplate',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'mediumDoc' => '\TYPO3\CMS\Backend\Template\MediumDocumentTemplate',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'smallDoc' => '\TYPO3\CMS\Backend\Template\SmallDocumentTemplate',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'noDoc' => '\TYPO3\CMS\Backend\Template\StandardDocumentTemplate',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'backend_cacheActionsHook' => '\TYPO3\CMS\Backend\Toolbar\ClearCacheActionsHookInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'ClearCacheMenu' => '\TYPO3\CMS\Backend\Toolbar\ClearCacheToolbarItem',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'LiveSearch' => '\TYPO3\CMS\Backend\Toolbar\LiveSearchToolbarItem',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'ShortcutMenu' => '\TYPO3\CMS\Backend\Toolbar\ShortcutToolbarItem',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'backend_toolbarItem' => '\TYPO3\CMS\Backend\Toolbar\ToolbarItemHookInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_tree_ExtDirect_AbstractExtJsTree' => '\TYPO3\CMS\Backend\Tree\AbstractExtJsTree',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_tree_AbstractTree' => '\TYPO3\CMS\Backend\Tree\AbstractTree',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_tree_AbstractDataProvider' => '\TYPO3\CMS\Backend\Tree\AbstractTreeDataProvider',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_tree_AbstractStateProvider' => '\TYPO3\CMS\Backend\Tree\AbstractTreeStateProvider',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_tree_ComparableNode' => '\TYPO3\CMS\Backend\Tree\ComparableNodeInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_tree_DraggableAndDropable' => '\TYPO3\CMS\Backend\Tree\DraggableAndDropableNodeInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_tree_LabelEditable' => '\TYPO3\CMS\Backend\Tree\EditableNodeLabelInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_tree_extdirect_Node' => '\TYPO3\CMS\Backend\Tree\ExtDirectNode',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_tree_pagetree_interfaces_CollectionProcessor' => '\TYPO3\CMS\Backend\Tree\Pagetree\CollectionProcessorInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_tree_pagetree_Commands' => '\TYPO3\CMS\Backend\Tree\Pagetree\Commands',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_tree_pagetree_DataProvider' => '\TYPO3\CMS\Backend\Tree\Pagetree\DataProvider',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_tree_pagetree_extdirect_Commands' => '\TYPO3\CMS\Backend\Tree\Pagetree\ExtdirectTreeCommands',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_tree_pagetree_extdirect_Tree' => '\TYPO3\CMS\Backend\Tree\Pagetree\ExtdirectTreeDataProvider',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_tree_pagetree_Indicator' => '\TYPO3\CMS\Backend\Tree\Pagetree\Indicator',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_tree_pagetree_interfaces_IndicatorProvider' => '\TYPO3\CMS\Backend\Tree\Pagetree\IndicatorProviderInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_tree_pagetree_Node' => '\TYPO3\CMS\Backend\Tree\Pagetree\PagetreeNode',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_tree_pagetree_NodeCollection' => '\TYPO3\CMS\Backend\Tree\Pagetree\PagetreeNodeCollection',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_tree_Renderer_Abstract' => '\TYPO3\CMS\Backend\Tree\Renderer\AbstractTreeRenderer',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_tree_Renderer_ExtJsJson' => '\TYPO3\CMS\Backend\Tree\Renderer\ExtJsJsonTreeRenderer',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_tree_Renderer_UnorderedList' => '\TYPO3\CMS\Backend\Tree\Renderer\UnorderedListTreeRenderer',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_tree_SortedNodeCollection' => '\TYPO3\CMS\Backend\Tree\SortedTreeNodeCollection',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_tree_Node' => '\TYPO3\CMS\Backend\Tree\TreeNode',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_tree_NodeCollection' => '\TYPO3\CMS\Backend\Tree\TreeNodeCollection',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_tree_RepresentationNode' => '\TYPO3\CMS\Backend\Tree\TreeRepresentationNode',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_treeView' => '\TYPO3\CMS\Backend\Tree\View\AbstractTreeView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_browseTree' => '\TYPO3\CMS\Backend\Tree\View\BrowseTreeView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_folderTree' => '\TYPO3\CMS\Backend\Tree\View\FolderTreeView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_positionMap' => '\TYPO3\CMS\Backend\Tree\View\PagePositionMap',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_pageTree' => '\TYPO3\CMS\Backend\Tree\View\PageTreeView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'extDirect_DataProvider_BackendUserSettings' => '\TYPO3\CMS\Backend\User\ExtDirect\BackendUserSettingsDataProvider',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_BEfunc' => '\TYPO3\CMS\Backend\Utility\BackendUtility',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_iconWorks' => '\TYPO3\CMS\Backend\Utility\IconUtility',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_cms_BackendLayout' => '\TYPO3\CMS\Backend\View\BackendLayoutView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'ModuleMenu' => '\TYPO3\CMS\Backend\View\ModuleMenuView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_cms_layout' => '\TYPO3\CMS\Backend\View\PageLayoutView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_cms_layout_tt_content_drawItemHook' => '\TYPO3\CMS\Backend\View\PageLayoutViewDrawItemHookInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'webPageTree' => '\TYPO3\CMS\Backend\View\PageTreeView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'SC_t3lib_thumbs' => '\TYPO3\CMS\Backend\View\ThumbnailView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'TYPO3Logo' => '\TYPO3\CMS\Backend\View\LogoView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'cms_newContentElementWizardsHook' => '\TYPO3\CMS\Backend\Wizard\NewContentElementWizardHookInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_extjs_ExtDirectRouter' => '\TYPO3\CMS\Core\ExtDirect\ExtDirectRouter',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_extjs_ExtDirectApi' => '\TYPO3\CMS\Core\ExtDirect\ExtDirectApi',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_extjs_ExtDirectDebug' => '\TYPO3\CMS\Core\ExtDirect\ExtDirectDebug',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_cli' => '\TYPO3\CMS\Core\Controller\CommandLineController',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'extDirect_DataProvider_ContextHelp' => '\TYPO3\CMS\ContextHelp\ExtDirect\ContextHelpDataProvider',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_userAuth' => '\TYPO3\CMS\Core\Authentication\AbstractUserAuthentication',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_beUserAuth' => '\TYPO3\CMS\Core\Authentication\BackendUserAuthentication',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_autoloader' => '\TYPO3\CMS\Core\Core\ClassLoader',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_cache_backend_AbstractBackend' => '\TYPO3\CMS\Core\Cache\Backend\AbstractBackend',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_cache_backend_ApcBackend' => '\TYPO3\CMS\Core\Cache\Backend\ApcBackend',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_cache_backend_Backend' => '\TYPO3\CMS\Core\Cache\Backend\BackendInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_cache_backend_FileBackend' => '\TYPO3\CMS\Core\Cache\Backend\FileBackend',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_cache_backend_MemcachedBackend' => '\TYPO3\CMS\Core\Cache\Backend\MemcachedBackend',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_cache_backend_NullBackend' => '\TYPO3\CMS\Core\Cache\Backend\NullBackend',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_cache_backend_PdoBackend' => '\TYPO3\CMS\Core\Cache\Backend\PdoBackend',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_cache_backend_PhpCapableBackend' => '\TYPO3\CMS\Core\Cache\Backend\PhpCapableBackendInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_cache_backend_RedisBackend' => '\TYPO3\CMS\Core\Cache\Backend\RedisBackend',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_cache_backend_TransientMemoryBackend' => '\TYPO3\CMS\Core\Cache\Backend\TransientMemoryBackend',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_cache_backend_DbBackend' => '\TYPO3\CMS\Core\Cache\Backend\Typo3DatabaseBackend',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_cache' => '\TYPO3\CMS\Core\Cache\Cache',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_cache_Factory' => '\TYPO3\CMS\Core\Cache\CacheFactory',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_cache_Manager' => '\TYPO3\CMS\Core\Cache\CacheManager',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_cache_Exception' => '\TYPO3\CMS\Core\Cache\Exception',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_cache_exception_ClassAlreadyLoaded' => '\TYPO3\CMS\Core\Cache\Exception\ClassAlreadyLoadedException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_cache_exception_DuplicateIdentifier' => '\TYPO3\CMS\Core\Cache\Exception\DuplicateIdentifierException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_cache_exception_InvalidBackend' => '\TYPO3\CMS\Core\Cache\Exception\InvalidBackendException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_cache_exception_InvalidCache' => '\TYPO3\CMS\Core\Cache\Exception\InvalidCacheException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_cache_exception_InvalidData' => '\TYPO3\CMS\Core\Cache\Exception\InvalidDataException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_cache_exception_NoSuchCache' => '\TYPO3\CMS\Core\Cache\Exception\NoSuchCacheException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_cache_frontend_AbstractFrontend' => '\TYPO3\CMS\Core\Cache\Frontend\AbstractFrontend',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_cache_frontend_Frontend' => '\TYPO3\CMS\Core\Cache\Frontend\FrontendInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_cache_frontend_PhpFrontend' => '\TYPO3\CMS\Core\Cache\Frontend\PhpFrontend',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_cache_frontend_StringFrontend' => '\TYPO3\CMS\Core\Cache\Frontend\StringFrontend',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_cache_frontend_VariableFrontend' => '\TYPO3\CMS\Core\Cache\Frontend\VariableFrontend',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_cs' => '\TYPO3\CMS\Core\Charset\CharsetConverter',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_collection_AbstractRecordCollection' => '\TYPO3\CMS\Core\Collection\AbstractRecordCollection',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_collection_Collection' => '\TYPO3\CMS\Core\Collection\CollectionInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_collection_Editable' => '\TYPO3\CMS\Core\Collection\EditableCollectionInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_collection_Nameable' => '\TYPO3\CMS\Core\Collection\NameableCollectionInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_collection_Persistable' => '\TYPO3\CMS\Core\Collection\PersistableCollectionInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_collection_RecordCollection' => '\TYPO3\CMS\Core\Collection\RecordCollectionInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_collection_RecordCollectionRepository' => '\TYPO3\CMS\Core\Collection\RecordCollectionRepository',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_collection_Sortable' => '\TYPO3\CMS\Core\Collection\SortableCollectionInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_collection_StaticRecordCollection' => '\TYPO3\CMS\Core\Collection\StaticRecordCollection',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_flexformtools' => '\TYPO3\CMS\Core\Configuration\FlexForm\FlexFormTools',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_matchCondition_abstract' => '\TYPO3\CMS\Core\Configuration\TypoScript\ConditionMatching\AbstractConditionMatcher',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_DB' => '\TYPO3\CMS\Core\Database\DatabaseConnection',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_PdoHelper' => '\TYPO3\CMS\Core\Database\PdoHelper',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_DB_postProcessQueryHook' => '\TYPO3\CMS\Core\Database\PostProcessQueryHookInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_db_PreparedStatement' => '\TYPO3\CMS\Core\Database\PreparedStatement',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_DB_preProcessQueryHook' => '\TYPO3\CMS\Core\Database\PreProcessQueryHookInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_queryGenerator' => '\TYPO3\CMS\Core\Database\QueryGenerator',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_fullsearch' => '\TYPO3\CMS\Core\Database\QueryView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_refindex' => '\TYPO3\CMS\Core\Database\ReferenceIndex',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_loadDBGroup' => '\TYPO3\CMS\Core\Database\RelationHandler',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_softrefproc' => '\TYPO3\CMS\Core\Database\SoftReferenceIndex',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_sqlparser' => '\TYPO3\CMS\Core\Database\SqlParser',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_extTables_PostProcessingHook' => '\TYPO3\CMS\Core\Database\TableConfigurationPostProcessingHookInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_TCEmain' => '\TYPO3\CMS\Core\DataHandling\DataHandler',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_TCEmain_checkModifyAccessListHook' => '\TYPO3\CMS\Core\DataHandling\DataHandlerCheckModifyAccessListHookInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_TCEmain_processUploadHook' => '\TYPO3\CMS\Core\DataHandling\DataHandlerProcessUploadHookInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_browseLinksHook' => '\TYPO3\CMS\Core\ElementBrowser\ElementBrowserHookInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_codec_JavaScriptEncoder' => '\TYPO3\CMS\Core\Encoder\JavaScriptEncoder',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_error_AbstractExceptionHandler' => '\TYPO3\CMS\Core\Error\AbstractExceptionHandler',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_error_DebugExceptionHandler' => '\TYPO3\CMS\Core\Error\DebugExceptionHandler',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_error_ErrorHandler' => '\TYPO3\CMS\Core\Error\ErrorHandler',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_error_ErrorHandlerInterface' => '\TYPO3\CMS\Core\Error\ErrorHandlerInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_error_Exception' => '\TYPO3\CMS\Core\Error\Exception',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_error_ExceptionHandlerInterface' => '\TYPO3\CMS\Core\Error\ExceptionHandlerInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_error_http_AbstractClientErrorException' => '\TYPO3\CMS\Core\Error\Http\AbstractClientErrorException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_error_http_AbstractServerErrorException' => '\TYPO3\CMS\Core\Error\Http\AbstractServerErrorException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_error_http_BadRequestException' => '\TYPO3\CMS\Core\Error\Http\BadRequestException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_error_http_ForbiddenException' => '\TYPO3\CMS\Core\Error\Http\ForbiddenException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_error_http_PageNotFoundException' => '\TYPO3\CMS\Core\Error\Http\PageNotFoundException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_error_http_ServiceUnavailableException' => '\TYPO3\CMS\Core\Error\Http\ServiceUnavailableException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_error_http_StatusException' => '\TYPO3\CMS\Core\Error\Http\StatusException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_error_http_UnauthorizedException' => '\TYPO3\CMS\Core\Error\Http\UnauthorizedException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_error_ProductionExceptionHandler' => '\TYPO3\CMS\Core\Error\ProductionExceptionHandler',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_exception' => '\TYPO3\CMS\Core\Exception',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_extMgm' => '\TYPO3\CMS\Core\Utility\ExtensionManagementUtility',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_formprotection_Abstract' => '\TYPO3\CMS\Core\FormProtection\AbstractFormProtection',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_formprotection_BackendFormProtection' => '\TYPO3\CMS\Core\FormProtection\BackendFormProtection',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_formprotection_DisabledFormProtection' => '\TYPO3\CMS\Core\FormProtection\DisabledFormProtection',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_formprotection_InvalidTokenException' => '\TYPO3\CMS\Core\FormProtection\Exception',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_formprotection_Factory' => '\TYPO3\CMS\Core\FormProtection\FormProtectionFactory',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_formprotection_InstallToolFormProtection' => '\TYPO3\CMS\Core\FormProtection\InstallToolFormProtection',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_frontendedit' => '\TYPO3\CMS\Core\FrontendEditing\FrontendEditingController',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_parsehtml' => '\TYPO3\CMS\Core\Html\HtmlParser',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_parsehtml_proc' => '\TYPO3\CMS\Core\Html\RteHtmlParser',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'TYPO3AJAX' => '\TYPO3\CMS\Core\Http\AjaxRequestHandler',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_http_Request' => '\TYPO3\CMS\Core\Http\HttpRequest',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_http_observer_Download' => '\TYPO3\CMS\Core\Http\Observer\Download',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_stdGraphic' => '\TYPO3\CMS\Core\Imaging\GraphicalFunctions',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_admin' => '\TYPO3\CMS\Core\Integrity\DatabaseIntegrityCheck',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_l10n_exception_FileNotFound' => '\TYPO3\CMS\Core\Localization\Exception\FileNotFoundException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_l10n_exception_InvalidParser' => '\TYPO3\CMS\Core\Localization\Exception\InvalidParserException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_l10n_exception_InvalidXmlFile' => '\TYPO3\CMS\Core\Localization\Exception\InvalidXmlFileException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_l10n_Store' => '\TYPO3\CMS\Core\Localization\LanguageStore',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_l10n_Locales' => '\TYPO3\CMS\Core\Localization\Locales',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_l10n_Factory' => '\TYPO3\CMS\Core\Localization\LocalizationFactory',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_l10n_parser_AbstractXml' => '\TYPO3\CMS\Core\Localization\Parser\AbstractXmlParser',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_l10n_parser' => '\TYPO3\CMS\Core\Localization\Parser\LocalizationParserInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_l10n_parser_Llphp' => '\TYPO3\CMS\Core\Localization\Parser\LocallangArrayParser',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_l10n_parser_Llxml' => '\TYPO3\CMS\Core\Localization\Parser\LocallangXmlParser',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_l10n_parser_Xliff' => '\TYPO3\CMS\Core\Localization\Parser\XliffParser',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_lock' => '\TYPO3\CMS\Core\Locking\Locker',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_mail_Mailer' => '\TYPO3\CMS\Core\Mail\Mailer',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_mail_MailerAdapter' => '\TYPO3\CMS\Core\Mail\MailerAdapterInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_mail_Message' => '\TYPO3\CMS\Core\Mail\MailMessage',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_mail_MboxTransport' => '\TYPO3\CMS\Core\Mail\MboxTransport',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_mail_Rfc822AddressesParser' => '\TYPO3\CMS\Core\Mail\Rfc822AddressesParser',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_mail_SwiftMailerAdapter' => '\TYPO3\CMS\Core\Mail\SwiftMailerAdapter',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_message_AbstractMessage' => '\TYPO3\CMS\Core\Messaging\AbstractMessage',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_message_AbstractStandaloneMessage' => '\TYPO3\CMS\Core\Messaging\AbstractStandaloneMessage',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_message_ErrorpageMessage' => '\TYPO3\CMS\Core\Messaging\ErrorpageMessage',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_FlashMessage' => '\TYPO3\CMS\Core\Messaging\FlashMessage',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_FlashMessageQueue' => '\TYPO3\CMS\Core\Messaging\FlashMessageQueue',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_PageRenderer' => '\TYPO3\CMS\Core\Page\PageRenderer',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_Registry' => '\TYPO3\CMS\Core\Registry',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_Compressor' => '\TYPO3\CMS\Core\Resource\ResourceCompressor',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_svbase' => '\TYPO3\CMS\Core\Service\AbstractService',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_Singleton' => '\TYPO3\CMS\Core\SingletonInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_TimeTrackNull' => '\TYPO3\CMS\Core\TimeTracker\NullTimeTracker',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_timeTrack' => '\TYPO3\CMS\Core\TimeTracker\TimeTracker',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_tree_Tca_AbstractTcaTreeDataProvider' => '\TYPO3\CMS\Core\Tree\TableConfiguration\AbstractTableConfigurationTreeDataProvider',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_tree_Tca_DatabaseTreeDataProvider' => '\TYPO3\CMS\Core\Tree\TableConfiguration\DatabaseTreeDataProvider',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_tree_Tca_DatabaseNode' => '\TYPO3\CMS\Core\Tree\TableConfiguration\DatabaseTreeNode',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_tree_Tca_ExtJsArrayRenderer' => '\TYPO3\CMS\Core\Tree\TableConfiguration\ExtJsArrayTreeRenderer',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_tree_Tca_TcaTree' => '\TYPO3\CMS\Core\Tree\TableConfiguration\TableConfigurationTree',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_tree_Tca_DataProviderFactory' => '\TYPO3\CMS\Core\Tree\TableConfiguration\TreeDataProviderFactory',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_tsStyleConfig' => '\TYPO3\CMS\Core\TypoScript\ConfigurationForm',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_tsparser_ext' => '\TYPO3\CMS\Core\TypoScript\ExtendedTemplateService',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_TSparser' => '\TYPO3\CMS\Core\TypoScript\Parser\TypoScriptParser',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_TStemplate' => '\TYPO3\CMS\Core\TypoScript\TemplateService',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_utility_Array' => '\TYPO3\CMS\Core\Utility\ArrayUtility',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_utility_Client' => '\TYPO3\CMS\Core\Utility\ClientUtility',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_exec' => '\TYPO3\CMS\Core\Utility\CommandUtility',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_utility_Command' => '\TYPO3\CMS\Core\Utility\CommandUtility',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_utility_Debug' => '\TYPO3\CMS\Core\Utility\DebugUtility',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_diff' => '\TYPO3\CMS\Core\Utility\DiffUtility',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_basicFileFunctions' => '\TYPO3\CMS\Core\Utility\File\BasicFileUtility',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_extFileFunctions' => '\TYPO3\CMS\Core\Utility\File\ExtendedFileUtility',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_extFileFunctions_processDataHook' => '\TYPO3\CMS\Core\Utility\File\ExtendedFileUtilityProcessDataHookInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_div' => '\TYPO3\CMS\Core\Utility\GeneralUtility',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_utility_Http' => '\TYPO3\CMS\Core\Utility\HttpUtility',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_utility_Mail' => '\TYPO3\CMS\Core\Utility\MailUtility',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_utility_Math' => '\TYPO3\CMS\Core\Utility\MathUtility',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_utility_Monitor' => '\TYPO3\CMS\Core\Utility\MonitorUtility',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_utility_Path' => '\TYPO3\CMS\Core\Utility\PathUtility',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_utility_PhpOptions' => '\TYPO3\CMS\Core\Utility\PhpOptionsUtility',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_utility_VersionNumber' => '\TYPO3\CMS\Core\Utility\VersionNumberUtility',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'SC_view_help' => '\TYPO3\CMS\Cshmanual\Controller\HelpModuleController',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_cssstyledcontent_pi1' => '\TYPO3\CMS\CssStyledContent\Controller\CssStyledContentController',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'ux_t3lib_DB' => '\TYPO3\CMS\Dbal\Database\DatabaseConnection',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'ux_t3lib_sqlparser' => '\TYPO3\CMS\Dbal\Database\SqlParser',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_dbal_module1' => '\TYPO3\CMS\Dbal\Controller\ModuleController',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_dbal_querycache' => '\TYPO3\CMS\Dbal\QueryCache',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'ux_localRecordList' => '\TYPO3\CMS\Dbal\RecordList\DatabaseRecordList',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Command_HelpCommandController' => '\TYPO3\CMS\Extbase\Command\HelpCommandController',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Configuration_AbstractConfigurationManager' => '\TYPO3\CMS\Extbase\Configuration\AbstractConfigurationManager',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Configuration_BackendConfigurationManager' => '\TYPO3\CMS\Extbase\Configuration\BackendConfigurationManager',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Configuration_ConfigurationManager' => '\TYPO3\CMS\Extbase\Configuration\ConfigurationManager',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Configuration_ConfigurationManagerInterface' => '\TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Configuration_Exception' => '\TYPO3\CMS\Extbase\Configuration\Exception',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Configuration_Exception_ContainerIsLocked' => '\TYPO3\CMS\Extbase\Configuration\Exception\ContainerIsLockedException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Configuration_Exception_InvalidConfigurationType' => '\TYPO3\CMS\Extbase\Configuration\Exception\InvalidConfigurationTypeException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Configuration_Exception_NoSuchFile' => '\TYPO3\CMS\Extbase\Configuration\Exception\NoSuchFileException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Configuration_Exception_NoSuchOption' => '\TYPO3\CMS\Extbase\Configuration\Exception\NoSuchOptionException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Configuration_Exception_ParseError' => '\TYPO3\CMS\Extbase\Configuration\Exception\ParseErrorException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Configuration_FrontendConfigurationManager' => '\TYPO3\CMS\Extbase\Configuration\FrontendConfigurationManager',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Core_Bootstrap' => '\TYPO3\CMS\Extbase\Core\Bootstrap',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Core_BootstrapInterface' => '\TYPO3\CMS\Extbase\Core\BootstrapInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Domain_Model_AbstractFileCollection' => '\TYPO3\CMS\Extbase\Domain\Model\AbstractFileCollection',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Domain_Model_AbstractFileFolder' => '\TYPO3\CMS\Extbase\Domain\Model\AbstractFileFolder',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Domain_Model_BackendUser' => '\TYPO3\CMS\Extbase\Domain\Model\BackendUser',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Domain_Model_BackendUserGroup' => '\TYPO3\CMS\Extbase\Domain\Model\BackendUserGroup',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Domain_Model_Category' => '\TYPO3\CMS\Extbase\Domain\Model\Category',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Domain_Model_File' => '\TYPO3\CMS\Extbase\Domain\Model\File',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Domain_Model_FileMount' => '\TYPO3\CMS\Extbase\Domain\Model\FileMount',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Domain_Model_FileReference' => '\TYPO3\CMS\Extbase\Domain\Model\FileReference',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Domain_Model_Folder' => '\TYPO3\CMS\Extbase\Domain\Model\Folder',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Domain_Model_FolderBasedFileCollection' => '\TYPO3\CMS\Extbase\Domain\Model\FolderBasedFileCollection',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Domain_Model_FrontendUser' => '\TYPO3\CMS\Extbase\Domain\Model\FrontendUser',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Domain_Model_FrontendUserGroup' => '\TYPO3\CMS\Extbase\Domain\Model\FrontendUserGroup',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Domain_Model_StaticFileCollection' => '\TYPO3\CMS\Extbase\Domain\Model\StaticFileCollection',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Domain_Repository_BackendUserRepository' => '\TYPO3\CMS\Extbase\Domain\Repository\BackendUserGroupRepository',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Domain_Repository_BackendUserGroupRepository' => '\TYPO3\CMS\Extbase\Domain\Repository\BackendUserGroupRepository',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Domain_Repository_CategoryRepository' => '\TYPO3\CMS\Extbase\Domain\Repository\CategoryRepository',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Domain_Repository_FileMountRepository' => '\TYPO3\CMS\Extbase\Domain\Repository\FileMountRepository',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Domain_Repository_FrontendUserGroupRepository' => '\TYPO3\CMS\Extbase\Domain\Repository\FrontendUserGroupRepository',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Domain_Repository_FrontendUserRepository' => '\TYPO3\CMS\Extbase\Domain\Repository\FrontendUserRepository',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_DomainObject_AbstractDomainObject' => '\TYPO3\CMS\Extbase\DomainObject\AbstractDomainObject',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_DomainObject_AbstractEntity' => '\TYPO3\CMS\Extbase\DomainObject\AbstractEntity',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_DomainObject_AbstractValueObject' => '\TYPO3\CMS\Extbase\DomainObject\AbstractValueObject',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_DomainObject_DomainObjectInterface' => '\TYPO3\CMS\Extbase\DomainObject\DomainObjectInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Error_Error' => '\TYPO3\CMS\Extbase\Error\Error',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Error_Message' => '\TYPO3\CMS\Extbase\Error\Message',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Error_Notice' => '\TYPO3\CMS\Extbase\Error\Notice',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Error_Result' => '\TYPO3\CMS\Extbase\Error\Result',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Error_Warning' => '\TYPO3\CMS\Extbase\Error\Warning',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Exception' => '\TYPO3\CMS\Extbase\Exception',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_MVC_CLI_Command' => '\TYPO3\CMS\Extbase\Mvc\Cli\Command',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_MVC_CLI_CommandArgumentDefinition' => '\TYPO3\CMS\Extbase\Mvc\Cli\CommandArgumentDefinition',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_MVC_CLI_CommandManager' => '\TYPO3\CMS\Extbase\Mvc\Cli\CommandManager',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_MVC_CLI_Request' => '\TYPO3\CMS\Extbase\Mvc\Cli\Request',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_MVC_CLI_RequestBuilder' => '\TYPO3\CMS\Extbase\Mvc\Cli\RequestBuilder',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_MVC_CLI_RequestHandler' => '\TYPO3\CMS\Extbase\Mvc\Cli\RequestHandler',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_MVC_CLI_Response' => '\TYPO3\CMS\Extbase\Mvc\Cli\Response',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_MVC_Controller_AbstractController' => '\TYPO3\CMS\Extbase\Mvc\Controller\AbstractController',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_MVC_Controller_ActionController' => '\TYPO3\CMS\Extbase\Mvc\Controller\ActionController',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_MVC_Controller_Argument' => '\TYPO3\CMS\Extbase\Mvc\Controller\Argument',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_MVC_Controller_ArgumentError' => '\TYPO3\CMS\Extbase\Mvc\Controller\ArgumentError',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_MVC_Controller_Arguments' => '\TYPO3\CMS\Extbase\Mvc\Controller\Arguments',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_MVC_Controller_ArgumentsValidator' => '\TYPO3\CMS\Extbase\Mvc\Controller\ArgumentsValidator',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_MVC_Controller_CommandController' => '\TYPO3\CMS\Extbase\Mvc\Controller\CommandController',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_MVC_Controller_CommandControllerInterface' => '\TYPO3\CMS\Extbase\Mvc\Controller\CommandControllerInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_MVC_Controller_ControllerContext' => '\TYPO3\CMS\Extbase\Mvc\Controller\ControllerContext',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_MVC_Controller_ControllerInterface' => '\TYPO3\CMS\Extbase\Mvc\Controller\ControllerInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_MVC_Controller_Exception_RequiredArgumentMissingException' => '\TYPO3\CMS\Extbase\Mvc\Controller\Exception\RequiredArgumentMissingException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_MVC_Controller_FlashMessages' => '\TYPO3\CMS\Extbase\Mvc\Controller\FlashMessageContainer',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_MVC_Controller_MvcPropertyMappingConfiguration' => '\TYPO3\CMS\Extbase\Mvc\Controller\MvcPropertyMappingConfiguration',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_MVC_Dispatcher' => '\TYPO3\CMS\Extbase\Mvc\Dispatcher',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_MVC_Exception' => '\TYPO3\CMS\Extbase\Mvc\Exception',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_MVC_Exception_AmbiguousCommandIdentifier' => '\TYPO3\CMS\Extbase\Mvc\Exception\AmbiguousCommandIdentifierException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_MVC_Exception_Command' => '\TYPO3\CMS\Extbase\Mvc\Exception\CommandException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_MVC_Exception_InfiniteLoop' => '\TYPO3\CMS\Extbase\Mvc\Exception\InfiniteLoopException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_MVC_Exception_InvalidActionName' => '\TYPO3\CMS\Extbase\Mvc\Exception\InvalidActionNameException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_MVC_Exception_InvalidArgumentMixing' => '\TYPO3\CMS\Extbase\Mvc\Exception\InvalidArgumentMixingException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_MVC_Exception_InvalidArgumentName' => '\TYPO3\CMS\Extbase\Mvc\Exception\InvalidArgumentNameException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_MVC_Exception_InvalidArgumentType' => '\TYPO3\CMS\Extbase\Mvc\Exception\InvalidArgumentTypeException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_MVC_Exception_InvalidArgumentValue' => '\TYPO3\CMS\Extbase\Mvc\Exception\InvalidArgumentValueException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_MVC_Exception_InvalidCommandIdentifier' => '\TYPO3\CMS\Extbase\Mvc\Exception\InvalidCommandIdentifierException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_MVC_Exception_InvalidController' => '\TYPO3\CMS\Extbase\Mvc\Exception\InvalidControllerException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_MVC_Exception_InvalidControllerName' => '\TYPO3\CMS\Extbase\Mvc\Exception\InvalidControllerNameException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_MVC_Exception_InvalidExtensionName' => '\TYPO3\CMS\Extbase\Mvc\Exception\InvalidExtensionNameException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_MVC_Exception_InvalidMarker' => '\TYPO3\CMS\Extbase\Mvc\Exception\InvalidMarkerException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_MVC_Exception_InvalidOrNoRequestHash' => '\TYPO3\CMS\Extbase\Mvc\Exception\InvalidOrNoRequestHashException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_MVC_Exception_InvalidRequestMethod' => '\TYPO3\CMS\Extbase\Mvc\Exception\InvalidRequestMethodException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_MVC_Exception_InvalidRequestType' => '\TYPO3\CMS\Extbase\Mvc\Exception\InvalidRequestTypeException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_MVC_Exception_InvalidTemplateResource' => '\TYPO3\CMS\Extbase\Mvc\Exception\InvalidTemplateResourceException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_MVC_Exception_InvalidUriPattern' => '\TYPO3\CMS\Extbase\Mvc\Exception\InvalidUriPatternException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_MVC_Exception_InvalidViewHelper' => '\TYPO3\CMS\Extbase\Mvc\Exception\InvalidViewHelperException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_MVC_Exception_NoSuchAction' => '\TYPO3\CMS\Extbase\Mvc\Exception\NoSuchActionException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_MVC_Exception_NoSuchArgument' => '\TYPO3\CMS\Extbase\Mvc\Exception\NoSuchArgumentException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_MVC_Exception_NoSuchCommand' => '\TYPO3\CMS\Extbase\Mvc\Exception\NoSuchCommandException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_MVC_Exception_NoSuchController' => '\TYPO3\CMS\Extbase\Mvc\Exception\NoSuchControllerException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_MVC_Exception_RequiredArgumentMissing' => '\TYPO3\CMS\Extbase\Mvc\Exception\RequiredArgumentMissingException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_MVC_Exception_StopAction' => '\TYPO3\CMS\Extbase\Mvc\Exception\StopActionException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_MVC_Exception_UnsupportedRequestType' => '\TYPO3\CMS\Extbase\Mvc\Exception\UnsupportedRequestTypeException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_MVC_Request' => '\TYPO3\CMS\Extbase\Mvc\Request',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_MVC_RequestHandlerInterface' => '\TYPO3\CMS\Extbase\Mvc\RequestHandlerInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_MVC_RequestHandlerResolver' => '\TYPO3\CMS\Extbase\Mvc\RequestHandlerResolver',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_MVC_RequestInterface' => '\TYPO3\CMS\Extbase\Mvc\RequestInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_MVC_Response' => '\TYPO3\CMS\Extbase\Mvc\Response',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_MVC_ResponseInterface' => '\TYPO3\CMS\Extbase\Mvc\ResponseInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_MVC_View_AbstractView' => '\TYPO3\CMS\Extbase\Mvc\View\AbstractView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_MVC_View_EmptyView' => '\TYPO3\CMS\Extbase\Mvc\View\EmptyView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_MVC_View_NotFoundView' => '\TYPO3\CMS\Extbase\Mvc\View\NotFoundView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_MVC_View_ViewInterface' => '\TYPO3\CMS\Extbase\Mvc\View\ViewInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_MVC_Web_AbstractRequestHandler' => '\TYPO3\CMS\Extbase\Mvc\Web\AbstractRequestHandler',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_MVC_Web_BackendRequestHandler' => '\TYPO3\CMS\Extbase\Mvc\Web\BackendRequestHandler',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_MVC_Web_FrontendRequestHandler' => '\TYPO3\CMS\Extbase\Mvc\Web\FrontendRequestHandler',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_MVC_Web_Request' => '\TYPO3\CMS\Extbase\Mvc\Web\Request',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_MVC_Web_RequestBuilder' => '\TYPO3\CMS\Extbase\Mvc\Web\RequestBuilder',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_MVC_Web_Response' => '\TYPO3\CMS\Extbase\Mvc\Web\Response',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_MVC_Web_Routing_UriBuilder' => '\TYPO3\CMS\Extbase\Mvc\Web\Routing\UriBuilder',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Object_Container_ClassInfo' => '\TYPO3\CMS\Extbase\Object\Container\ClassInfo',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Object_Container_ClassInfoCache' => '\TYPO3\CMS\Extbase\Object\Container\ClassInfoCache',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Object_Container_ClassInfoFactory' => '\TYPO3\CMS\Extbase\Object\Container\ClassInfoFactory',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Object_Container_Container' => '\TYPO3\CMS\Extbase\Object\Container\Container',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Object_Container_Exception_CannotInitializeCacheException' => '\TYPO3\CMS\Extbase\Object\Container\Exception\CannotInitializeCacheException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Object_Container_Exception_TooManyRecursionLevelsException' => '\TYPO3\CMS\Extbase\Object\Container\Exception\TooManyRecursionLevelsException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Object_Container_Exception_UnknownObjectException' => '\TYPO3\CMS\Extbase\Object\Container\Exception\UnknownObjectException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Object_Exception' => '\TYPO3\CMS\Extbase\Object\Exception',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Object_Exception_CannotBuildObject' => '\TYPO3\CMS\Extbase\Object\Exception\CannotBuildObjectException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Object_Exception_CannotReconstituteObject' => '\TYPO3\CMS\Extbase\Object\Exception\CannotReconstituteObjectException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Object_Exception_WrongScope' => '\TYPO3\CMS\Extbase\Object\Exception\WrongScopeException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Object_InvalidClass' => '\TYPO3\CMS\Extbase\Object\InvalidClassException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Object_InvalidObjectConfiguration' => '\TYPO3\CMS\Extbase\Object\InvalidObjectConfigurationException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Object_InvalidObject' => '\TYPO3\CMS\Extbase\Object\InvalidObjectException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Object_ObjectAlreadyRegistered' => '\TYPO3\CMS\Extbase\Object\ObjectAlreadyRegisteredException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Object_ObjectManager' => '\TYPO3\CMS\Extbase\Object\ObjectManager',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Object_ObjectManagerInterface' => '\TYPO3\CMS\Extbase\Object\ObjectManagerInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Object_UnknownClass' => '\TYPO3\CMS\Extbase\Object\UnknownClassException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Object_UnknownInterface' => '\TYPO3\CMS\Extbase\Object\UnknownInterfaceException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Object_UnresolvedDependencies' => '\TYPO3\CMS\Extbase\Object\UnresolvedDependenciesException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Persistence_Backend' => '\TYPO3\CMS\Extbase\Persistence\Generic\Backend',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Persistence_BackendInterface' => '\TYPO3\CMS\Extbase\Persistence\Generic\BackendInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Persistence_Exception' => '\TYPO3\CMS\Extbase\Persistence\Generic\Exception',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Persistence_Exception_CleanStateNotMemorized' => '\TYPO3\CMS\Extbase\Persistence\Generic\Exception\CleanStateNotMemorizedException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Persistence_Exception_IllegalObjectType' => '\TYPO3\CMS\Extbase\Persistence\Exception\IllegalObjectTypeException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Persistence_Exception_InvalidClass' => '\TYPO3\CMS\Extbase\Persistence\Generic\Exception\InvalidClassException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Persistence_Exception_InvalidNumberOfConstraints' => '\TYPO3\CMS\Extbase\Persistence\Generic\Exception\InvalidNumberOfConstraintsException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Persistence_Exception_InvalidPropertyType' => '\TYPO3\CMS\Extbase\Persistence\Generic\Exception\InvalidPropertyTypeException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Persistence_Exception_MissingBackend' => '\TYPO3\CMS\Extbase\Persistence\Generic\Exception\MissingBackendException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Persistence_Exception_RepositoryException' => '\TYPO3\CMS\Extbase\Persistence\Generic\Exception\RepositoryException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Persistence_Exception_TooDirty' => '\TYPO3\CMS\Extbase\Persistence\Generic\Exception\TooDirtyException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Persistence_Exception_UnexpectedTypeException' => '\TYPO3\CMS\Extbase\Persistence\Generic\Exception\UnexpectedTypeException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Persistence_Exception_UnknownObject' => '\TYPO3\CMS\Extbase\Persistence\Exception\UnknownObjectException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Persistence_Exception_UnsupportedMethod' => '\TYPO3\CMS\Extbase\Persistence\Generic\Exception\UnsupportedMethodException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Persistence_Exception_UnsupportedOrder' => '\TYPO3\CMS\Extbase\Persistence\Generic\Exception\UnsupportedOrderException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Persistence_Exception_UnsupportedRelation' => '\TYPO3\CMS\Extbase\Persistence\Generic\Exception\UnsupportedRelationException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Persistence_Generic_Exception_InconsistentQuerySettings' => '\TYPO3\CMS\Extbase\Persistence\Generic\Exception\InconsistentQuerySettingsException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Persistence_IdentityMap' => '\TYPO3\CMS\Extbase\Persistence\Generic\IdentityMap',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Persistence_LazyLoadingProxy' => '\TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Persistence_LazyObjectStorage' => '\TYPO3\CMS\Extbase\Persistence\Generic\LazyObjectStorage',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Persistence_LoadingStrategyInterface' => '\TYPO3\CMS\Extbase\Persistence\Generic\LoadingStrategyInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Persistence_Mapper_ColumnMap' => '\TYPO3\CMS\Extbase\Persistence\Generic\Mapper\ColumnMap',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Persistence_Mapper_DataMap' => '\TYPO3\CMS\Extbase\Persistence\Generic\Mapper\DataMap',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Persistence_Mapper_DataMapFactory' => '\TYPO3\CMS\Extbase\Persistence\Generic\Mapper\DataMapFactory',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Persistence_Mapper_DataMapper' => '\TYPO3\CMS\Extbase\Persistence\Generic\Mapper\DataMapper',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Persistence_ObjectMonitoringInterface' => '\TYPO3\CMS\Extbase\Persistence\ObjectMonitoringInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Persistence_ObjectStorage' => '\TYPO3\CMS\Extbase\Persistence\ObjectStorage',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Persistence_Manager' => '\TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Persistence_PersistenceManagerInterface' => '\TYPO3\CMS\Extbase\Persistence\PersistenceManagerInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Persistence_ManagerInterface' => '\TYPO3\CMS\Extbase\Persistence\PersistenceManagerInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Persistence_PropertyType' => '\TYPO3\CMS\Extbase\Persistence\Generic\PropertyType',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Persistence_QOM_AndInterface' => '\TYPO3\CMS\Extbase\Persistence\Generic\Qom\AndInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Persistence_QOM_BindVariableValue' => '\TYPO3\CMS\Extbase\Persistence\Generic\Qom\BindVariableValue',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Persistence_QOM_BindVariableValueInterface' => '\TYPO3\CMS\Extbase\Persistence\Generic\Qom\BindVariableValueInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Persistence_QOM_Comparison' => '\TYPO3\CMS\Extbase\Persistence\Generic\Qom\Comparison',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Persistence_QOM_ComparisonInterface' => '\TYPO3\CMS\Extbase\Persistence\Generic\Qom\ComparisonInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Persistence_QOM_ConstraintInterface' => '\TYPO3\CMS\Extbase\Persistence\Generic\Qom\ConstraintInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Persistence_QOM_DynamicOperand' => '\TYPO3\CMS\Extbase\Persistence\Generic\Qom\DynamicOperand',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Persistence_QOM_DynamicOperandInterface' => '\TYPO3\CMS\Extbase\Persistence\Generic\Qom\DynamicOperandInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Persistence_QOM_EquiJoinCondition' => '\TYPO3\CMS\Extbase\Persistence\Generic\Qom\EquiJoinCondition',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Persistence_QOM_EquiJoinConditionInterface' => '\TYPO3\CMS\Extbase\Persistence\Generic\Qom\EquiJoinConditionInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Persistence_QOM_Join' => '\TYPO3\CMS\Extbase\Persistence\Generic\Qom\Join',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Persistence_QOM_JoinConditionInterface' => '\TYPO3\CMS\Extbase\Persistence\Generic\Qom\JoinConditionInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Persistence_QOM_JoinInterface' => '\TYPO3\CMS\Extbase\Persistence\Generic\Qom\JoinInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Persistence_QOM_LogicalAnd' => '\TYPO3\CMS\Extbase\Persistence\Generic\Qom\LogicalAnd',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Persistence_QOM_LogicalNot' => '\TYPO3\CMS\Extbase\Persistence\Generic\Qom\LogicalNot',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Persistence_QOM_LogicalOr' => '\TYPO3\CMS\Extbase\Persistence\Generic\Qom\LogicalOr',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Persistence_QOM_LowerCase' => '\TYPO3\CMS\Extbase\Persistence\Generic\Qom\LowerCase',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Persistence_QOM_LowerCaseInterface' => '\TYPO3\CMS\Extbase\Persistence\Generic\Qom\LowerCaseInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Persistence_QOM_NotInterface' => '\TYPO3\CMS\Extbase\Persistence\Generic\Qom\NotInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Persistence_QOM_Operand' => '\TYPO3\CMS\Extbase\Persistence\Generic\Qom\Operand',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Persistence_QOM_OperandInterface' => '\TYPO3\CMS\Extbase\Persistence\Generic\Qom\OperandInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Persistence_QOM_Ordering' => '\TYPO3\CMS\Extbase\Persistence\Generic\Qom\Ordering',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Persistence_QOM_OrderingInterface' => '\TYPO3\CMS\Extbase\Persistence\Generic\Qom\OrderingInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Persistence_QOM_OrInterface' => '\TYPO3\CMS\Extbase\Persistence\Generic\Qom\OrInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Persistence_QOM_PropertyValue' => '\TYPO3\CMS\Extbase\Persistence\Generic\Qom\PropertyValue',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Persistence_QOM_PropertyValueInterface' => '\TYPO3\CMS\Extbase\Persistence\Generic\Qom\PropertyValueInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Persistence_QOM_QueryObjectModelConstantsInterface' => '\TYPO3\CMS\Extbase\Persistence\Generic\Qom\QueryObjectModelConstantsInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Persistence_QOM_QueryObjectModelFactory' => '\TYPO3\CMS\Extbase\Persistence\Generic\Qom\QueryObjectModelFactory',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Persistence_QOM_QueryObjectModelFactoryInterface' => '\TYPO3\CMS\Extbase\Persistence\Generic\Qom\QueryObjectModelFactoryInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Persistence_QOM_Selector' => '\TYPO3\CMS\Extbase\Persistence\Generic\Qom\Selector',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Persistence_QOM_SelectorInterface' => '\TYPO3\CMS\Extbase\Persistence\Generic\Qom\SelectorInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Persistence_QOM_SourceInterface' => '\TYPO3\CMS\Extbase\Persistence\Generic\Qom\SourceInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Persistence_QOM_Statement' => '\TYPO3\CMS\Extbase\Persistence\Generic\Qom\Statement',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Persistence_QOM_StaticOperand' => '\TYPO3\CMS\Extbase\Persistence\Generic\Qom\StaticOperand',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Persistence_QOM_StaticOperandInterface' => '\TYPO3\CMS\Extbase\Persistence\Generic\Qom\StaticOperandInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Persistence_QOM_UpperCase' => '\TYPO3\CMS\Extbase\Persistence\Generic\Qom\UpperCase',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Persistence_QOM_UpperCaseInterface' => '\TYPO3\CMS\Extbase\Persistence\Generic\Qom\UpperCaseInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Persistence_Query' => '\TYPO3\CMS\Extbase\Persistence\Generic\Query',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Persistence_QueryFactory' => '\TYPO3\CMS\Extbase\Persistence\Generic\QueryFactory',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Persistence_QueryFactoryInterface' => '\TYPO3\CMS\Extbase\Persistence\Generic\QueryFactoryInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Persistence_QueryInterface' => '\TYPO3\CMS\Extbase\Persistence\QueryInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Persistence_QueryResult' => '\TYPO3\CMS\Extbase\Persistence\Generic\QueryResult',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Persistence_QueryResultInterface' => '\TYPO3\CMS\Extbase\Persistence\QueryResultInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Persistence_QuerySettingsInterface' => '\TYPO3\CMS\Extbase\Persistence\Generic\QuerySettingsInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Persistence_Repository' => '\TYPO3\CMS\Extbase\Persistence\Repository',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Persistence_RepositoryInterface' => '\TYPO3\CMS\Extbase\Persistence\RepositoryInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Persistence_Session' => '\TYPO3\CMS\Extbase\Persistence\Generic\Session',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Persistence_Storage_BackendInterface' => '\TYPO3\CMS\Extbase\Persistence\Generic\Storage\BackendInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Persistence_Storage_Exception_BadConstraint' => '\TYPO3\CMS\Extbase\Persistence\Generic\Storage\Exception\BadConstraintException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Persistence_Storage_Exception_SqlError' => '\TYPO3\CMS\Extbase\Persistence\Generic\Storage\Exception\SqlErrorException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Persistence_Storage_Typo3DbBackend' => '\TYPO3\CMS\Extbase\Persistence\Generic\Storage\Typo3DbBackend',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Persistence_Typo3QuerySettings' => '\TYPO3\CMS\Extbase\Persistence\Generic\Typo3QuerySettings',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Property_Exception' => '\TYPO3\CMS\Extbase\Property\Exception',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Property_Exception_DuplicateObjectException' => '\TYPO3\CMS\Extbase\Property\Exception\DuplicateObjectException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Property_Exception_DuplicateTypeConverterException' => '\TYPO3\CMS\Extbase\Property\Exception\DuplicateTypeConverterException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Property_Exception_FormatNotSupportedException' => '\TYPO3\CMS\Extbase\Property\Exception\FormatNotSupportedException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Property_Exception_InvalidDataTypeException' => '\TYPO3\CMS\Extbase\Property\Exception\InvalidDataTypeException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Property_Exception_InvalidFormatException' => '\TYPO3\CMS\Extbase\Property\Exception\InvalidFormatException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Property_Exception_InvalidPropertyException' => '\TYPO3\CMS\Extbase\Property\Exception\InvalidPropertyException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Property_Exception_InvalidPropertyMappingConfigurationException' => '\TYPO3\CMS\Extbase\Property\Exception\InvalidPropertyMappingConfigurationException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Property_Exception_InvalidSource' => '\TYPO3\CMS\Extbase\Property\Exception\InvalidSourceException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Property_Exception_InvalidSourceException' => '\TYPO3\CMS\Extbase\Property\Exception\InvalidSourceException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Property_Exception_InvalidTarget' => '\TYPO3\CMS\Extbase\Property\Exception\InvalidTargetException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Property_Exception_InvalidTargetException' => '\TYPO3\CMS\Extbase\Property\Exception\InvalidTargetException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Property_Exception_TargetNotFoundException' => '\TYPO3\CMS\Extbase\Property\Exception\TargetNotFoundException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Property_Exception_TypeConverterException' => '\TYPO3\CMS\Extbase\Property\Exception\TypeConverterException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Property_Mapper' => '\TYPO3\CMS\Extbase\Property\Mapper',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Property_MappingResults' => '\TYPO3\CMS\Extbase\Property\MappingResults',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Property_PropertyMapper' => '\TYPO3\CMS\Extbase\Property\PropertyMapper',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Property_PropertyMappingConfiguration' => '\TYPO3\CMS\Extbase\Property\PropertyMappingConfiguration',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Property_PropertyMappingConfigurationBuilder' => '\TYPO3\CMS\Extbase\Property\PropertyMappingConfigurationBuilder',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Property_PropertyMappingConfigurationInterface' => '\TYPO3\CMS\Extbase\Property\PropertyMappingConfigurationInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Property_TypeConverter_AbstractFileCollectionConverter' => '\TYPO3\CMS\Extbase\Property\TypeConverter\AbstractFileCollectionConverter',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Property_TypeConverter_AbstractFileFolderConverter' => '\TYPO3\CMS\Extbase\Property\TypeConverter\AbstractFileFolderConverter',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Property_TypeConverter_AbstractTypeConverter' => '\TYPO3\CMS\Extbase\Property\TypeConverter\AbstractTypeConverter',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Property_TypeConverter_ArrayConverter' => '\TYPO3\CMS\Extbase\Property\TypeConverter\ArrayConverter',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Property_TypeConverter_BooleanConverter' => '\TYPO3\CMS\Extbase\Property\TypeConverter\BooleanConverter',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Property_TypeConverter_DateTimeConverter' => '\TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Property_TypeConverter_FileConverter' => '\TYPO3\CMS\Extbase\Property\TypeConverter\FileConverter',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Property_TypeConverter_FileReferenceConverter' => '\TYPO3\CMS\Extbase\Property\TypeConverter\FileReferenceConverter',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Property_TypeConverter_FloatConverter' => '\TYPO3\CMS\Extbase\Property\TypeConverter\FloatConverter',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Property_TypeConverter_FolderBasedFileCollectionConverter' => '\TYPO3\CMS\Extbase\Property\TypeConverter\FolderBasedFileCollectionConverter',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Property_TypeConverter_FolderConverter' => '\TYPO3\CMS\Extbase\Property\TypeConverter\FolderConverter',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Property_TypeConverter_IntegerConverter' => '\TYPO3\CMS\Extbase\Property\TypeConverter\IntegerConverter',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Property_TypeConverter_ObjectStorageConverter' => '\TYPO3\CMS\Extbase\Property\TypeConverter\ObjectStorageConverter',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Property_TypeConverter_PersistentObjectConverter' => '\TYPO3\CMS\Extbase\Property\TypeConverter\PersistentObjectConverter',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Property_TypeConverter_StaticFileCollectionConverter' => '\TYPO3\CMS\Extbase\Property\TypeConverter\StaticFileCollectionConverter',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Property_TypeConverter_StringConverter' => '\TYPO3\CMS\Extbase\Property\TypeConverter\StringConverter',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Property_TypeConverterInterface' => '\TYPO3\CMS\Extbase\Property\TypeConverterInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Reflection_ClassReflection' => '\TYPO3\CMS\Extbase\Reflection\ClassReflection',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Reflection_ClassSchema' => '\TYPO3\CMS\Extbase\Reflection\ClassSchema',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Reflection_DocCommentParser' => '\TYPO3\CMS\Extbase\Reflection\DocCommentParser',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Reflection_Exception' => '\TYPO3\CMS\Extbase\Reflection\Exception',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Reflection_Exception_InvalidPropertyType' => '\TYPO3\CMS\Extbase\Reflection\Exception\InvalidPropertyTypeException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Reflection_Exception_PropertyNotAccessibleException' => '\TYPO3\CMS\Extbase\Reflection\Exception\PropertyNotAccessibleException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Reflection_Exception_UnknownClass' => '\TYPO3\CMS\Extbase\Reflection\Exception\UnknownClassException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Reflection_MethodReflection' => '\TYPO3\CMS\Extbase\Reflection\MethodReflection',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Reflection_ObjectAccess' => '\TYPO3\CMS\Extbase\Reflection\ObjectAccess',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Reflection_ParameterReflection' => '\TYPO3\CMS\Extbase\Reflection\ParameterReflection',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Reflection_PropertyReflection' => '\TYPO3\CMS\Extbase\Reflection\PropertyReflection',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Reflection_Service' => '\TYPO3\CMS\Extbase\Reflection\ReflectionService',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Scheduler_FieldProvider' => '\TYPO3\CMS\Extbase\Scheduler\FieldProvider',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Scheduler_Task' => '\TYPO3\CMS\Extbase\Scheduler\Task',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Scheduler_TaskExecutor' => '\TYPO3\CMS\Extbase\Scheduler\TaskExecutor',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Security_Channel_RequestHashService' => '\TYPO3\CMS\Extbase\Security\Channel\RequestHashService',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Security_Cryptography_HashService' => '\TYPO3\CMS\Extbase\Security\Cryptography\HashService',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Security_Exception' => '\TYPO3\CMS\Extbase\Security\Exception',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Security_Exception_InvalidArgumentForHashGeneration' => '\TYPO3\CMS\Extbase\Security\Exception\InvalidArgumentForHashGenerationException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Security_Exception_InvalidArgumentForRequestHashGeneration' => '\TYPO3\CMS\Extbase\Security\Exception\InvalidArgumentForRequestHashGenerationException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Security_Exception_InvalidHash' => '\TYPO3\CMS\Extbase\Security\Exception\InvalidHashException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Security_Exception_SyntacticallyWrongRequestHash' => '\TYPO3\CMS\Extbase\Security\Exception\SyntacticallyWrongRequestHashException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Service_CacheService' => '\TYPO3\CMS\Extbase\Service\CacheService',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Service_ExtensionService' => '\TYPO3\CMS\Extbase\Service\ExtensionService',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Service_FlexFormService' => '\TYPO3\CMS\Extbase\Service\FlexFormService',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Service_TypeHandlingService' => '\TYPO3\CMS\Extbase\Service\TypeHandlingService',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Service_TypoScriptService' => '\TYPO3\CMS\Extbase\Service\TypoScriptService',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_SignalSlot_Dispatcher' => '\TYPO3\CMS\Extbase\SignalSlot\Dispatcher',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_SignalSlot_Exception_InvalidSlotException' => '\TYPO3\CMS\Extbase\SignalSlot\Exception\InvalidSlotException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Tests_Unit_BaseTestCase' => '\TYPO3\CMS\Core\Tests\UnitTestCase',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Utility_Arrays' => '\TYPO3\CMS\Extbase\Utility\ArrayUtility',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Utility_Debugger' => '\TYPO3\CMS\Extbase\Utility\DebuggerUtility',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Utility_ExtbaseRequirementsCheck' => '\TYPO3\CMS\Extbase\Utility\ExtbaseRequirementsCheckUtility',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Utility_Extension' => '\TYPO3\CMS\Extbase\Utility\ExtensionUtility',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Utility_FrontendSimulator' => '\TYPO3\CMS\Extbase\Utility\FrontendSimulatorUtility',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Utility_Localization' => '\TYPO3\CMS\Extbase\Utility\LocalizationUtility',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Validation_Error' => '\TYPO3\CMS\Extbase\Validation\Error',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Validation_Exception' => '\TYPO3\CMS\Extbase\Validation\Exception',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Validation_Exception_InvalidSubject' => '\TYPO3\CMS\Extbase\Validation\Exception\InvalidSubjectException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Validation_Exception_InvalidValidationConfiguration' => '\TYPO3\CMS\Extbase\Validation\Exception\InvalidValidationConfigurationException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Validation_Exception_InvalidValidationOptions' => '\TYPO3\CMS\Extbase\Validation\Exception\InvalidValidationOptionsException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Validation_Exception_NoSuchValidator' => '\TYPO3\CMS\Extbase\Validation\Exception\NoSuchValidatorException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Validation_Exception_NoValidatorFound' => '\TYPO3\CMS\Extbase\Validation\Exception\NoValidatorFoundException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Validation_PropertyError' => '\TYPO3\CMS\Extbase\Validation\PropertyError',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Validation_Validator_AbstractCompositeValidator' => '\TYPO3\CMS\Extbase\Validation\Validator\AbstractCompositeValidator',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Validation_Validator_AbstractObjectValidator' => '\TYPO3\CMS\Extbase\Validation\Validator\AbstractObjectValidator',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Validation_Validator_AbstractValidator' => '\TYPO3\CMS\Extbase\Validation\Validator\AbstractValidator',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Validation_Validator_AlphanumericValidator' => '\TYPO3\CMS\Extbase\Validation\Validator\AlphanumericValidator',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Validation_Validator_ConjunctionValidator' => '\TYPO3\CMS\Extbase\Validation\Validator\ConjunctionValidator',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Validation_Validator_DateTimeValidator' => '\TYPO3\CMS\Extbase\Validation\Validator\DateTimeValidator',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Validation_Validator_DisjunctionValidator' => '\TYPO3\CMS\Extbase\Validation\Validator\DisjunctionValidator',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Validation_Validator_EmailAddressValidator' => '\TYPO3\CMS\Extbase\Validation\Validator\EmailAddressValidator',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Validation_Validator_FloatValidator' => '\TYPO3\CMS\Extbase\Validation\Validator\FloatValidator',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Validation_Validator_GenericObjectValidator' => '\TYPO3\CMS\Extbase\Validation\Validator\GenericObjectValidator',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Validation_Validator_IntegerValidator' => '\TYPO3\CMS\Extbase\Validation\Validator\IntegerValidator',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Validation_Validator_NotEmptyValidator' => '\TYPO3\CMS\Extbase\Validation\Validator\NotEmptyValidator',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Validation_Validator_NumberRangeValidator' => '\TYPO3\CMS\Extbase\Validation\Validator\NumberRangeValidator',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Validation_Validator_NumberValidator' => '\TYPO3\CMS\Extbase\Validation\Validator\NumberValidator',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Validation_Validator_ObjectValidatorInterface' => '\TYPO3\CMS\Extbase\Validation\Validator\ObjectValidatorInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Validation_Validator_RawValidator' => '\TYPO3\CMS\Extbase\Validation\Validator\RawValidator',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Validation_Validator_RegularExpressionValidator' => '\TYPO3\CMS\Extbase\Validation\Validator\RegularExpressionValidator',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Validation_Validator_StringLengthValidator' => '\TYPO3\CMS\Extbase\Validation\Validator\StringLengthValidator',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Validation_Validator_StringValidator' => '\TYPO3\CMS\Extbase\Validation\Validator\StringValidator',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Validation_Validator_TextValidator' => '\TYPO3\CMS\Extbase\Validation\Validator\TextValidator',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Validation_Validator_ValidatorInterface' => '\TYPO3\CMS\Extbase\Validation\Validator\ValidatorInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Extbase_Validation_ValidatorResolver' => '\TYPO3\CMS\Extbase\Validation\ValidatorResolver',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_em_Tasks_UpdateExtensionList' => '\TYPO3\CMS\Extensionmanager\Task\UpdateExtensionListTask',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_extrapagecmoptions' => '\TYPO3\CMS\ExtraPageCmOptions\ExtraPageContextMenuOptions',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_feedit_editpanel' => '\TYPO3\CMS\Feedit\FrontendEditPanel',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_felogin_pi1' => '\TYPO3\CMS\Felogin\Controller\FrontendLoginController',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'SC_file_list' => '\TYPO3\CMS\Filelist\Controller\FileListController',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'fileList' => '\TYPO3\CMS\Filelist\FileList',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'fileList_editIconHook' => '\TYPO3\CMS\Filelist\FileListEditIconHookInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'filelistFolderTree' => '\TYPO3\CMS\Filelist\FileListFolderTree',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_Compatibility_DocbookGeneratorService' => '\TYPO3\CMS\Fluid\Compatibility\DocbookGeneratorService',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_Compatibility_TemplateParserBuilder' => '\TYPO3\CMS\Fluid\Compatibility\TemplateParserBuilder',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_Core_Compiler_AbstractCompiledTemplate' => '\TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_Core_Compiler_TemplateCompiler' => '\TYPO3\CMS\Fluid\Core\Compiler\TemplateCompiler',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_Core_Exception' => '\TYPO3\CMS\Fluid\Core\Exception',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_Core_Parser_Configuration' => '\TYPO3\CMS\Fluid\Core\Parser\Configuration',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_Core_Parser_Exception' => '\TYPO3\CMS\Fluid\Core\Parser\Exception',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_Core_Parser_Interceptor_Escape' => '\TYPO3\CMS\Fluid\Core\Parser\Interceptor\Escape',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_Core_Parser_InterceptorInterface' => '\TYPO3\CMS\Fluid\Core\Parser\InterceptorInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_Core_Parser_ParsedTemplateInterface' => '\TYPO3\CMS\Fluid\Core\Parser\ParsedTemplateInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_Core_Parser_ParsingState' => '\TYPO3\CMS\Fluid\Core\Parser\ParsingState',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_Core_Parser_SyntaxTree_AbstractNode' => '\TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\AbstractNode',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_Core_Parser_SyntaxTree_ArrayNode' => '\TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ArrayNode',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_Core_Parser_SyntaxTree_BooleanNode' => '\TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_Core_Parser_SyntaxTree_NodeInterface' => '\TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\NodeInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_Core_Parser_SyntaxTree_ObjectAccessorNode' => '\TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_Core_Parser_SyntaxTree_RenderingContextAwareInterface' => '\TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\RenderingContextAwareInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_Core_Parser_SyntaxTree_RootNode' => '\TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\RootNode',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_Core_Parser_SyntaxTree_TextNode' => '\TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\TextNode',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_Core_Parser_SyntaxTree_ViewHelperNode' => '\TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ViewHelperNode',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_Core_Parser_TemplateParser' => '\TYPO3\CMS\Fluid\Core\Parser\TemplateParser',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_Core_Rendering_RenderingContext' => '\TYPO3\CMS\Fluid\Core\Rendering\RenderingContext',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_Core_Rendering_RenderingContextInterface' => '\TYPO3\CMS\Fluid\Core\Rendering\RenderingContextInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_Core_ViewHelper_AbstractConditionViewHelper' => '\TYPO3\CMS\Fluid\Core\ViewHelper\AbstractConditionViewHelper',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_Core_ViewHelper_AbstractTagBasedViewHelper' => '\TYPO3\CMS\Fluid\Core\ViewHelper\AbstractTagBasedViewHelper',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_Core_ViewHelper_AbstractViewHelper' => '\TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_Core_ViewHelper_ArgumentDefinition' => '\TYPO3\CMS\Fluid\Core\ViewHelper\ArgumentDefinition',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_Core_ViewHelper_Arguments' => '\TYPO3\CMS\Fluid\Core\ViewHelper\Arguments',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_Core_ViewHelper_Exception' => '\TYPO3\CMS\Fluid\Core\ViewHelper\Exception',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_Core_ViewHelper_Exception_InvalidVariableException' => '\TYPO3\CMS\Fluid\Core\ViewHelper\Exception\InvalidVariableException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_Core_ViewHelper_Exception_RenderingContextNotAccessibleException' => '\TYPO3\CMS\Fluid\Core\ViewHelper\Exception\RenderingContextNotAccessibleException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_Core_ViewHelper_Facets_ChildNodeAccessInterface' => '\TYPO3\CMS\Fluid\Core\ViewHelper\Facets\ChildNodeAccessInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_Core_ViewHelper_Facets_CompilableInterface' => '\TYPO3\CMS\Fluid\Core\ViewHelper\Facets\CompilableInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_Core_ViewHelper_Facets_PostParseInterface' => '\TYPO3\CMS\Fluid\Core\ViewHelper\Facets\PostParseInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_Core_ViewHelper_TagBuilder' => '\TYPO3\CMS\Fluid\Core\ViewHelper\TagBuilder',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_Core_ViewHelper_TemplateVariableContainer' => '\TYPO3\CMS\Fluid\Core\ViewHelper\TemplateVariableContainer',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_Core_ViewHelper_ViewHelperInterface' => '\TYPO3\CMS\Fluid\Core\ViewHelper\ViewHelperInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_Core_ViewHelper_ViewHelperVariableContainer' => '\TYPO3\CMS\Fluid\Core\ViewHelper\ViewHelperVariableContainer',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_Core_Widget_AbstractWidgetController' => '\TYPO3\CMS\Fluid\Core\Widget\AbstractWidgetController',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_Core_Widget_AbstractWidgetViewHelper' => '\TYPO3\CMS\Fluid\Core\Widget\AbstractWidgetViewHelper',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_Core_Widget_AjaxWidgetContextHolder' => '\TYPO3\CMS\Fluid\Core\Widget\AjaxWidgetContextHolder',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_Core_Widget_Bootstrap' => '\TYPO3\CMS\Fluid\Core\Widget\Bootstrap',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_Core_Widget_Exception' => '\TYPO3\CMS\Fluid\Core\Widget\Exception',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_Core_Widget_Exception_MissingControllerException' => '\TYPO3\CMS\Fluid\Core\Widget\Exception\MissingControllerException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_Core_Widget_Exception_RenderingContextNotFoundException' => '\TYPO3\CMS\Fluid\Core\Widget\Exception\RenderingContextNotFoundException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_Core_Widget_Exception_WidgetContextNotFoundException' => '\TYPO3\CMS\Fluid\Core\Widget\Exception\WidgetContextNotFoundException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_Core_Widget_Exception_WidgetRequestNotFoundException' => '\TYPO3\CMS\Fluid\Core\Widget\Exception\WidgetRequestNotFoundException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_Core_Widget_WidgetContext' => '\TYPO3\CMS\Fluid\Core\Widget\WidgetContext',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_Core_Widget_WidgetRequest' => '\TYPO3\CMS\Fluid\Core\Widget\WidgetRequest',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_Core_Widget_WidgetRequestBuilder' => '\TYPO3\CMS\Fluid\Core\Widget\WidgetRequestBuilder',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_Core_Widget_WidgetRequestHandler' => '\TYPO3\CMS\Fluid\Core\Widget\WidgetRequestHandler',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_Exception' => '\TYPO3\CMS\Fluid\Exception',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_Fluid' => '\TYPO3\CMS\Fluid\Fluid',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_Service_DocbookGenerator' => '\TYPO3\CMS\Fluid\Service\DocbookGenerator',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_View_AbstractTemplateView' => '\TYPO3\CMS\Fluid\View\AbstractTemplateView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_View_Exception' => '\TYPO3\CMS\Fluid\View\Exception',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_View_Exception_InvalidSectionException' => '\TYPO3\CMS\Fluid\View\Exception\InvalidSectionException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_View_Exception_InvalidTemplateResourceException' => '\TYPO3\CMS\Fluid\View\Exception\InvalidTemplateResourceException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_View_StandaloneView' => '\TYPO3\CMS\Fluid\View\StandaloneView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_View_TemplateView' => '\TYPO3\CMS\Fluid\View\TemplateView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_ViewHelpers_AliasViewHelper' => '\TYPO3\CMS\Fluid\ViewHelpers\AliasViewHelper',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_ViewHelpers_BaseViewHelper' => '\TYPO3\CMS\Fluid\ViewHelpers\BaseViewHelper',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_ViewHelpers_Be_AbstractBackendViewHelper' => '\TYPO3\CMS\Fluid\ViewHelpers\Be\AbstractBackendViewHelper',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_ViewHelpers_Be_Buttons_CshViewHelper' => '\TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\CshViewHelper',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_ViewHelpers_Be_Buttons_IconViewHelper' => '\TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\IconViewHelper',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_ViewHelpers_Be_Buttons_ShortcutViewHelper' => '\TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\ShortcutViewHelper',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_ViewHelpers_Be_ContainerViewHelper' => '\TYPO3\CMS\Fluid\ViewHelpers\Be\ContainerViewHelper',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_ViewHelpers_Be_Menus_ActionMenuItemViewHelper' => '\TYPO3\CMS\Fluid\ViewHelpers\Be\Menus\ActionMenuItemViewHelper',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_ViewHelpers_Be_Menus_ActionMenuViewHelper' => '\TYPO3\CMS\Fluid\ViewHelpers\Be\Menus\ActionMenuViewHelper',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_ViewHelpers_Be_PageInfoViewHelper' => '\TYPO3\CMS\Fluid\ViewHelpers\Be\PageInfoViewHelper',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_ViewHelpers_Be_PagePathViewHelper' => '\TYPO3\CMS\Fluid\ViewHelpers\Be\PagePathViewHelper',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_ViewHelpers_Be_Security_IfAuthenticatedViewHelper' => '\TYPO3\CMS\Fluid\ViewHelpers\Be\Security\IfAuthenticatedViewHelper',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_ViewHelpers_Be_Security_IfHasRoleViewHelper' => '\TYPO3\CMS\Fluid\ViewHelpers\Be\Security\IfHasRoleViewHelper',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_ViewHelpers_Be_TableListViewHelper' => '\TYPO3\CMS\Fluid\ViewHelpers\Be\TableListViewHelper',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_ViewHelpers_CObjectViewHelper' => '\TYPO3\CMS\Fluid\ViewHelpers\CObjectViewHelper',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_ViewHelpers_CommentViewHelper' => '\TYPO3\CMS\Fluid\ViewHelpers\CommentViewHelper',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_ViewHelpers_CountViewHelper' => '\TYPO3\CMS\Fluid\ViewHelpers\CountViewHelper',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_ViewHelpers_CycleViewHelper' => '\TYPO3\CMS\Fluid\ViewHelpers\CycleViewHelper',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_ViewHelpers_DebugViewHelper' => '\TYPO3\CMS\Fluid\ViewHelpers\DebugViewHelper',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_ViewHelpers_ElseViewHelper' => '\TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_ViewHelpers_FlashMessagesViewHelper' => '\TYPO3\CMS\Fluid\ViewHelpers\FlashMessagesViewHelper',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_ViewHelpers_Form_AbstractFormFieldViewHelper' => '\TYPO3\CMS\Fluid\ViewHelpers\Form\AbstractFormFieldViewHelper',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_ViewHelpers_Form_AbstractFormViewHelper' => '\TYPO3\CMS\Fluid\ViewHelpers\Form\AbstractFormViewHelper',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_ViewHelpers_Form_CheckboxViewHelper' => '\TYPO3\CMS\Fluid\ViewHelpers\Form\CheckboxViewHelper',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_ViewHelpers_Form_ErrorsViewHelper' => '\TYPO3\CMS\Fluid\ViewHelpers\Form\ErrorsViewHelper',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_ViewHelpers_Form_HiddenViewHelper' => '\TYPO3\CMS\Fluid\ViewHelpers\Form\HiddenViewHelper',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_ViewHelpers_Form_PasswordViewHelper' => '\TYPO3\CMS\Fluid\ViewHelpers\Form\PasswordViewHelper',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_ViewHelpers_Form_RadioViewHelper' => '\TYPO3\CMS\Fluid\ViewHelpers\Form\RadioViewHelper',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_ViewHelpers_Form_SelectViewHelper' => '\TYPO3\CMS\Fluid\ViewHelpers\Form\SelectViewHelper',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_ViewHelpers_Form_SubmitViewHelper' => '\TYPO3\CMS\Fluid\ViewHelpers\Form\SubmitViewHelper',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_ViewHelpers_Form_TextareaViewHelper' => '\TYPO3\CMS\Fluid\ViewHelpers\Form\TextareaViewHelper',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_ViewHelpers_Form_TextfieldViewHelper' => '\TYPO3\CMS\Fluid\ViewHelpers\Form\TextfieldViewHelper',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_ViewHelpers_Form_UploadViewHelper' => '\TYPO3\CMS\Fluid\ViewHelpers\Form\UploadViewHelper',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_ViewHelpers_Form_ValidationResultsViewHelper' => '\TYPO3\CMS\Fluid\ViewHelpers\Form\ValidationResultsViewHelper',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_ViewHelpers_Format_AbstractEncodingViewHelper' => '\TYPO3\CMS\Fluid\ViewHelpers\Format\AbstractEncodingViewHelper',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_ViewHelpers_Format_CdataViewHelper' => '\TYPO3\CMS\Fluid\ViewHelpers\Format\CdataViewHelper',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_ViewHelpers_Format_CropViewHelper' => '\TYPO3\CMS\Fluid\ViewHelpers\Format\CropViewHelper',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_ViewHelpers_Format_CurrencyViewHelper' => '\TYPO3\CMS\Fluid\ViewHelpers\Format\CurrencyViewHelper',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_ViewHelpers_Format_DateViewHelper' => '\TYPO3\CMS\Fluid\ViewHelpers\Format\DateViewHelper',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_ViewHelpers_Format_HtmlentitiesDecodeViewHelper' => '\TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlentitiesDecodeViewHelper',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_ViewHelpers_Format_HtmlentitiesViewHelper' => '\TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlentitiesViewHelper',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_ViewHelpers_Format_HtmlspecialcharsViewHelper' => '\TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_ViewHelpers_Format_HtmlViewHelper' => '\TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlViewHelper',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_ViewHelpers_Format_Nl2brViewHelper' => '\TYPO3\CMS\Fluid\ViewHelpers\Format\Nl2brViewHelper',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_ViewHelpers_Format_NumberViewHelper' => '\TYPO3\CMS\Fluid\ViewHelpers\Format\NumberViewHelper',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_ViewHelpers_Format_PaddingViewHelper' => '\TYPO3\CMS\Fluid\ViewHelpers\Format\PaddingViewHelper',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_ViewHelpers_Format_PrintfViewHelper' => '\TYPO3\CMS\Fluid\ViewHelpers\Format\PrintfViewHelper',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_ViewHelpers_Format_RawViewHelper' => '\TYPO3\CMS\Fluid\ViewHelpers\Format\RawViewHelper',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_ViewHelpers_Format_StripTagsViewHelper' => '\TYPO3\CMS\Fluid\ViewHelpers\Format\StripTagsViewHelper',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_ViewHelpers_Format_UrlencodeViewHelper' => '\TYPO3\CMS\Fluid\ViewHelpers\Format\UrlencodeViewHelper',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_ViewHelpers_FormViewHelper' => '\TYPO3\CMS\Fluid\ViewHelpers\FormViewHelper',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_ViewHelpers_ForViewHelper' => '\TYPO3\CMS\Fluid\ViewHelpers\ForViewHelper',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_ViewHelpers_GroupedForViewHelper' => '\TYPO3\CMS\Fluid\ViewHelpers\GroupedForViewHelper',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_ViewHelpers_IfViewHelper' => '\TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_ViewHelpers_ImageViewHelper' => '\TYPO3\CMS\Fluid\ViewHelpers\ImageViewHelper',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_ViewHelpers_LayoutViewHelper' => '\TYPO3\CMS\Fluid\ViewHelpers\LayoutViewHelper',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_ViewHelpers_Link_ActionViewHelper' => '\TYPO3\CMS\Fluid\ViewHelpers\Link\ActionViewHelper',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_ViewHelpers_Link_EmailViewHelper' => '\TYPO3\CMS\Fluid\ViewHelpers\Link\EmailViewHelper',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_ViewHelpers_Link_ExternalViewHelper' => '\TYPO3\CMS\Fluid\ViewHelpers\Link\ExternalViewHelper',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_ViewHelpers_Link_PageViewHelper' => '\TYPO3\CMS\Fluid\ViewHelpers\Link\PageViewHelper',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_ViewHelpers_RenderChildrenViewHelper' => '\TYPO3\CMS\Fluid\ViewHelpers\RenderChildrenViewHelper',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_ViewHelpers_RenderViewHelper' => '\TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_ViewHelpers_SectionViewHelper' => '\TYPO3\CMS\Fluid\ViewHelpers\SectionViewHelper',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_ViewHelpers_Security_IfAuthenticatedViewHelper' => '\TYPO3\CMS\Fluid\ViewHelpers\Security\IfAuthenticatedViewHelper',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_ViewHelpers_Security_IfHasRoleViewHelper' => '\TYPO3\CMS\Fluid\ViewHelpers\Security\IfHasRoleViewHelper',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_ViewHelpers_ThenViewHelper' => '\TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_ViewHelpers_TranslateViewHelper' => '\TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_ViewHelpers_Uri_ActionViewHelper' => '\TYPO3\CMS\Fluid\ViewHelpers\Uri\ActionViewHelper',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_ViewHelpers_Uri_EmailViewHelper' => '\TYPO3\CMS\Fluid\ViewHelpers\Uri\EmailViewHelper',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_ViewHelpers_Uri_ExternalViewHelper' => '\TYPO3\CMS\Fluid\ViewHelpers\Uri\ExternalViewHelper',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_ViewHelpers_Uri_ImageViewHelper' => '\TYPO3\CMS\Fluid\ViewHelpers\Uri\ImageViewHelper',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_ViewHelpers_Uri_PageViewHelper' => '\TYPO3\CMS\Fluid\ViewHelpers\Uri\PageViewHelper',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_ViewHelpers_Uri_ResourceViewHelper' => '\TYPO3\CMS\Fluid\ViewHelpers\Uri\ResourceViewHelper',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_ViewHelpers_Widget_AutocompleteViewHelper' => '\TYPO3\CMS\Fluid\ViewHelpers\Widget\AutocompleteViewHelper',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_ViewHelpers_Widget_Controller_AutocompleteController' => '\TYPO3\CMS\Fluid\ViewHelpers\Widget\Controller\AutocompleteController',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_ViewHelpers_Widget_Controller_PaginateController' => '\TYPO3\CMS\Fluid\ViewHelpers\Widget\Controller\PaginateController',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_ViewHelpers_Widget_LinkViewHelper' => '\TYPO3\CMS\Fluid\ViewHelpers\Widget\LinkViewHelper',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_ViewHelpers_Widget_PaginateViewHelper' => '\TYPO3\CMS\Fluid\ViewHelpers\Widget\PaginateViewHelper',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Fluid_ViewHelpers_Widget_UriViewHelper' => '\TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_Controller_Form' => '\TYPO3\CMS\Form\Controller\FormController',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_Controller_Wizard' => '\TYPO3\CMS\Form\Controller\WizardController',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_Domain_Factory_JsonToTyposcript' => '\TYPO3\CMS\Form\Domain\Factory\JsonToTypoScript',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_Domain_Factory_Typoscript' => '\TYPO3\CMS\Form\Domain\Factory\TypoScriptFactory',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_Domain_Model_Additional_Abstract' => '\TYPO3\CMS\Form\Domain\Model\Additional\AbstractAdditionalElement',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_Domain_Model_Additional_Additional' => '\TYPO3\CMS\Form\Domain\Model\Additional\AdditionalAdditionalElement',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_Domain_Model_Additional_Error' => '\TYPO3\CMS\Form\Domain\Model\Additional\ErrorAdditionalElement',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_Domain_Model_Additional_Label' => '\TYPO3\CMS\Form\Domain\Model\Additional\LabelAdditionalElement',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_Domain_Model_Additional_Legend' => '\TYPO3\CMS\Form\Domain\Model\Additional\LegendAdditionalElement',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_Domain_Model_Additional_Mandatory' => '\TYPO3\CMS\Form\Domain\Model\Additional\MandatoryAdditionalElement',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_Domain_Model_Attributes_Abstract' => '\TYPO3\CMS\Form\Domain\Model\Attribute\AbstractAttribute',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_Domain_Model_Attributes_Accept' => '\TYPO3\CMS\Form\Domain\Model\Attribute\AcceptAttribute',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_Domain_Model_Attributes_Acceptcharset' => '\TYPO3\CMS\Form\Domain\Model\Attribute\AcceptCharsetAttribute',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_Domain_Model_Attributes_Accesskey' => '\TYPO3\CMS\Form\Domain\Model\Attribute\AccesskeyAttribute',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_Domain_Model_Attributes_Action' => '\TYPO3\CMS\Form\Domain\Model\Attribute\ActionAttribute',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_Domain_Model_Attributes_Alt' => '\TYPO3\CMS\Form\Domain\Model\Attribute\AltAttribute',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_Domain_Model_Attributes_Attributes' => '\TYPO3\CMS\Form\Domain\Model\Attribute\AttributesAttribute',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_Domain_Model_Attributes_Checked' => '\TYPO3\CMS\Form\Domain\Model\Attribute\CheckedAttribute',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_Domain_Model_Attributes_Class' => '\TYPO3\CMS\Form\Domain\Model\Attribute\ClassAttribute',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_Domain_Model_Attributes_Cols' => '\TYPO3\CMS\Form\Domain\Model\Attribute\ColsAttribute',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_Domain_Model_Attributes_Dir' => '\TYPO3\CMS\Form\Domain\Model\Attribute\DirAttribute',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_Domain_Model_Attributes_Disabled' => '\TYPO3\CMS\Form\Domain\Model\Attribute\DisabledAttribute',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_Domain_Model_Attributes_Enctype' => '\TYPO3\CMS\Form\Domain\Model\Attribute\EnctypeAttribute',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_Domain_Model_Attributes_Id' => '\TYPO3\CMS\Form\Domain\Model\Attribute\IdAttribute',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_Domain_Model_Attributes_Label' => '\TYPO3\CMS\Form\Domain\Model\Attribute\LabelAttribute',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_Domain_Model_Attributes_Lang' => '\TYPO3\CMS\Form\Domain\Model\Attribute\LangAttribute',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_Domain_Model_Attributes_Maxlength' => '\TYPO3\CMS\Form\Domain\Model\Attribute\MaxlengthAttribute',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_Domain_Model_Attributes_Method' => '\TYPO3\CMS\Form\Domain\Model\Attribute\MethodAttribute',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_Domain_Model_Attributes_Multiple' => '\TYPO3\CMS\Form\Domain\Model\Attribute\MultipleAttribute',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_Domain_Model_Attributes_Name' => '\TYPO3\CMS\Form\Domain\Model\Attribute\NameAttribute',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_Domain_Model_Attributes_Readonly' => '\TYPO3\CMS\Form\Domain\Model\Attribute\ReadonlyAttribute',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_Domain_Model_Attributes_Rows' => '\TYPO3\CMS\Form\Domain\Model\Attribute\RowsAttribute',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_Domain_Model_Attributes_Selected' => '\TYPO3\CMS\Form\Domain\Model\Attribute\SelectedAttribute',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_Domain_Model_Attributes_Size' => '\TYPO3\CMS\Form\Domain\Model\Attribute\SizeAttribute',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_Domain_Model_Attributes_Src' => '\TYPO3\CMS\Form\Domain\Model\Attribute\SrcAttribute',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_Domain_Model_Attributes_Style' => '\TYPO3\CMS\Form\Domain\Model\Attribute\StyleAttribute',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_Domain_Model_Attributes_Tabindex' => '\TYPO3\CMS\Form\Domain\Model\Attribute\TabindexAttribute',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_Domain_Model_Attributes_Title' => '\TYPO3\CMS\Form\Domain\Model\Attribute\TitleAttribute',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_Domain_Model_Attributes_Type' => '\TYPO3\CMS\Form\Domain\Model\Attribute\TypeAttribute',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_Domain_Model_Attributes_Value' => '\TYPO3\CMS\Form\Domain\Model\Attribute\ValueAttribute',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_Domain_Model_Content' => '\TYPO3\CMS\Form\Domain\Model\Content',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_Domain_Model_Element_Abstract' => '\TYPO3\CMS\Form\Domain\Model\Element\AbstractElement',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_Domain_Model_Element_AbstractPlain' => '\TYPO3\CMS\Form\Domain\Model\Element\AbstractPlainElement',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_Domain_Model_Element_Button' => '\TYPO3\CMS\Form\Domain\Model\Element\ButtonElement',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_Domain_Model_Element_Checkbox' => '\TYPO3\CMS\Form\Domain\Model\Element\CheckboxElement',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_Domain_Model_Element_Checkboxgroup' => '\TYPO3\CMS\Form\Domain\Model\Element\CheckboxGroupElement',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_Domain_Model_Element_Container' => '\TYPO3\CMS\Form\Domain\Model\Element\ContainerElement',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_Domain_Model_Element_Content' => '\TYPO3\CMS\Form\Domain\Model\Element\ContentElement',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_Domain_Model_Element_Fieldset' => '\TYPO3\CMS\Form\Domain\Model\Element\FieldsetElement',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_Domain_Model_Element_Fileupload' => '\TYPO3\CMS\Form\Domain\Model\Element\FileuploadElement',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_Domain_Model_Element_Header' => '\TYPO3\CMS\Form\Domain\Model\Element\HeaderElement',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_Domain_Model_Element_Hidden' => '\TYPO3\CMS\Form\Domain\Model\Element\HiddenElement',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_Domain_Model_Element_Imagebutton' => '\TYPO3\CMS\Form\Domain\Model\Element\ImagebuttonElement',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_Domain_Model_Element_Optgroup' => '\TYPO3\CMS\Form\Domain\Model\Element\OptgroupElement',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_Domain_Model_Element_Option' => '\TYPO3\CMS\Form\Domain\Model\Element\OptionElement',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_Domain_Model_Element_Password' => '\TYPO3\CMS\Form\Domain\Model\Element\PasswordElement',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_Domain_Model_Element_Radio' => '\TYPO3\CMS\Form\Domain\Model\Element\RadioElement',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_Domain_Model_Element_Radiogroup' => '\TYPO3\CMS\Form\Domain\Model\Element\RadioGroupElement',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_Domain_Model_Element_Reset' => '\TYPO3\CMS\Form\Domain\Model\Element\ResetElement',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_Domain_Model_Element_Select' => '\TYPO3\CMS\Form\Domain\Model\Element\SelectElement',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_Domain_Model_Element_Submit' => '\TYPO3\CMS\Form\Domain\Model\Element\SubmitElement',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_Domain_Model_Element_Textarea' => '\TYPO3\CMS\Form\Domain\Model\Element\TextareaElement',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_Domain_Model_Element_Textblock' => '\TYPO3\CMS\Form\Domain\Model\Element\TextblockElement',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_Domain_Model_Element_Textline' => '\TYPO3\CMS\Form\Domain\Model\Element\TextlineElement',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_Domain_Model_Form' => '\TYPO3\CMS\Form\Domain\Model\Form',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_Domain_Model_JSON_Element' => '\TYPO3\CMS\Form\Domain\Model\Json\AbstractJsonElement',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_Domain_Model_JSON_Button' => '\TYPO3\CMS\Form\Domain\Model\Json\ButtonJsonElement',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_Domain_Model_JSON_Checkboxgroup' => '\TYPO3\CMS\Form\Domain\Model\Json\CheckboxGroupJsonElement',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_Domain_Model_JSON_Checkbox' => '\TYPO3\CMS\Form\Domain\Model\Json\CheckboxJsonElement',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_Domain_Model_JSON_Container' => '\TYPO3\CMS\Form\Domain\Model\Json\ContainerJsonElement',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_Domain_Model_JSON_Fieldset' => '\TYPO3\CMS\Form\Domain\Model\Json\FieldsetJsonElement',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_Domain_Model_JSON_Fileupload' => '\TYPO3\CMS\Form\Domain\Model\Json\FileuploadJsonElement',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_Domain_Model_JSON_Form' => '\TYPO3\CMS\Form\Domain\Model\Json\FormJsonElement',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_Domain_Model_JSON_Header' => '\TYPO3\CMS\Form\Domain\Model\Json\HeaderJsonElement',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_Domain_Model_JSON_Hidden' => '\TYPO3\CMS\Form\Domain\Model\Json\HiddenJsonElement',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_Domain_Model_JSON_Name' => '\TYPO3\CMS\Form\Domain\Model\Json\NameJsonElement',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_Domain_Model_JSON_Password' => '\TYPO3\CMS\Form\Domain\Model\Json\PasswordJsonElement',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_Domain_Model_JSON_Radiogroup' => '\TYPO3\CMS\Form\Domain\Model\Json\RadioGroupJsonElement',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_Domain_Model_JSON_Radio' => '\TYPO3\CMS\Form\Domain\Model\Json\RadioJsonElement',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_Domain_Model_JSON_Reset' => '\TYPO3\CMS\Form\Domain\Model\Json\ResetJsonElement',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_Domain_Model_JSON_Select' => '\TYPO3\CMS\Form\Domain\Model\Json\SelectJsonElement',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_Domain_Model_JSON_Submit' => '\TYPO3\CMS\Form\Domain\Model\Json\SubmitJsonElement',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_Domain_Model_JSON_Textarea' => '\TYPO3\CMS\Form\Domain\Model\Json\TextareaJsonElement',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_Domain_Model_JSON_Textblock' => '\TYPO3\CMS\Form\Domain\Model\Json\TextblockJsonElement',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_Domain_Model_JSON_Textline' => '\TYPO3\CMS\Form\Domain\Model\Json\TextlineJsonElement',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_Domain_Repository_Content' => '\TYPO3\CMS\Form\Domain\Repository\ContentRepository',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_System_Elementcounter' => '\TYPO3\CMS\Form\ElementCounter',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_System_Filter_Alphabetic' => '\TYPO3\CMS\Form\Filter\AlphabeticFilter',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_System_Filter_Alphanumeric' => '\TYPO3\CMS\Form\Filter\AlphanumericFilter',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_System_Filter_Currency' => '\TYPO3\CMS\Form\Filter\CurrencyFilter',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_System_Filter_Digit' => '\TYPO3\CMS\Form\Filter\DigitFilter',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_System_Filter_Interface' => '\TYPO3\CMS\Form\Filter\FilterInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_System_Filter_Integer' => '\TYPO3\CMS\Form\Filter\IntegerFilter',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_System_Filter_Lowercase' => '\TYPO3\CMS\Form\Filter\LowerCaseFilter',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_System_Filter_Regexp' => '\TYPO3\CMS\Form\Filter\RegExpFilter',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_System_Filter_Removexss' => '\TYPO3\CMS\Form\Filter\RemoveXssFilter',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_System_Filter_Stripnewlines' => '\TYPO3\CMS\Form\Filter\StripNewLinesFilter',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_System_Filter_Titlecase' => '\TYPO3\CMS\Form\Filter\TitleCaseFilter',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_System_Filter_Trim' => '\TYPO3\CMS\Form\Filter\TrimFilter',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_System_Filter_Uppercase' => '\TYPO3\CMS\Form\Filter\UpperCaseFilter',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_System_Layout' => '\TYPO3\CMS\Form\Layout',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_System_Localization' => '\TYPO3\CMS\Form\Localization',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_System_Postprocessor_Mail' => '\TYPO3\CMS\Form\PostProcess\MailPostProcessor',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_System_Postprocessor' => '\TYPO3\CMS\Form\PostProcess\PostProcessor',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_System_Postprocessor_Interface' => '\TYPO3\CMS\Form\PostProcess\PostProcessorInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_System_Request' => '\TYPO3\CMS\Form\Request',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_System_Filter' => '\TYPO3\CMS\Form\Utility\FilterUtility',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_Common' => '\TYPO3\CMS\Form\Utility\FormUtility',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_Domain_Factory_TyposcriptToJson' => '\TYPO3\CMS\Form\Utility\TypoScriptToJsonConverter',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_System_Validate' => '\TYPO3\CMS\Form\Utility\ValidatorUtility',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_System_Validate_Abstract' => '\TYPO3\CMS\Form\Validation\AbstractValidator',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_System_Validate_Alphabetic' => '\TYPO3\CMS\Form\Validation\AlphabeticValidator',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_System_Validate_Alphanumeric' => '\TYPO3\CMS\Form\Validation\AlphanumericValidator',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_System_Validate_Between' => '\TYPO3\CMS\Form\Validation\BetweenValidator',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_System_Validate_Date' => '\TYPO3\CMS\Form\Validation\DateValidator',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_System_Validate_Digit' => '\TYPO3\CMS\Form\Validation\DigitValidator',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_System_Validate_Email' => '\TYPO3\CMS\Form\Validation\EmailValidator',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_System_Validate_Equals' => '\TYPO3\CMS\Form\Validation\EqualsValidator',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_System_Validate_Fileallowedtypes' => '\TYPO3\CMS\Form\Validation\FileAllowedTypesValidator',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_System_Validate_Filemaximumsize' => '\TYPO3\CMS\Form\Validation\FileMaximumSizeValidator',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_System_Validate_Fileminimumsize' => '\TYPO3\CMS\Form\Validation\FileMinimumSizeValidator',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_System_Validate_Float' => '\TYPO3\CMS\Form\Validation\FloatValidator',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_System_Validate_Greaterthan' => '\TYPO3\CMS\Form\Validation\GreaterThanValidator',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_System_Validate_Inarray' => '\TYPO3\CMS\Form\Validation\InArrayValidator',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_System_Validate_Integer' => '\TYPO3\CMS\Form\Validation\IntegerValidator',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_System_Validate_Interface' => '\TYPO3\CMS\Form\Validation\ValidatorInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_System_Validate_Ip' => '\TYPO3\CMS\Form\Validation\IpValidator',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_System_Validate_Length' => '\TYPO3\CMS\Form\Validation\LengthValidator',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_System_Validate_Lessthan' => '\TYPO3\CMS\Form\Validation\LessthanValidator',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_System_Validate_Regexp' => '\TYPO3\CMS\Form\Validation\RegExpValidator',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_System_Validate_Required' => '\TYPO3\CMS\Form\Validation\RequiredValidator',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_System_Validate_Uri' => '\TYPO3\CMS\Form\Validation\UriValidator',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_View_Confirmation_Additional' => '\TYPO3\CMS\Form\View\Confirmation\Additional\AdditionalElementView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_View_Confirmation_Additional_Label' => '\TYPO3\CMS\Form\View\Confirmation\Additional\LabelAdditionalElementView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_View_Confirmation_Additional_Legend' => '\TYPO3\CMS\Form\View\Confirmation\Additional\LegendAdditionalElementView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_View_Confirmation' => '\TYPO3\CMS\Form\View\Confirmation\ConfirmationView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_View_Confirmation_Element_Abstract' => '\TYPO3\CMS\Form\View\Confirmation\Element\AbstractElementView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_View_Confirmation_Element_Checkbox' => '\TYPO3\CMS\Form\View\Confirmation\Element\CheckboxElementView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_View_Confirmation_Element_Checkboxgroup' => '\TYPO3\CMS\Form\View\Confirmation\Element\CheckboxGroupElementView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_View_Confirmation_Element_Container' => '\TYPO3\CMS\Form\View\Confirmation\Element\ContainerElementView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_View_Confirmation_Element_Fieldset' => '\TYPO3\CMS\Form\View\Confirmation\Element\FieldsetElementView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_View_Confirmation_Element_Fileupload' => '\TYPO3\CMS\Form\View\Confirmation\Element\FileuploadElementView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_View_Confirmation_Element_Optgroup' => '\TYPO3\CMS\Form\View\Confirmation\Element\OptgroupElementView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_View_Confirmation_Element_Option' => '\TYPO3\CMS\Form\View\Confirmation\Element\OptionElementView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_View_Confirmation_Element_Radio' => '\TYPO3\CMS\Form\View\Confirmation\Element\RadioElementView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_View_Confirmation_Element_Radiogroup' => '\TYPO3\CMS\Form\View\Confirmation\Element\RadioGroupElementView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_View_Confirmation_Element_Select' => '\TYPO3\CMS\Form\View\Confirmation\Element\SelectElementView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_View_Confirmation_Element_Textarea' => '\TYPO3\CMS\Form\View\Confirmation\Element\TextareaElementView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_View_Confirmation_Element_Textline' => '\TYPO3\CMS\Form\View\Confirmation\Element\TextlineElementView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_View_Form_Additional' => '\TYPO3\CMS\Form\View\Form\Additional\AdditionalElementView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_View_Form_Additional_Error' => '\TYPO3\CMS\Form\View\Form\Additional\ErrorAdditionalElementView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_View_Form_Additional_Label' => '\TYPO3\CMS\Form\View\Form\Additional\LabelAdditionalElementView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_View_Form_Additional_Legend' => '\TYPO3\CMS\Form\View\Form\Additional\LegendAdditionalElementView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_View_Form_Additional_Mandatory' => '\TYPO3\CMS\Form\View\Form\Additional\MandatoryAdditionalElementView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_View_Form_Element_Abstract' => '\TYPO3\CMS\Form\View\Form\Element\AbstractElementView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_View_Form_Element_Button' => '\TYPO3\CMS\Form\View\Form\Element\ButtonElementView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_View_Form_Element_Checkbox' => '\TYPO3\CMS\Form\View\Form\Element\CheckboxElementView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_View_Form_Element_Checkboxgroup' => '\TYPO3\CMS\Form\View\Form\Element\CheckboxGroupElementView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_View_Form_Element_Container' => '\TYPO3\CMS\Form\View\Form\Element\ContainerElementView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_View_Form_Element_Content' => '\TYPO3\CMS\Form\View\Form\Element\ContentElementView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_View_Form_Element_Fieldset' => '\TYPO3\CMS\Form\View\Form\Element\FieldsetElementView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_View_Form_Element_Fileupload' => '\TYPO3\CMS\Form\View\Form\Element\FileuploadElementView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_View_Form_Element_Header' => '\TYPO3\CMS\Form\View\Form\Element\HeaderElementView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_View_Form_Element_Hidden' => '\TYPO3\CMS\Form\View\Form\Element\HiddenElementView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_View_Form_Element_Imagebutton' => '\TYPO3\CMS\Form\View\Form\Element\ImagebuttonElementView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_View_Form_Element_Optgroup' => '\TYPO3\CMS\Form\View\Form\Element\OptgroupElementView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_View_Form_Element_Option' => '\TYPO3\CMS\Form\View\Form\Element\OptionElementView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_View_Form_Element_Password' => '\TYPO3\CMS\Form\View\Form\Element\PasswordElementView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_View_Form_Element_Radio' => '\TYPO3\CMS\Form\View\Form\Element\RadioElementView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_View_Form_Element_Radiogroup' => '\TYPO3\CMS\Form\View\Form\Element\RadioGroupElementView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_View_Form_Element_Reset' => '\TYPO3\CMS\Form\View\Form\Element\ResetElementView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_View_Form_Element_Select' => '\TYPO3\CMS\Form\View\Form\Element\SelectElementView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_View_Form_Element_Submit' => '\TYPO3\CMS\Form\View\Form\Element\SubmitElementView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_View_Form_Element_Textarea' => '\TYPO3\CMS\Form\View\Form\Element\TextareaElementView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_View_Form_Element_Textblock' => '\TYPO3\CMS\Form\View\Form\Element\TextblockElementView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_View_Form_Element_Textline' => '\TYPO3\CMS\Form\View\Form\Element\TextlineElementView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_View_Form' => '\TYPO3\CMS\Form\View\Form\FormView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_View_Mail_Html_Additional' => '\TYPO3\CMS\Form\View\Mail\Html\Additional\AdditionalElementView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_View_Mail_Html_Additional_Label' => '\TYPO3\CMS\Form\View\Mail\Html\Additional\LabelAdditionalElementView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_View_Mail_Html_Additional_Legend' => '\TYPO3\CMS\Form\View\Mail\Html\Additional\LegendAdditionalElementView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_View_Mail_Html_Element_Abstract' => '\TYPO3\CMS\Form\View\Mail\Html\Element\AbstractElementView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_View_Mail_Html_Element_Checkbox' => '\TYPO3\CMS\Form\View\Mail\Html\Element\CheckboxElementView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_View_Mail_Html_Element_Checkboxgroup' => '\TYPO3\CMS\Form\View\Mail\Html\Element\CheckboxGroupElementView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_View_Mail_Html_Element_Container' => '\TYPO3\CMS\Form\View\Mail\Html\Element\ContainerElementView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_View_Mail_Html_Element_Fieldset' => '\TYPO3\CMS\Form\View\Mail\Html\Element\FieldsetElementView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_View_Mail_Html_Element_Fileupload' => '\TYPO3\CMS\Form\View\Mail\Html\Element\FileuploadElementView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_View_Mail_Html_Element_Hidden' => '\TYPO3\CMS\Form\View\Mail\Html\Element\HiddenElementView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_View_Mail_Html_Element_Optgroup' => '\TYPO3\CMS\Form\View\Mail\Html\Element\OptgroupElementView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_View_Mail_Html_Element_Option' => '\TYPO3\CMS\Form\View\Mail\Html\Element\OptionElementView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_View_Mail_Html_Element_Radio' => '\TYPO3\CMS\Form\View\Mail\Html\Element\RadioElementView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_View_Mail_Html_Element_Radiogroup' => '\TYPO3\CMS\Form\View\Mail\Html\Element\RadioGroupElementView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_View_Mail_Html_Element_Select' => '\TYPO3\CMS\Form\View\Mail\Html\Element\SelectElementView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_View_Mail_Html_Element_Textarea' => '\TYPO3\CMS\Form\View\Mail\Html\Element\TextareaElementView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_View_Mail_Html_Element_Textline' => '\TYPO3\CMS\Form\View\Mail\Html\Element\TextlineElementView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_View_Mail_Html' => '\TYPO3\CMS\Form\View\Mail\Html\HtmlView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_View_Mail' => '\TYPO3\CMS\Form\View\Mail\MailView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_View_Mail_Plain_Element_Abstract' => '\TYPO3\CMS\Form\View\Mail\Plain\Element\AbstractElementView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_View_Mail_Plain_Element_Checkbox' => '\TYPO3\CMS\Form\View\Mail\Plain\Element\CheckboxElementView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_View_Mail_Plain_Element_Checkboxgroup' => '\TYPO3\CMS\Form\View\Mail\Plain\Element\CheckboxGroupElementView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_View_Mail_Plain_Element_Container' => '\TYPO3\CMS\Form\View\Mail\Plain\Element\ContainerElementView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_View_Mail_Plain_Element_Fieldset' => '\TYPO3\CMS\Form\View\Mail\Plain\Element\FieldsetElementView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_View_Mail_Plain_Element_Fileupload' => '\TYPO3\CMS\Form\View\Mail\Plain\Element\FileuploadElementView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_View_Mail_Plain_Element_Hidden' => '\TYPO3\CMS\Form\View\Mail\Plain\Element\HiddenElementView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_View_Mail_Plain_Element_Optgroup' => '\TYPO3\CMS\Form\View\Mail\Plain\Element\OptgroupElementView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_View_Mail_Plain_Element_Option' => '\TYPO3\CMS\Form\View\Mail\Plain\Element\OptionElementView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_View_Mail_Plain_Element_Radio' => '\TYPO3\CMS\Form\View\Mail\Plain\Element\RadioElementView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_View_Mail_Plain_Element_Radiogroup' => '\TYPO3\CMS\Form\View\Mail\Plain\Element\RadioGroupElementView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_View_Mail_Plain_Element_Select' => '\TYPO3\CMS\Form\View\Mail\Plain\Element\SelectElementView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_View_Mail_Plain_Element_Textarea' => '\TYPO3\CMS\Form\View\Mail\Plain\Element\TextareaElementView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_View_Mail_Plain_Element_Textline' => '\TYPO3\CMS\Form\View\Mail\Plain\Element\TextlineElementView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_View_Mail_Plain' => '\TYPO3\CMS\Form\View\Mail\Plain\PlainView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_View_Wizard_Abstract' => '\TYPO3\CMS\Form\View\Wizard\AbstractWizardView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_View_Wizard_Load' => '\TYPO3\CMS\Form\View\Wizard\LoadWizardView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_View_Wizard_Save' => '\TYPO3\CMS\Form\View\Wizard\SaveWizardView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_form_View_Wizard_Wizard' => '\TYPO3\CMS\Form\View\Wizard\WizardView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tslib_feUserAuth' => '\TYPO3\CMS\Frontend\Authentication\FrontendUserAuthentication',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_matchCondition_frontend' => '\TYPO3\CMS\Frontend\Configuration\TypoScript\ConditionMatching\ConditionMatcher',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tslib_content_Abstract' => '\TYPO3\CMS\Frontend\ContentObject\AbstractContentObject',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tslib_content_Case' => '\TYPO3\CMS\Frontend\ContentObject\CaseContentObject',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tslib_content_ClearGif' => '\TYPO3\CMS\Frontend\ContentObject\ClearGifContentObject',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tslib_content_Columns' => '\TYPO3\CMS\Frontend\ContentObject\ColumnsContentObject',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tslib_content_Content' => '\TYPO3\CMS\Frontend\ContentObject\ContentContentObject',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tslib_content_ContentObjectArray' => '\TYPO3\CMS\Frontend\ContentObject\ContentObjectArrayContentObject',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tslib_content_ContentObjectArrayInternal' => '\TYPO3\CMS\Frontend\ContentObject\ContentObjectArrayInternalContentObject',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tslib_content_getDataHook' => '\TYPO3\CMS\Frontend\ContentObject\ContentObjectGetDataHookInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tslib_cObj_getImgResourceHook' => '\TYPO3\CMS\Frontend\ContentObject\ContentObjectGetImageResourceHookInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tslib_content_getPublicUrlForFileHook' => '\TYPO3\CMS\Frontend\ContentObject\ContentObjectGetPublicUrlForFileHookInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tslib_content_cObjGetSingleHook' => '\TYPO3\CMS\Frontend\ContentObject\ContentObjectGetSingleHookInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tslib_content_PostInitHook' => '\TYPO3\CMS\Frontend\ContentObject\ContentObjectPostInitHookInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tslib_cObj' => '\TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tslib_content_stdWrapHook' => '\TYPO3\CMS\Frontend\ContentObject\ContentObjectStdWrapHookInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tslib_content_ContentTable' => '\TYPO3\CMS\Frontend\ContentObject\ContentTableContentObject',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tslib_content_EditPanel' => '\TYPO3\CMS\Frontend\ContentObject\EditPanelContentObject',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tslib_content_File' => '\TYPO3\CMS\Frontend\ContentObject\FileContentObject',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tslib_content_fileLinkHook' => '\TYPO3\CMS\Frontend\ContentObject\FileLinkHookInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tslib_content_Files' => '\TYPO3\CMS\Frontend\ContentObject\FilesContentObject',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tslib_content_FlowPlayer' => '\TYPO3\CMS\Frontend\ContentObject\FlowPlayerContentObject',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tslib_content_FluidTemplate' => '\TYPO3\CMS\Frontend\ContentObject\FluidTemplateContentObject',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tslib_content_Form' => '\TYPO3\CMS\Frontend\ContentObject\FormContentObject',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tslib_content_HierarchicalMenu' => '\TYPO3\CMS\Frontend\ContentObject\HierarchicalMenuContentObject',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tslib_content_HorizontalRuler' => '\TYPO3\CMS\Frontend\ContentObject\HorizontalRulerContentObject',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tslib_content_Image' => '\TYPO3\CMS\Frontend\ContentObject\ImageContentObject',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tslib_content_ImageResource' => '\TYPO3\CMS\Frontend\ContentObject\ImageResourceContentObject',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tslib_content_ImageText' => '\TYPO3\CMS\Frontend\ContentObject\ImageTextContentObject',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tslib_content_LoadRegister' => '\TYPO3\CMS\Frontend\ContentObject\LoadRegisterContentObject',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tslib_content_Media' => '\TYPO3\CMS\Frontend\ContentObject\MediaContentObject',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tslib_menu' => '\TYPO3\CMS\Frontend\ContentObject\Menu\AbstractMenuContentObject',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tslib_menu_filterMenuPagesHook' => '\TYPO3\CMS\Frontend\ContentObject\Menu\AbstractMenuFilterPagesHookInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tslib_gmenu' => '\TYPO3\CMS\Frontend\ContentObject\Menu\GraphicalMenuContentObject',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tslib_imgmenu' => '\TYPO3\CMS\Frontend\ContentObject\Menu\ImageMenuContentObject',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tslib_jsmenu' => '\TYPO3\CMS\Frontend\ContentObject\Menu\JavaScriptMenuContentObject',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tslib_tmenu' => '\TYPO3\CMS\Frontend\ContentObject\Menu\TextMenuContentObject',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tslib_content_Multimedia' => '\TYPO3\CMS\Frontend\ContentObject\MultimediaContentObject',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tslib_tableOffset' => '\TYPO3\CMS\Frontend\ContentObject\OffsetTableContentObject',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tslib_content_OffsetTable' => '\TYPO3\CMS\Frontend\ContentObject\OffsetTableContentObject',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tslib_content_QuicktimeObject' => '\TYPO3\CMS\Frontend\ContentObject\QuicktimeObjectContentObject',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tslib_content_Records' => '\TYPO3\CMS\Frontend\ContentObject\RecordsContentObject',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tslib_content_RestoreRegister' => '\TYPO3\CMS\Frontend\ContentObject\RestoreRegisterContentObject',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tslib_content_ScalableVectorGraphics' => '\TYPO3\CMS\Frontend\ContentObject\ScalableVectorGraphicsContentObject',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tslib_search' => '\TYPO3\CMS\Frontend\ContentObject\SearchResultContentObject',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tslib_content_SearchResult' => '\TYPO3\CMS\Frontend\ContentObject\SearchResultContentObject',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tslib_content_ShockwaveFlashObject' => '\TYPO3\CMS\Frontend\ContentObject\ShockwaveFlashObjectContentObject',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tslib_controlTable' => '\TYPO3\CMS\Frontend\ContentObject\TableRenderer',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tslib_content_Template' => '\TYPO3\CMS\Frontend\ContentObject\TemplateContentObject',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tslib_content_Text' => '\TYPO3\CMS\Frontend\ContentObject\TextContentObject',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tslib_content_User' => '\TYPO3\CMS\Frontend\ContentObject\UserContentObject',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tslib_content_UserInternal' => '\TYPO3\CMS\Frontend\ContentObject\UserInternalContentObject',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tslib_ExtDirectEid' => '\TYPO3\CMS\Frontend\Controller\ExtDirectEidController',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_cms_webinfo_page' => '\TYPO3\CMS\Frontend\Controller\PageInformationController',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'SC_tslib_showpic' => '\TYPO3\CMS\Frontend\Controller\ShowImageController',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_cms_webinfo_lang' => '\TYPO3\CMS\Frontend\Controller\TranslationStatusController',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tslib_fe' => '\TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_cms_fehooks' => '\TYPO3\CMS\Frontend\Hooks\FrontendHooks',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_cms_mediaItems' => '\TYPO3\CMS\Frontend\Hooks\MediaItemHooks',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_cms_treelistCacheUpdate' => '\TYPO3\CMS\Frontend\Hooks\TreelistCacheUpdateHooks',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tslib_gifBuilder' => '\TYPO3\CMS\Frontend\Imaging\GifBuilder',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tslib_mediaWizardCoreProvider' => '\TYPO3\CMS\Frontend\MediaWizard\MediaWizardProvider',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tslib_mediaWizardProvider' => '\TYPO3\CMS\Frontend\MediaWizard\MediaWizardProviderInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tslib_mediaWizardManager' => '\TYPO3\CMS\Frontend\MediaWizard\MediaWizardProviderManager',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_cacheHash' => '\TYPO3\CMS\Frontend\Page\CacheHashCalculator',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tslib_frameset' => '\TYPO3\CMS\Frontend\Page\FramesetRenderer',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'TSpagegen' => '\TYPO3\CMS\Frontend\Page\PageGenerator',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_pageSelect' => '\TYPO3\CMS\Frontend\Page\PageRepository',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_pageSelect_getPageHook' => '\TYPO3\CMS\Frontend\Page\PageRepositoryGetPageHookInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_pageSelect_getPageOverlayHook' => '\TYPO3\CMS\Frontend\Page\PageRepositoryGetPageOverlayHookInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_pageSelect_getRecordOverlayHook' => '\TYPO3\CMS\Frontend\Page\PageRepositoryGetRecordOverlayHookInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tslib_pibase' => '\TYPO3\CMS\Frontend\Plugin\AbstractPlugin',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tslib_fecompression' => '\TYPO3\CMS\Frontend\Utility\CompressionUtility',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tslib_eidtools' => '\TYPO3\CMS\Frontend\Utility\EidUtility',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tslib_AdminPanel' => '\TYPO3\CMS\Frontend\View\AdminPanelView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tslib_adminPanelHook' => '\TYPO3\CMS\Frontend\View\AdminPanelViewHookInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'SC_mod_web_func_index' => '\TYPO3\CMS\Func\Controller\PageFunctionsController',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_funcwizards_webfunc' => '\TYPO3\CMS\FuncWizards\Controller\WebFunctionWizardsBaseController',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_impexp_clickmenu' => '\TYPO3\CMS\Impexp\Clickmenu',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'SC_mod_tools_log_index' => '\TYPO3\CMS\Impexp\Controller\ImportExportController',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_impexp' => '\TYPO3\CMS\Impexp\ImportExport',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_impexp_localPageTree' => '\TYPO3\CMS\Impexp\LocalPageTree',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_impexp_task' => '\TYPO3\CMS\Impexp\Task\ImportExportTask',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_indexedsearch_modfunc1' => '\TYPO3\CMS\IndexedSearch\Controller\IndexedPagesController',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_indexedsearch_modfunc2' => '\TYPO3\CMS\IndexedSearch\Controller\IndexingStatisticsController',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'SC_mod_tools_isearch_index' => '\TYPO3\CMS\IndexedSearch\Controller\ModuleController',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_IndexedSearch_Controller_SearchController' => '\TYPO3\CMS\IndexedSearch\Controller\SearchController',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_indexedsearch' => '\TYPO3\CMS\IndexedSearch\Controller\SearchFormController',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_IndexedSearch_Domain_Repository_IndexSearchRepository' => '\TYPO3\CMS\IndexedSearch\Domain\Repository\IndexSearchRepository',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_indexed_search_extparse' => '\TYPO3\CMS\IndexedSearch\FileContentParser',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_indexedsearch_files' => '\TYPO3\CMS\IndexedSearch\Hook\CrawlerFilesHook',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_indexedsearch_crawler' => '\TYPO3\CMS\IndexedSearch\Hook\CrawlerHook',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_indexedsearch_mysql' => '\TYPO3\CMS\IndexedSearch\Hook\MysqlFulltextIndexHook',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_indexedsearch_tslib_fe_hook' => '\TYPO3\CMS\IndexedSearch\Hook\TypoScriptFrontendHook',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_indexedsearch_indexer' => '\TYPO3\CMS\IndexedSearch\Indexer',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_indexedsearch_lexer' => '\TYPO3\CMS\IndexedSearch\Lexer',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'user_DoubleMetaPhone' => '\TYPO3\CMS\IndexedSearch\Utility\DoubleMetaPhoneUtility',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_indexedsearch_util' => '\TYPO3\CMS\IndexedSearch\Utility\IndexedSearchUtility',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_IndexedSearch_ViewHelpers_PageBrowsingResultsViewHelper' => '\TYPO3\CMS\IndexedSearch\ViewHelpers\PageBrowsingResultsViewHelper',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_IndexedSearch_ViewHelpers_PageBrowsingViewHelper' => '\TYPO3\CMS\IndexedSearch\ViewHelpers\PageBrowsingViewHelper',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'SC_mod_web_info_index' => '\TYPO3\CMS\Info\Controller\InfoModuleController',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_infopagetsconfig_webinfo' => '\TYPO3\CMS\InfoPagetsconfig\Controller\InfoPageTyposcriptConfigController',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_coreupdates_addflexformstoacl' => '\TYPO3\CMS\Install\Updates\AddFlexFormsToAclUpdate',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_coreupdates_charsetDefaults' => '\TYPO3\CMS\Install\Updates\CharsetDefaultsUpdate',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_coreupdates_compatversion' => '\TYPO3\CMS\Install\Updates\CompatVersionUpdate',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_coreupdates_compressionlevel' => '\TYPO3\CMS\Install\Updates\CompressionLevelUpdate',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_coreupdates_cscsplit' => '\TYPO3\CMS\Install\Updates\CscSplitUpdate',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_coreupdates_flagsfromsprite' => '\TYPO3\CMS\Install\Updates\FlagsFromSpriteUpdate',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_coreupdates_imagecols' => '\TYPO3\CMS\Install\Updates\ImagecolsUpdate',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_coreupdates_imagelink' => '\TYPO3\CMS\Install\Updates\ImagelinkUpdate',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_coreupdates_installsysexts' => '\TYPO3\CMS\Install\Updates\InstallSysExtsUpdate',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_coreupdates_mediaFlexform' => '\TYPO3\CMS\Install\Updates\MediaFlexformUpdate',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_coreupdates_mergeadvanced' => '\TYPO3\CMS\Install\Updates\MergeAdvancedUpdate',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_coreupdates_migrateworkspaces' => '\TYPO3\CMS\Install\Updates\MigrateWorkspacesUpdate',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_coreupdates_notinmenu' => '\TYPO3\CMS\Install\Updates\NotInMenuUpdate',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_coreupdates_t3skin' => '\TYPO3\CMS\Install\Updates\T3skinUpdate',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Install_Service_BasicService' => '\TYPO3\CMS\Install\Service\EnableFileService',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_install_report_InstallStatus' => '\TYPO3\CMS\Install\Report\InstallStatusReport',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_install_session' => '\TYPO3\CMS\Install\Service\SessionService',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_install_Sql' => '\TYPO3\CMS\Install\Service\SqlSchemaMigrationService',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Install_Updates_Base' => '\TYPO3\CMS\Install\Updates\AbstractUpdate',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Install_Updates_File_FilemountUpdateWizard' => '\TYPO3\CMS\Install\Updates\FilemountUpdateWizard',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Install_Updates_File_InitUpdateWizard' => '\TYPO3\CMS\Install\Updates\InitUpdateWizard',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Install_Updates_File_TceformsUpdateWizard' => '\TYPO3\CMS\Install\Updates\TceformsUpdateWizard',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Install_Updates_File_TtContentUploadsUpdateWizard' => '\TYPO3\CMS\Install\Updates\TtContentUploadsUpdateWizard',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'language' => '\TYPO3\CMS\Lang\LanguageService',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_linkvalidator_Processor' => '\TYPO3\CMS\Linkvalidator\LinkAnalyzer',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_linkvalidator_linktype_Abstract' => '\TYPO3\CMS\Linkvalidator\Linktype\AbstractLinktype',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_linkvalidator_linktype_External' => '\TYPO3\CMS\Linkvalidator\Linktype\ExternalLinktype',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_linkvalidator_linktype_File' => '\TYPO3\CMS\Linkvalidator\Linktype\FileLinktype',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_linkvalidator_linktype_Internal' => '\TYPO3\CMS\Linkvalidator\Linktype\InternalLinktype',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_linkvalidator_linktype_LinkHandler' => '\TYPO3\CMS\Linkvalidator\Linktype\LinkHandler',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_linkvalidator_linktype_Interface' => '\TYPO3\CMS\Linkvalidator\Linktype\LinktypeInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_linkvalidator_ModFuncReport' => '\TYPO3\CMS\Linkvalidator\Report\LinkValidatorReport',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_linkvalidator_tasks_Validator' => '\TYPO3\CMS\Linkvalidator\Task\ValidatorTask',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_linkvalidator_tasks_ValidatorAdditionalFieldProvider' => '\TYPO3\CMS\Linkvalidator\Task\ValidatorTaskAdditionalFieldProvider',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_lowlevel_admin_core' => '\TYPO3\CMS\Lowlevel\AdminCommand',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_lowlevel_cleaner_core' => '\TYPO3\CMS\Lowlevel\CleanerCommand',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_lowlevel_cleanflexform' => '\TYPO3\CMS\Lowlevel\CleanFlexformCommand',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_lowlevel_deleted' => '\TYPO3\CMS\Lowlevel\DeletedRecordsCommand',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_lowlevel_double_files' => '\TYPO3\CMS\Lowlevel\DoubleFilesCommand',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_lowlevel_lost_files' => '\TYPO3\CMS\Lowlevel\LostFilesCommand',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_lowlevel_missing_files' => '\TYPO3\CMS\Lowlevel\MissingFilesCommand',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_lowlevel_missing_relations' => '\TYPO3\CMS\Lowlevel\MissingRelationsCommand',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_lowlevel_orphan_records' => '\TYPO3\CMS\Lowlevel\OrphanRecordsCommand',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_lowlevel_rte_images' => '\TYPO3\CMS\Lowlevel\RteImagesCommand',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_lowlevel_syslog' => '\TYPO3\CMS\Lowlevel\SyslogCommand',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_arrayBrowser' => '\TYPO3\CMS\Lowlevel\Utility\ArrayBrowser',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_lowlevel_versions' => '\TYPO3\CMS\Lowlevel\VersionsCommand',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'SC_mod_tools_config_index' => '\TYPO3\CMS\Lowlevel\View\ConfigurationView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'SC_mod_tools_dbint_index' => '\TYPO3\CMS\Lowlevel\View\DatabaseIntegrityView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_opendocs' => '\TYPO3\CMS\Opendocs\Controller\OpendocsController',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_openid_eID' => '\TYPO3\CMS\Openid\OpenidEid',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_openid_mod_setup' => '\TYPO3\CMS\Openid\OpenidModuleSetup',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_openid_return' => '\TYPO3\CMS\Openid\OpenidReturn',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_openid_sv1' => '\TYPO3\CMS\Openid\OpenidService',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_openid_store' => '\TYPO3\CMS\Openid\OpenidStore',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'SC_mod_web_perm_ajax' => '\TYPO3\CMS\Perm\Controller\PermissionAjaxController',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'SC_mod_web_perm_index' => '\TYPO3\CMS\Perm\Controller\PermissionModuleController',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'browse_links' => '\TYPO3\CMS\Recordlist\Browser\ElementBrowser',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'SC_browse_links' => '\TYPO3\CMS\Recordlist\Controller\ElementBrowserController',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'SC_browser' => '\TYPO3\CMS\Recordlist\Controller\ElementBrowserFramesetController',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'SC_db_list' => '\TYPO3\CMS\Recordlist\RecordList',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'recordList' => '\TYPO3\CMS\Recordlist\RecordList\AbstractDatabaseRecordList',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'localRecordList' => '\TYPO3\CMS\Recordlist\RecordList\DatabaseRecordList',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'localRecordList_actionsHook' => '\TYPO3\CMS\Recordlist\RecordList\RecordListHookInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_recycler_view_deletedRecords' => '\TYPO3\CMS\Recycler\Controller\DeletedRecordsController',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_recycler_controller_ajax' => '\TYPO3\CMS\Recycler\Controller\RecyclerAjaxController',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_recycler_module1' => '\TYPO3\CMS\Recycler\Controller\RecyclerModuleController',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_recycler_model_deletedRecords' => '\TYPO3\CMS\Recycler\Domain\Model\DeletedRecords',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_recycler_model_tables' => '\TYPO3\CMS\Recycler\Domain\Model\Tables',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_recycler_helper' => '\TYPO3\CMS\Recycler\Utility\RecyclerUtility',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Reports_Controller_ReportController' => '\TYPO3\CMS\Reports\Controller\ReportController',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_reports_reports_status_ConfigurationStatus' => '\TYPO3\CMS\Reports\Report\Status\ConfigurationStatus',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_reports_reports_status_SecurityStatus' => '\TYPO3\CMS\Reports\Report\Status\SecurityStatus',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_reports_reports_Status' => '\TYPO3\CMS\Reports\Report\Status\Status',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_reports_reports_status_Status' => '\TYPO3\CMS\Reports\Status',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_reports_reports_status_SystemStatus' => '\TYPO3\CMS\Reports\Report\Status\SystemStatus',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_reports_reports_status_Typo3Status' => '\TYPO3\CMS\Reports\Report\Status\Typo3Status',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_reports_reports_status_WarningMessagePostProcessor' => '\TYPO3\CMS\Reports\Report\Status\WarningMessagePostProcessor',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_reports_Report' => '\TYPO3\CMS\Reports\ReportInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_reports_StatusProvider' => '\TYPO3\CMS\Reports\StatusProviderInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_reports_tasks_SystemStatusUpdateTask' => '\TYPO3\CMS\Reports\Task\SystemStatusUpdateTask',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_reports_tasks_SystemStatusUpdateTaskNotificationEmailField' => '\TYPO3\CMS\Reports\Task\SystemStatusUpdateTaskNotificationEmailField',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Reports_ViewHelpers_ActionMenuItemViewHelper' => '\TYPO3\CMS\Reports\ViewHelpers\ActionMenuItemViewHelper',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Reports_ViewHelpers_IconViewHelper' => '\TYPO3\CMS\Reports\ViewHelpers\IconViewHelper',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_rsaauth_abstract_backend' => '\TYPO3\CMS\Rsaauth\Backend\AbstractBackend',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_rsaauth_backendfactory' => '\TYPO3\CMS\Rsaauth\Backend\BackendFactory',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_rsaauth_cmdline_backend' => '\TYPO3\CMS\Rsaauth\Backend\CommandLineBackend',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_rsaauth_php_backend' => '\TYPO3\CMS\Rsaauth\Backend\PhpBackend',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_rsaauth_backendwarnings' => '\TYPO3\CMS\Rsaauth\BackendWarnings',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_rsaauth_feloginhook' => '\TYPO3\CMS\Rsaauth\Hook\FrontendLoginHook',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_rsaauth_loginformhook' => '\TYPO3\CMS\Rsaauth\Hook\LoginFormHook',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_rsaauth_usersetuphook' => '\TYPO3\CMS\Rsaauth\Hook\UserSetupHook',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_rsaauth_keypair' => '\TYPO3\CMS\Rsaauth\Keypair',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_rsaauth_sv1' => '\TYPO3\CMS\Rsaauth\RsaAuthService',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_rsaauth_abstract_storage' => '\TYPO3\CMS\Rsaauth\Storage\AbstractStorage',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_rsaauth_session_storage' => '\TYPO3\CMS\Rsaauth\Storage\SessionStorage',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_rsaauth_split_storage' => '\TYPO3\CMS\Rsaauth\Storage\SplitStorage',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_rsaauth_storagefactory' => '\TYPO3\CMS\Rsaauth\Storage\StorageFactory',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_rtehtmlarea_browse_links' => '\TYPO3\CMS\Rtehtmlarea\BrowseLinks',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_rtehtmlarea_parse_html' => '\TYPO3\CMS\Rtehtmlarea\ContentParser',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_rtehtmlarea_SC_browse_links' => '\TYPO3\CMS\Rtehtmlarea\Controller\BrowseLinksController',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_rtehtmlarea_pi3' => '\TYPO3\CMS\Rtehtmlarea\Controller\CustomAttributeController',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_rtehtmlarea_pi2' => '\TYPO3\CMS\Rtehtmlarea\Controller\FrontendRteController',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_rtehtmlarea_SC_select_image' => '\TYPO3\CMS\Rtehtmlarea\Controller\SelectImageController',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_rtehtmlarea_pi1' => '\TYPO3\CMS\Rtehtmlarea\Controller\SpellCheckingController',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_rtehtmlarea_abouteditor' => '\TYPO3\CMS\Rtehtmlarea\Extension\AboutEditor',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_rtehtmlarea_acronym' => '\TYPO3\CMS\Rtehtmlarea\Extension\Acronym',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_rtehtmlarea_blockelements' => '\TYPO3\CMS\Rtehtmlarea\Extension\BlockElements',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_rtehtmlarea_blockstyle' => '\TYPO3\CMS\Rtehtmlarea\Extension\BlockStyle',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_rtehtmlarea_charactermap' => '\TYPO3\CMS\Rtehtmlarea\Extension\CharacterMap',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_rtehtmlarea_contextmenu' => '\TYPO3\CMS\Rtehtmlarea\Extension\ContextMenu',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_rtehtmlarea_copypaste' => '\TYPO3\CMS\Rtehtmlarea\Extension\CopyPaste',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_rtehtmlarea_defaultclean' => '\TYPO3\CMS\Rtehtmlarea\Extension\DefaultClean',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_rtehtmlarea_defaultimage' => '\TYPO3\CMS\Rtehtmlarea\Extension\DefaultImage',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_rtehtmlarea_defaultinline' => '\TYPO3\CMS\Rtehtmlarea\Extension\DefaultInline',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_rtehtmlarea_defaultlink' => '\TYPO3\CMS\Rtehtmlarea\Extension\DefaultLink',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_rtehtmlarea_definitionlist' => '\TYPO3\CMS\Rtehtmlarea\Extension\DefinitionList',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_rtehtmlarea_editelement' => '\TYPO3\CMS\Rtehtmlarea\Extension\EditElement',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_rtehtmlarea_editormode' => '\TYPO3\CMS\Rtehtmlarea\Extension\EditorMode',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_rtehtmlarea_findreplace' => '\TYPO3\CMS\Rtehtmlarea\Extension\FindReplace',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_rtehtmlarea_inlineelements' => '\TYPO3\CMS\Rtehtmlarea\Extension\InlineElements',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_rtehtmlarea_insertsmiley' => '\TYPO3\CMS\Rtehtmlarea\Extension\InsertSmiley',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_rtehtmlarea_language' => '\TYPO3\CMS\Rtehtmlarea\Extension\Language',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_rtehtmlarea_microdataschema' => '\TYPO3\CMS\Rtehtmlarea\Extension\MicroDataSchema',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_rtehtmlarea_plaintext' => '\TYPO3\CMS\Rtehtmlarea\Extension\Plaintext',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_rtehtmlarea_quicktag' => '\TYPO3\CMS\Rtehtmlarea\Extension\QuickTag',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_rtehtmlarea_removeformat' => '\TYPO3\CMS\Rtehtmlarea\Extension\RemoveFormat',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_rtehtmlarea_selectfont' => '\TYPO3\CMS\Rtehtmlarea\Extension\SelectFont',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_rtehtmlarea_spellchecker' => '\TYPO3\CMS\Rtehtmlarea\Extension\Spellchecker',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_rtehtmlarea_tableoperations' => '\TYPO3\CMS\Rtehtmlarea\Extension\TableOperations',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_rtehtmlarea_textindicator' => '\TYPO3\CMS\Rtehtmlarea\Extension\TextIndicator',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_rtehtmlarea_textstyle' => '\TYPO3\CMS\Rtehtmlarea\Extension\TextStyle',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_rtehtmlarea_typo3color' => '\TYPO3\CMS\Rtehtmlarea\Extension\Typo3Color',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_rtehtmlarea_typo3htmlparser' => '\TYPO3\CMS\Rtehtmlarea\Extension\Typo3HtmlParser',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_rtehtmlarea_typo3image' => '\TYPO3\CMS\Rtehtmlarea\Extension\Typo3Image',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_rtehtmlarea_typo3link' => '\TYPO3\CMS\Rtehtmlarea\Extension\Typo3Link',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_rtehtmlarea_undoredo' => '\TYPO3\CMS\Rtehtmlarea\Extension\UndoRedo',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_rtehtmlarea_userelements' => '\TYPO3\CMS\Rtehtmlarea\Extension\UserElements',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_rtehtmlarea_folderTree' => '\TYPO3\CMS\Rtehtmlarea\FolderTree',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_rtehtmlarea_deprecatedRteProperties' => '\TYPO3\CMS\Rtehtmlarea\Hook\Install\DeprecatedRteProperties',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_rtehtmlarea_softrefproc' => '\TYPO3\CMS\Rtehtmlarea\Hook\SoftReferenceHook',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_rtehtmlarea_statusReport_conflictsCheck' => '\TYPO3\CMS\Rtehtmlarea\Hook\StatusReportConflictsCheckHook',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_rtehtmlarea_image_folderTree' => '\TYPO3\CMS\Rtehtmlarea\ImageFolderTree',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_rtehtmlarea_pageTree' => '\TYPO3\CMS\Rtehtmlarea\PageTree',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_rtehtmlarea_api' => '\TYPO3\CMS\Rtehtmlarea\RteHtmlAreaApi',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_rtehtmlarea_base' => '\TYPO3\CMS\Rtehtmlarea\RteHtmlAreaBase',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_rtehtmlarea_select_image' => '\TYPO3\CMS\Rtehtmlarea\SelectImage',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_rtehtmlarea_user' => '\TYPO3\CMS\Rtehtmlarea\User',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_saltedpasswords_eval_be' => '\TYPO3\CMS\Saltedpasswords\Evaluation\BackendEvaluator',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_saltedpasswords_eval' => '\TYPO3\CMS\Saltedpasswords\Evaluation\Evaluator',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_saltedpasswords_eval_fe' => '\TYPO3\CMS\Saltedpasswords\Evaluation\FrontendEvaluator',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_saltedpasswords_abstract_salts' => '\TYPO3\CMS\Saltedpasswords\Salt\AbstractSalt',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_saltedpasswords_salts_blowfish' => '\TYPO3\CMS\Saltedpasswords\Salt\BlowfishSalt',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_saltedpasswords_salts_md5' => '\TYPO3\CMS\Saltedpasswords\Salt\Md5Salt',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_saltedpasswords_salts_phpass' => '\TYPO3\CMS\Saltedpasswords\Salt\PhpassSalt',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_saltedpasswords_salts_factory' => '\TYPO3\CMS\Saltedpasswords\Salt\SaltFactory',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_saltedpasswords_salts' => '\TYPO3\CMS\Saltedpasswords\Salt\SaltInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_saltedpasswords_sv1' => '\TYPO3\CMS\Saltedpasswords\SaltedPasswordService',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_saltedpasswords_Tasks_BulkUpdate_AdditionalFieldProvider' => '\TYPO3\CMS\Saltedpasswords\Task\BulkUpdateFieldProvider',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_saltedpasswords_Tasks_BulkUpdate' => '\TYPO3\CMS\Saltedpasswords\Task\BulkUpdateTask',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_saltedpasswords_emconfhelper' => '\TYPO3\CMS\Saltedpasswords\Utility\ExtensionManagerConfigurationUtility',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_saltedpasswords_div' => '\TYPO3\CMS\Saltedpasswords\Utility\SaltedPasswordsUtility',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_scheduler_AdditionalFieldProvider' => '\TYPO3\CMS\Scheduler\AdditionalFieldProviderInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_scheduler_Module' => '\TYPO3\CMS\Scheduler\Controller\SchedulerModuleController',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_scheduler_CronCmd' => '\TYPO3\CMS\Scheduler\CronCommand\CronCommand',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_scheduler_CronCmd_Normalize' => '\TYPO3\CMS\Scheduler\CronCommand\NormalizeCommand',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_scheduler_SleepTask' => '\TYPO3\CMS\Scheduler\Example\SleepTask',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_scheduler_SleepTask_AdditionalFieldProvider' => '\TYPO3\CMS\Scheduler\Example\SleepTaskAdditionalFieldProvider',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_scheduler_Execution' => '\TYPO3\CMS\Scheduler\Execution',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_scheduler_FailedExecutionException' => '\TYPO3\CMS\Scheduler\FailedExecutionException',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_scheduler_ProgressProvider' => '\TYPO3\CMS\Scheduler\ProgressProviderInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_scheduler' => '\TYPO3\CMS\Scheduler\Scheduler',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_scheduler_Task' => '\TYPO3\CMS\Scheduler\Task\AbstractTask',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_scheduler_CachingFrameworkGarbageCollection_AdditionalFieldProvider' => '\TYPO3\CMS\Scheduler\Task\CachingFrameworkGarbageCollectionAdditionalFieldProvider',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_scheduler_CachingFrameworkGarbageCollection' => '\TYPO3\CMS\Scheduler\Task\CachingFrameworkGarbageCollectionTask',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_scheduler_FileIndexing' => '\TYPO3\CMS\Scheduler\Task\FileIndexingTask',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_scheduler_RecyclerGarbageCollection_AdditionalFieldProvider' => '\TYPO3\CMS\Scheduler\Task\RecyclerGarbageCollectionAdditionalFieldProvider',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_scheduler_RecyclerGarbageCollection' => '\TYPO3\CMS\Scheduler\Task\RecyclerGarbageCollectionTask',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_scheduler_TableGarbageCollection_AdditionalFieldProvider' => '\TYPO3\CMS\Scheduler\Task\TableGarbageCollectionAdditionalFieldProvider',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_scheduler_TableGarbageCollection' => '\TYPO3\CMS\Scheduler\Task\TableGarbageCollectionTask',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'SC_mod_user_setup_index' => '\TYPO3\CMS\Setup\Controller\SetupModuleController',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_sv_authbase' => '\TYPO3\CMS\Sv\AbstractAuthenticationService',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_sv_auth' => '\TYPO3\CMS\Sv\AuthenticationService',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_sv_loginformhook' => '\TYPO3\CMS\Sv\LoginFormHook',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_sv_reports_ServicesList' => '\TYPO3\CMS\Sv\Report\ServicesListReport',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_sysaction_list' => '\TYPO3\CMS\SysAction\ActionList',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_sysaction_task' => '\TYPO3\CMS\SysAction\ActionTask',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_sysactionToolbarMenu' => '\TYPO3\CMS\SysAction\ActionToolbarMenu',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_t3editor_codecompletion' => '\TYPO3\CMS\T3editor\CodeCompletion',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_t3editor_tceforms_wizard' => '\TYPO3\CMS\T3editor\FormWizard',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_t3editor_hooks_fileedit' => '\TYPO3\CMS\T3editor\Hook\FileEditHook',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_t3editor_hooks_tstemplateinfo' => '\TYPO3\CMS\T3editor\Hook\TypoScriptTemplateInfoHook',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_t3editor' => '\TYPO3\CMS\T3editor\T3editor',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_t3editor_TSrefLoader' => '\TYPO3\CMS\T3editor\TypoScriptReferenceLoader',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'SC_mod_user_task_index' => '\TYPO3\CMS\Taskcenter\Controller\TaskModuleController',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_taskcenter_Task' => '\TYPO3\CMS\Taskcenter\TaskInterface',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_taskcenter_status' => '\TYPO3\CMS\Taskcenter\TaskStatus',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'SC_mod_web_ts_index' => '\TYPO3\CMS\Tstemplate\Controller\TypoScriptTemplateModuleController',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_tstemplateanalyzer' => '\TYPO3\CMS\Tstemplate\Controller\TemplateAnalyzerModuleFunctionController',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_tstemplateceditor' => '\TYPO3\CMS\Tstemplate\Controller\TypoScriptTemplateConstantEditorModuleFunctionController',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_tstemplateinfo' => '\TYPO3\CMS\Tstemplate\Controller\TypoScriptTemplateInformationModuleFunctionController',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_tstemplateobjbrowser' => '\TYPO3\CMS\Tstemplate\Controller\TypoScriptTemplateObjectBrowserModuleFunctionController',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_version_cm1' => '\TYPO3\CMS\Version\Controller\VersionModuleController',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_version_tcemain_CommandMap' => '\TYPO3\CMS\Version\DataHandler\CommandMap',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_utility_Dependency_Factory' => '\TYPO3\CMS\Version\Dependency\DependencyEntityFactory',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_utility_Dependency' => '\TYPO3\CMS\Version\Dependency\DependencyResolver',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_utility_Dependency_Element' => '\TYPO3\CMS\Version\Dependency\ElementEntity',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_utility_Dependency_Callback' => '\TYPO3\CMS\Version\Dependency\EventCallback',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		't3lib_utility_Dependency_Reference' => '\TYPO3\CMS\Version\Dependency\ReferenceEntity',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_version_tcemain' => '\TYPO3\CMS\Version\Hook\DataHandlerHook',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_version_iconworks' => '\TYPO3\CMS\Version\Hook\IconUtilityHook',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Version_Preview' => '\TYPO3\CMS\Version\Hook\PreviewHook',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_version_tasks_AutoPublish' => '\TYPO3\CMS\Version\Task\AutoPublishTask',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'wslib' => '\TYPO3\CMS\Version\Utility\WorkspacesUtility',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_version_gui' => '\TYPO3\CMS\Version\View\VersionView',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_wizardcrpages_webfunc_2' => '\TYPO3\CMS\WizardCrpages\Controller\CreatePagesWizardModuleFunctionController',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'tx_wizardsortpages_webfunc_2' => '\TYPO3\CMS\WizardSortPages\View\SortPagesWizardModuleFunction',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Workspaces_Controller_AbstractController' => '\TYPO3\CMS\Workspaces\Controller\AbstractController',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Workspaces_Controller_PreviewController' => '\TYPO3\CMS\Workspaces\Controller\PreviewController',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Workspaces_Controller_ReviewController' => '\TYPO3\CMS\Workspaces\Controller\ReviewController',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Workspaces_Domain_Model_CombinedRecord' => '\TYPO3\CMS\Workspaces\Domain\Model\CombinedRecord',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Workspaces_Domain_Model_DatabaseRecord' => '\TYPO3\CMS\Workspaces\Domain\Model\DatabaseRecord',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Workspaces_ExtDirect_AbstractHandler' => '\TYPO3\CMS\Workspaces\ExtDirect\AbstractHandler',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Workspaces_ExtDirect_ActionHandler' => '\TYPO3\CMS\Workspaces\ExtDirect\ActionHandler',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Workspaces_ExtDirect_Server' => '\TYPO3\CMS\Workspaces\ExtDirect\ExtDirectServer',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Workspaces_ExtDirect_MassActionHandler' => '\TYPO3\CMS\Workspaces\ExtDirect\MassActionHandler',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Workspaces_ExtDirect_PagetreeCollectionsProcessor' => '\TYPO3\CMS\Workspaces\ExtDirect\PagetreeCollectionsProcessor',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Workspaces_ExtDirect_ToolbarMenu' => '\TYPO3\CMS\Workspaces\ExtDirect\ToolbarMenu',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Workspaces_ExtDirect_WorkspaceSelectorToolbarItem' => '\TYPO3\CMS\Workspaces\ExtDirect\WorkspaceSelectorToolbarItem',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Workspaces_Service_Befunc' => '\TYPO3\CMS\Workspaces\Hook\BackendUtilityHook',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Workspaces_Service_Tcemain' => '\TYPO3\CMS\Workspaces\Hook\DataHandlerHook',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Workspaces_Service_Fehooks' => '\TYPO3\CMS\Workspaces\Hook\TypoScriptFrontendControllerHook',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Workspaces_Service_AutoPublish' => '\TYPO3\CMS\Workspaces\Service\AutoPublishService',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Workspaces_Service_GridData' => '\TYPO3\CMS\Workspaces\Service\GridDataService',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Workspaces_Service_History' => '\TYPO3\CMS\Workspaces\Service\HistoryService',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Workspaces_Service_Integrity' => '\TYPO3\CMS\Workspaces\Service\IntegrityService',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Workspaces_Service_Stages' => '\TYPO3\CMS\Workspaces\Service\StagesService',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Workspaces_Service_Workspaces' => '\TYPO3\CMS\Workspaces\Service\WorkspaceService',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Workspaces_Service_AutoPublishTask' => '\TYPO3\CMS\Workspaces\Task\AutoPublishTask',
		/**
		 * @deprecated since 6.0 will be removed in 7.0
		 */
		'Tx_Workspaces_Service_CleanupPreviewLinkTask' => '\TYPO3\CMS\Workspaces\Task\CleanupPreviewLinkTask'
	);

	/**
	 * Get Class Alias Map
	 * @return array
	 */
	public function getClassAliasMap() {
		return $this->classAliasMap;
	}

	/**
	 * Get Legacy Class Map
	 *
	 * @return array
	 */
	public function getLegacyClasses() {
		return $this->legacyClasses;
	}
}