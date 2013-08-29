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
class Tx_Smoothmigration_Checks_Dam_CallToDamClasses_Processor implements Tx_Smoothmigration_Domain_Interface_CheckProcessor {

	/**
	 * Array of all deprecated static methods
	 *
	 * @var array
	 */
	protected $damClasses  = array(
		'tx_dam_list_thumbs',
		'tx_dam_file_list',
		'tx_dam_browse_category',
		'tx_dam_treebrowser',
		'tx_dam_cmd_filedelete',
		'tx_dam_cmd',
		'tx_dam_cmd_nothing',
		'tx_dam_cmd_folderdelete',
		'tx_dam_cmd_filereplace',
		'tx_dam_cmd_foldernew',
		'tx_dam_cmd_filenew',
		'tx_dam_cmd_filerename',
		'tx_dam_cmd_filecopy',
		'tx_dam_cmd_filemove',
		'tx_dam_cmd_filecopymove',
		'tx_dam_cmd_folderrename',
		'tx_dam_tools_indexupdate',
		'tx_dam_list_list',
		'tx_dam_tools',
		'tx_dam_mainnavframe',
		'tx_dam_mod_file',
		'tx_dam_tools_config',
		'tx_dam_tsfeimgtag',
		'tx_dam_softrefproc',
		'tx_dam_show_item',
		'tx_dam_cm_record',
		'tx_dam_cm_file',
		'tx_dam_tsfemediatag',
		'tx_dam_browselinkshooks',
		'tx_dam_medialinkhandler',
		'tx_dam_rtetransform_ahref',
		'tx_dam_rtetransform_mediatag',
		'tx_dam_mediawizarddamprovider',
		'tx_dam_tce_process',
		'tx_dam_tce_languagehotlist',
		'tx_dam_tce_filetracking',
		'tx_dam_tce_extfilefunc',
		'tx_dam_tools_indexsetup',
		'tx_dam_mod_info',
		'tx_dam_edit',
		'tx_dam_edit_text',
		'tx_dam_treelib_tceforms',
		'tx_dam_treelib_elementbrowser',
		'tx_dam_treelib_browser',
		'tx_dam_treelib_ebtreeview',
		'tx_dam_rtehtmlarea_select_image',
		'tx_dam_rtehtmlarea_browse_links',
		'tx_dam_rtehtmlarea_browse_media',
		'tx_dam_multiaction_recordBase',
		'tx_dam_multiaction_hideRec',
		'tx_dam_multiaction_unHideRec ',
		'tx_dam_multiaction_deleteRec ',
		'tx_dam_multiaction_copyRec',
		'tx_dam_multiaction_moveRec',
		'tx_dam_multiActionsRecord',
		'tx_dam_selectionIndexRun',
		'tx_dam_action_newTextfile',
		'tx_dam_action_editFileRecord',
		'tx_dam_action_viewFile',
		'tx_dam_action_infoFile',
		'tx_dam_action_renameFile',
		'tx_dam_action_replaceFile',
		'tx_dam_action_deleteFile',
		'tx_dam_action_deleteFileQuick',
		'tx_dam_action_editFile',
		'tx_dam_action_copyFile',
		'tx_dam_action_moveFile',
		'tx_dam_actionsFile',
		'tx_dam_selectionCategory',
		'tx_dam_previewerMP3',
		'tx_dam_index_rules',
		'tx_dam_index_rule_recursive',
		'tx_dam_index_rule_folderAsCat',
		'tx_dam_index_rule_doReindexing',
		'tx_dam_index_rule_dryRun extends',
		'tx_dam_index_rule_titleFromFilename',
		'tx_dam_index_rule_devel',
		'tx_dam_dbTriggerMediaTypes',
		'tx_dam_previewerImage',
		'tx_dam_selectionFolder',
		'tx_dam_selectionMeTypes',
		'tx_dam_multiaction_fileBase',
		'tx_dam_multiaction_deleteFile',
		'tx_dam_multiaction_copyFile',
		'tx_dam_multiaction_moveFile',
		'tx_dam_multiActionsFile',
		'tx_dam_action_recordBase',
		'tx_dam_action_cmSubFile',
		'tx_dam_action_editRec',
		'tx_dam_action_localizeRec',
		'tx_dam_action_editRecPopup',
		'tx_dam_action_viewFileRec',
		'tx_dam_action_infoRec',
		'tx_dam_action_revertRec',
		'tx_dam_action_hideRec',
		'tx_dam_action_deleteRec',
		'tx_dam_action_deleteQuickRec',
		'tx_dam_action_renameFileRec',
		'tx_dam_action_replaceFileRec',
		'tx_dam_action_lockWarningRec',
		'tx_dam_action_editFileRec',
		'tx_dam_actionsRecord',
		'tx_dam_selectionStatus',
		'tx_dam_action_newFolder',
		'tx_dam_action_renameFolder',
		'tx_dam_action_deleteFolder',
		'tx_dam_actionsFolder',
		'tx_dam_selectionRecords',
		'tx_dam_selectionStringSearch',
		'tx_dam_browse_media',
		'tx_dam_mainnavframe',
		'tx_dam_list_batch',
		'tx_dam_info_reference',
		'tx_dam_tools_mimetypes',
		'tx_dam_list_editsel',
		'tx_dam_upload_status',
		'tx_dam_file_upload',
		'tx_dam_browse_folder',
		'tx_dam_batchProcess',
		'tx_dam_sysfolder',
		'tx_dam_listPointer',
		'tx_dam_tcaFunc',
		'tx_dam_tceFunc',
		'tx_dam_browseTrees',
		'tx_dam_iterator_dir',
		'tx_dam_SCbase',
		'tx_dam_iterator_base',
		'tx_dam_indexing',
		'tx_dam',
		'tx_dam_db',
		'tx_dam_guiRenderList',
		'tx_dam_tsfe',
		'tx_dam_selBrowseTree',
		'tx_dam_browseTree',
		'tx_dam_selProcBase',
		'tx_dam_iterator_references',
		'tx_dam_editorBase',
		'tx_dam_indexRuleBase',
		'tx_dam_media',
		'tx_dam_listbase',
		'tx_dam_actionBase',
		'tx_dam_querygen',
		'tx_dam_selection',
		'tx_dam_config',
		'tx_dam_listrecords',
		'tx_dam_navframe',
		'tx_dam_listreferences',
		'tx_dam_iterator_db_lang_ovl',
		'tx_dam_extFileFunctions',
		'tx_dam_tce_file',
		'tx_dam_guiFunc',
		'tx_dam_actionCall',
		'tx_dam_allowdeny',
		'tx_dam_allowdeny_list',
		'tx_dam_selStorage',
		'tx_dam_iterator_db',
		'tx_dam_image',
		'tx_dam_listfiles',
		'tx_dam_previewerProcBase',
		'tx_dam_filebrowser',
		'tx_dam_iterator_media',
		'tx_dam_simpleForms',
		'tx_dam_selectionQuery',
		'tx_damcatedit_deletehook',
		'tx_damcatedit_cmd_new',
		'tx_damcatedit_mod_cmd',
		'tx_damcatedit_cmd_nothing',
		'tx_damcatedit_movehook',
		'tx_damcatedit_newedithook',
		'tx_damcatedit_module1',
		'tx_damcatedit_navframe',
		'tx_dam_db_list',
		'tx_damcatedit_positionMap',
		'tx_damcatedit_db',
		'tx_damcatedit_cm'
	);

	/**
	 * @var Tx_Smoothmigration_Checks_Dam_CallToDamClasses_Definition
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
	public function execute() {
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
		foreach ($this->damClasses as $damClass) {
			$regularExpression[] = '(' . $damClass . '\:\:\w+)';							// satic call
			$regularExpression[] = '(makeInstance\((\"|\')' . $damClass . '(\"|\')\))';		// makeInstance call
			$regularExpression[] = '(new\s+' . $damClass . '\s*\;)';						// new-call
		}
		return implode('|', $regularExpression);
	}


}

?>