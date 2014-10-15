<?php
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2013 Anja Leichsenring <anja.leichsenring@typo3.org>
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
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * An Issue Repository
 *
 */
class Tx_Smoothmigration_Domain_Repository_IssueRepository extends Tx_Extbase_Persistence_Repository {

	/**
	 * Find all grouped by inspection
	 *
	 * @param array $checks The checks to find inspections for
	 *
	 * @return array
	 */
	public function findAllGroupedByInspection($checks) {
		$issues = $this->findAll();
		$groups = array();
		/** @var Tx_Smoothmigration_Checks_AbstractCheckDefinition $check */
		foreach ($checks as $check) {
			$groups[$check->getIdentifier()] = array();
		}
		/** @var Tx_Smoothmigration_Domain_Model_Issue $issue */
		foreach ($issues as $issue) {
			if (!array_key_exists($issue->getInspection(), $groups)) {
				$groups[$issue->getInspection()] = array();
			}
			$groups[$issue->getInspection()][] = $issue;
		}

		// 4 -> SORT_NATURAL
		ksort($groups, 4);

		return $groups;
	}

	/**
	 * Find all issues by inspection and extensionkey
	 *
	 * @param string $inspection
	 * @param string $extensionKey
	 *
	 * @return array
	 */
	public function findByInspectionAndExtensionKey($inspection, $extensionKey) {
		$query = $this->createQuery();

		return $query->matching(
			$query->logicalAnd(
				$query->equals('inspection', $inspection),
				$query->equals('extension', $extensionKey)
			)
		)->execute();
	}

	/**
	 * Find all pending issues grouped by inspection
	 *
	 * @param string $inspection
	 *
	 * @return array
	 */
	public function findPendingByInspection($inspection) {
		$query = $this->createQuery();

		return $query->matching(
			$query->logicalAnd(
				$query->equals('inspection', $inspection),
				$query->logicalNot(
					$query->equals('migrationStatus', Tx_Smoothmigration_Domain_Interface_Migration::SUCCESS)
				)
			)
		)->execute();
	}

	/**
	 * Find all pending issues grouped by inspection
	 *
	 * @param string $inspection
	 * @param string $extensionKey
	 *
	 * @return array
	 */
	public function findPendingByInspectionAndExtensionKey($inspection, $extensionKey) {
		$query = $this->createQuery();

		return $query->matching(
			$query->logicalAnd(
				$query->equals('inspection', $inspection),
				$query->equals('extension', $extensionKey),
				$query->logicalNot(
					$query->equals('migrationStatus', Tx_Smoothmigration_Domain_Interface_Migration::SUCCESS)
				)
			)
		)->execute();
	}

	/**
	 * Find all grouped by extension and inspection
	 *
	 * @return array
	 */
	public function findAllGroupedByExtensionAndInspection() {
		$issues = $this->findAll();
		$groups = array();
		/** @var Tx_Smoothmigration_Domain_Model_Issue $issue */
		foreach ($issues as $issue) {
			if (!array_key_exists($issue->getExtension(), $groups)) {
				$groups[$issue->getExtension()] = array();
			}
			if (!array_key_exists($issue->getInspection(), $groups[$issue->getExtension()])) {
				$groups[$issue->getExtension()][$issue->getInspection()] = array();
			}
			$groups[$issue->getExtension()][$issue->getInspection()][] = $issue;
		}

		// 4 -> SORT_NATURAL
		ksort($groups, 4);

		return $groups;
	}

	/**
	 * Find by extension and group by inspection
	 *
	 * @param string $extensionKey
	 *
	 * @return array
	 */
	public function findByExtensionGroupedByInspection($extensionKey = '') {
		$issues = $this->findByExtension($extensionKey);
		$groups = array();
		/** @var Tx_Smoothmigration_Domain_Model_Issue $issue */
		foreach ($issues as $issue) {
			if (!array_key_exists($issue->getExtension(), $groups)) {
				$groups[$issue->getExtension()] = array();
			}
			if (!array_key_exists($issue->getInspection(), $groups[$issue->getExtension()])) {
				$groups[$issue->getExtension()][$issue->getInspection()] = array();
			}
			$groups[$issue->getExtension()][$issue->getInspection()][] = $issue;
		}

		// 4 -> SORT_NATURAL
		ksort($groups, 4);

		return $groups;
	}

	/**
	 * Add an issue
	 *
	 * @param Tx_Smoothmigration_Domain_Model_Issue $object
	 *
	 * @return void
	 */
	public function add($object) {
		if ($GLOBALS['TYPO3_DB']->exec_SELECTcountRows(
				'*',
				'tx_smoothmigration_domain_model_issue',
				'inspection = ' . $GLOBALS['TYPO3_DB']->fullQuoteStr($object->getInspection(), 'tx_smoothmigration_domain_model_issue') .
				' AND identifier = ' . $GLOBALS['TYPO3_DB']->fullQuoteStr($object->getIdentifier(), 'tx_smoothmigration_domain_model_issue')
			) == 0
		) {
			parent::add($object);
		}
	}

	/**
	 * Delete all by inspection
	 *
	 * @param string $inspection
	 *
	 * @return int   $issueCount   count of how many entries were deleted, -1
	 *    on error
	 */
	public function deleteAllByInspection($inspection) {
		$issueCount =
			$GLOBALS['TYPO3_DB']->exec_SELECTcountRows(
				'*',
				'tx_smoothmigration_domain_model_issue',
				'inspection = ' . $GLOBALS['TYPO3_DB']->fullQuoteStr($inspection, 'tx_smoothmigration_domain_model_issue')
			);
		if ($issueCount > 0) {
			if (!$GLOBALS['TYPO3_DB']->exec_DELETEquery(
				'tx_smoothmigration_domain_model_issue',
				'inspection = ' . $GLOBALS['TYPO3_DB']->fullQuoteStr($inspection, 'tx_smoothmigration_domain_model_issue')
			)
			) {
				return -1;
			}
		}

		return $issueCount;
	}

}
