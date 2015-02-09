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
	 *
	 * @return void
	 */
	public function injectIssueRepository(Tx_Smoothmigration_Domain_Repository_IssueRepository $issueRepository) {
		$this->issueRepository = $issueRepository;
	}

	/**
	 * Checks action, displays the available checks
	 *
	 * @return void
	 */
	public function checksAction() {
		/** @var Tx_Smoothmigration_Service_Check_Registry $checkRegistry */
		$checkRegistry = $this->objectManager->get('Tx_Smoothmigration_Service_Check_Registry');
		$activeChecks = $checkRegistry->getActiveChecks();
		$this->view->assign('checks', $activeChecks);
		$this->view->assign('issuesByCheck', $this->issueRepository->findAllGroupedByInspection($activeChecks));
		$this->view->assign('moduleToken', $this->moduleToken);
	}

	/**
	 * Extension action, displays extension report
	 *
	 * @return void
	 */
	public function extensionAction() {
		$values = array();

		// FIXME: It's unclear to me how to get this value programmatically
		// There is a getArgumentPrefix method, but that only applies to widgets
		$values['argumentPrefix'] = 'tx_smoothmigration_tools_smoothmigrationsmoothmigration';

		// List of frontend extensions
		$loadedExtensions = Tx_Smoothmigration_Utility_ExtensionUtility::getFrontendExtensions(FALSE);
		$this->view->assign('loadedExtensions', $loadedExtensions);

		$selectedExtension = '';
		if ($this->request->hasArgument('extension')) {
			$selectedExtension = $this->request->getArgument('extension');
		}

		// List of sites
		$sites = Tx_Smoothmigration_Utility_DatabaseUtility::getSiteRoots();
		$selectSites = array();
		foreach ($sites as $siteUid => $siteData) {
			$selectSites[$siteUid] = $siteUid . ': ' . $siteData['title'];
		}
		$values['sites'] = $selectSites;

		$selectedSite = '';
		if ($this->request->hasArgument('site')) {
			$selectedSite = $this->request->getArgument('site');
			$values['selectedSite'] = $selectedSite;
		}

		if ($selectedSite && $selectedExtension != 1) {
			// Get TypoScript configuration for selected site
			if (count($sites) && $selectedSite) {
				$tmpl = t3lib_div::makeInstance('t3lib_tsparser_ext');
				$tmpl->tt_track = 0;
				$tmpl->init();
				$tmpl->runThroughTemplates(t3lib_BEfunc::BEgetRootLine((int)$selectedSite, 'AND 1=1'), 0);
				$tmpl->generateConfig();
			}

			// Fetch correct class names
			$correctClassNames = array();
			if ($selectedExtension) {
				$correctClassNames[$selectedExtension] = t3lib_extMgm::getCN($selectedExtension);
			} else {
				$extensionKeys = Tx_Smoothmigration_Utility_ExtensionUtility::getLoadedExtensions();
				foreach ($extensionKeys as $key) {
					$correctClassNames[$key] = t3lib_extMgm::getCN($key);
				}
			}

			$listTypes = array();
			$values['plugins'] = array();
			// For all the root plugin objects in the plugin array
			foreach ($tmpl->setup['plugin.'] as $name => $_) {
				$name = rtrim($name, '.');
				// Store the matching extension key with the plugin name
				foreach ($correctClassNames as $key => $className) {
					if (strstr($name, $className)) {
						$values['plugins'][$name] = $key;
						$suffix = str_replace($className, '', $name);
						$listTypes[] = $key . $suffix;
					}
				}
			}
			asort($values['plugins']);

			$pluginNames = array_keys($values['plugins']);

			// This catches Powermail which has it's own ctype which it calls powermail_pi1
			$values['cTypes'] = array();
			foreach ($pluginNames as $name) {
				array_push($values['cTypes'], str_replace('tx_', '', $name));
			}

			// Fetch list types, initialize with legacy tt_news list_type: 9
			$values['listTypes'] = array();
			if ($selectedExtension === 'tt_news') {
				$values['listTypes'] = array('9');
			}
			foreach ($tmpl->setup['tt_content.']['list.']['20.'] as $listType => $_) {
				if (preg_match('/^[^.]+$/', $listType)) {
					foreach ($values['plugins'] as $correctedClassName) {
						if (preg_match('/^' . $correctedClassName .'/', $listType)) {
							$values['listTypes'][] = $listType;
						}
					}
				}
			}
			asort($values['listTypes']);

			$values['pages'] = array();
			if (count($values['listTypes']) || count($values['cTypes'])) {
				$values['pages'] =
					Tx_Smoothmigration_Utility_DatabaseUtility::getPagesWithContentElements($values['cTypes'], $values['listTypes']);
			}

			$pages = array();
			foreach ($values['pages'] as $page) {
				$this->setInPageArray(
					$pages,
					t3lib_BEfunc::BEgetRootLine($page['pageUid'], 'AND 1=1'),
					$page
				);
			}

			$lines = array();
			$lines[] = '<tr class="t3-row-header">
				<td nowrap>Page title</td>
				<td nowrap>' . $GLOBALS['LANG']->getLL('isExt') . '</td>
				</tr>';
			$lines = array_merge($lines, $this->renderList($pages));

			$values['table'] = '<table border="0" cellpadding="0" cellspacing="1" id="ts-overview">' . implode('', $lines) . '</table>';
		}

		$this->view->assignMultiple($values);
		$this->view->assign('selectedExtension', $selectedExtension);
		$this->view->assign('moduleToken', $this->moduleToken);
	}

	/**
	 * Overview of report actions
	 *
	 * @return void
	 */
	public function reportOverviewAction() {
		$this->view->assign('issueCount', $this->issueRepository->findAll()->count());
		$this->view->assign('moduleToken', $this->moduleToken);
	}

	/**
	 * Show action, Shows the report
	 *
	 * @return void
	 */
	public function showAction() {
		// Set a default site root so we can link to the extension usage report
		$sites = Tx_Smoothmigration_Utility_DatabaseUtility::getSiteRoots();
		$defaultSite = array_shift($sites);
		$this->view->assign('site', $defaultSite['uid']);
		$this->view->assign('issueCount', $this->issueRepository->findAll()->count());
		$this->view->assign('groupedIssues', $this->issueRepository->findAllGroupedByExtensionAndInspection());
		$this->view->assign('moduleToken', $this->moduleToken);
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

		//$this->pageRenderer->addCssFile($resourcePath . 'gridfilters/css/GridFilters.css');

		$jsFiles = array();

		foreach ($jsFiles as $jsFile) {
			$this->pageRenderer->addJsFile($resourcePath . $jsFile);
		}
	}

	/**
	 * Populate the pages array
	 * Ugly code taken from \SC_mod_web_ts_index
	 *
	 * @param $pages
	 * @param $rootLine
	 * @param $row
	 *
	 * @return void
	 */
	private function setInPageArray(&$pages, $rootLine, $row) {
		ksort($rootLine);
		reset($rootLine);
		if (!$rootLine[0]['uid']) {
			array_shift($rootLine);
		}

		$contentElement = current($rootLine);
		$pages[$contentElement['uid']] = htmlspecialchars($contentElement['title']);
		array_shift($rootLine);
		if (count($rootLine)) {
			if (!isset($pages[$contentElement['uid'] . '.'])) {
				$pages[$contentElement['uid'] . '.'] = array();
			}
			$this->setInPageArray($pages[$contentElement['uid'] . '.'], $rootLine, $row);
		} else {
			$pages[$contentElement['uid'] . '_'] = $row;
		}
	}

	/**
	 * Render the list of pages with plugins
	 * Ugly code taken from \SC_mod_web_ts_index
	 *
	 * @param $pages
	 * @param array $lines
	 * @param int $c
	 *
	 * @return array
	 */
	private function renderList($pages, $lines = array(), $c = 0) {
		if (is_array($pages)) {
			reset($pages);
			static $i;
			$isV4 = t3lib_div::int_from_ver(TYPO3_version) < 6002000;
			foreach ($pages as $k => $v) {
				if ($isV4) {
					$valueIsInt = t3lib_div::testInt($k);
				} else {
					$valueIsInt = \TYPO3\CMS\Core\Utility\MathUtility::canBeInterpretedAsInteger($k);
				}
				if ($valueIsInt) {
					if (isset($pages[$k . "_"])) {
						$lines[] = '<tr class="' . ($i++ % 2 == 0 ? 'bgColor4' : 'bgColor6') . '">
							<td nowrap><img src="clear.gif" width="1" height="1" hspace=' . ($c * 10) . ' align="top">' .
							'<a href="' . htmlspecialchars(t3lib_div::linkThisScript(array('id' => $k))) . '">' .
							t3lib_iconWorks::getSpriteIconForRecord('pages', t3lib_BEfunc::getRecordWSOL('pages', $k), array("title" => 'ID: ' . $k)) .
							t3lib_div::fixed_lgd_cs($pages[$k], 30) . '</a></td>
							<td align="center">' . ($pages[$k . '_']['root_min_val'] == 0 ? t3lib_iconWorks::getSpriteIcon('status-status-checked') : "&nbsp;") .
							'</td>
							</tr>';
					} else {
						$lines[] = '<tr class="' . ($i++ % 2 == 0 ? 'bgColor4' : 'bgColor6') . '">
							<td nowrap ><img src="clear.gif" width="1" height="1" hspace=' . ($c * 10) . ' align=top>' .
							t3lib_iconWorks::getSpriteIconForRecord('pages', t3lib_BEfunc::getRecordWSOL('pages', $k)) .
							t3lib_div::fixed_lgd_cs($pages[$k], 30) . '</td>
							<td align="center"></td>
							</tr>';
					}
					$lines = $this->renderList($pages[$k . '.'], $lines, $c + 1);
				}
			}
		}
		return $lines;
	}
}


if (defined('TYPO3_MODE') && isset($GLOBALS['TYPO3_CONF_VARS'][TYPO3_MODE]['XCLASS']['ext/smoothmigration/Classes/Controller/ReviewController.php'])) {
	include_once($GLOBALS['TYPO3_CONF_VARS'][TYPO3_MODE]['XCLASS']['ext/smoothmigration/Classes/Controller/ReviewController.php']);
}
