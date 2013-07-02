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
 * Class Tx_Upgradereport_Controller_ReportController
 */
class Tx_Upgradereport_Controller_AjaxController extends Tx_Extbase_MVC_Controller_ActionController {

	/**
	 * @var Tx_Upgradereport_Domain_Repository_IssueRepository {
	 */
	protected $issueRepository;

	public function injectIssueRepository(Tx_Upgradereport_Domain_Repository_IssueRepository $issueRepository) {
		$this->issueRepository = $issueRepository;
	}

	/**
	 * Initializes the controller before invoking an action method.
	 *
	 * @return void
	 */
	protected function initializeAction() {
		parent::initializeAction();
		$this->response->setHeader('Content-type', 'application/json');
	}

	/**
	 * @param string $checkIdentifier
	 *
	 * @return string
	 */
	public function runTestAction($checkIdentifier) {
		$registry = Tx_Upgradereport_Service_Check_Registry::getInstance();
		$check = $registry->getActiveCheckByIdentifier($checkIdentifier);

		// prepare Issue object to persist test results
		$issue = t3lib_div::makeInstance('Tx_Upgradereport_Domain_Model_Issue');
		$this->issueRepository->add($issue);

		if ($check !== NULL) {
			$processor = $check->getProcessor();
			$processor->executeCheck();

			$issues = array();
			foreach ($processor->getIssues() as $issue) {
				$issues[] = array(
					'explenation' => $check->getResultAnalyzer()->getExplanation($issue),
					'solution' => $check->getResultAnalyzer()->getSolution($issue)
				);
			}
			return json_encode(array(
				'result' => 'OK',
				'issueCount' => count($processor->getIssues()),
				'issues' => $issues
			));
		} else {
			$this->response->setStatus(404, 'Check not found');
			return json_encode(array('result' => 'ERROR'));
		}

	}
}


if (defined('TYPO3_MODE') && isset($GLOBALS['TYPO3_CONF_VARS'][TYPO3_MODE]['XCLASS']['ext/upgradereport/Classes/Controller/AjaxController.php'])) {
	include_once($GLOBALS['TYPO3_CONF_VARS'][TYPO3_MODE]['XCLASS']['ext/upgradereport/Classes/Controller/AjaxController.php']);
}

?>