<?php
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2013 Steffen Ritter, rs websystems (steffen.ritter@typo3.org)
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
 * Class Tx_Smoothmigration_Controller_ReportController
 */
class Tx_Smoothmigration_Controller_ReportController extends Tx_Smoothmigration_Controller_AbstractModuleController {

	/**
	 * @var Tx_Smoothmigration_Domain_Repository_IssueRepository {
	 */
	protected $issueRepository;

	/**
	 * @param Tx_Smoothmigration_Domain_Repository_IssueRepository $issueRepository
	 */
	public function injectIssueRepository(Tx_Smoothmigration_Domain_Repository_IssueRepository $issueRepository) {
		$this->issueRepository = $issueRepository;
	}

	/**
	 * Index action, displays the available checks
	 *
	 * @return void
	 */
	public function indexAction() {
		/** @var Tx_Smoothmigration_Service_Check_Registry $checkRegistry */
		$checkRegistry = $this->objectManager->get('Tx_Smoothmigration_Service_Check_Registry');
		$this->view->assign('checks', $checkRegistry->getActiveChecks());
		$this->view->assign('issuesByCheck', $this->issueRepository->findAllGroupedByInspection());
	}

	/**
	 * Overview of repot actions
	 *
	 * @return void
	 */
	public function reportOverviewAction() {
		$this->view->assign('issueCount', $this->issueRepository->findAll()->count());
	}

	/**
	 * Show action, Shows the report
	 * FIXME: Maybe rename this action to showHtmlReport or something more descriptive
	 *
	 * @return void
	 */
	public function showAction() {
		$this->view->assign('issueCount', $this->issueRepository->findAll()->count());
		$this->view->assign('groupedIssues', $this->issueRepository->findAllGroupedByExtensionAndInspection());
	}

	/**
	 * Initializes the controller before invoking an action method.
	 *
	 * @return void
	 */
	protected function initializeAction() {
		parent::initializeAction();

		$this->pageRenderer->addJsFile($this->backPath . '../t3lib/js/extjs/ux/flashmessages.js');

		$resourcePath = t3lib_extMgm::extRelPath('smoothmigration') . 'Resources/Public/JavaScript/';

		$this->pageRenderer->addCssFile($resourcePath . 'gridfilters/css/GridFilters.css');

		$jsFiles = array();

		foreach ($jsFiles as $jsFile) {
			$this->pageRenderer->addJsFile($resourcePath . $jsFile);
		}
	}
}


if (defined('TYPO3_MODE') && isset($GLOBALS['TYPO3_CONF_VARS'][TYPO3_MODE]['XCLASS']['ext/smoothmigration/Classes/Controller/ReviewController.php'])) {
	include_once($GLOBALS['TYPO3_CONF_VARS'][TYPO3_MODE]['XCLASS']['ext/smoothmigration/Classes/Controller/ReviewController.php']);
}

?>