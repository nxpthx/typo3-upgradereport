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
 * Class Tx_Smoothmigration_Utility_DatabaseUtility
 */
class Tx_Smoothmigration_Utility_DatabaseUtility implements t3lib_Singleton {

	/**
	 * Number of tree levels - 1
	 * Node count from globe to leaf - 1
	 */
	const MAX_RECURSION_LEVELS = 7;

	/**
	 * Get child id's of a page $level levels deep
	 *
	 * @param $level
	 * @param $q
	 * @return string The query to find child id's
	 */
	private function getChildIds($level, $q) {
		$GLOBALS['TYPO3_DB']->sql_query('INSERT INTO temp_child_ids (pid, doktype) ' . $q . ';');
		if ($level !== 0) {
			$lowerLevel = $level - 1;
			$q = 'SELECT l' . $level . '.uid, l' . $level . '.doktype
				FROM pages AS l' . $level . '
				INNER JOIN (' . $q . ')
					AS l' . $lowerLevel . '
					ON l' . $lowerLevel . '.uid = l' . $level . '.pid';
			$level--;
			return self::getChildIds($level, $q);
		}
		return $q;
	}

	/**
	 * Get an array of child pages of a certain page
	 * The result set does not include the starting page
	 *
	 * @param int $pageUid
	 * @param int $limit
	 * @return array
	 */
	public static function getChildPagesArray($pageUid, $limit) {

		$treeList = array();

		$GLOBALS['TYPO3_DB']->sql_query('DROP TABLE IF EXISTS temp_child_ids;');
		$GLOBALS['TYPO3_DB']->sql_query('CREATE TEMPORARY TABLE temp_child_ids (pid INT unsigned DEFAULT 0, doktype TINYINT unsigned DEFAULT 0);');

		$query = 'SELECT l0.uid, l0.doktype FROM pages AS l0 WHERE l0.pid = ' . $pageUid;

		self::getChildIds(self::MAX_RECURSION_LEVELS, $query);
		$res = $GLOBALS['TYPO3_DB']->sql_query('SELECT pid FROM temp_child_ids WHERE NOT doktype IN(3,6,199,254,255) ');
		$i = 0;
		while ($row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res)) {
			$treeList[] = $row['pid'];
			$i++;
			if ($i >= $limit) {
				break;
			}
		}

		$GLOBALS['TYPO3_DB']->sql_free_result($res);

		$GLOBALS['TYPO3_DB']->sql_query('DROP TABLE IF EXISTS temp_child_ids;');

		return $treeList;
	}

	/**
	 * Find pages with plugins objects
	 *
	 * @param array $contentTypes
	 * @param array $listTypes
	 *
	 * @return array
	 */
	public static function getPagesWithContentElements($contentTypes = array(), $listTypes = array()) {
		$pages = array();

		$query = '
			SELECT DISTINCT
				pages.uid as pageUid,
				pages.title,
				tt_content.uid as contentUid,
				tt_content.CType,
				tt_content.list_type
			FROM pages
			JOIN tt_content ON pages.uid = tt_content.pid
			WHERE';

		if (count($listTypes)) {
			$query .= ' tt_content.list_type IN ("' . implode('","', $listTypes) . '")';
		}
		if (count($listTypes) && count($contentTypes)) {
			$query .= ' OR ';
		}
		if (count($contentTypes)) {
			$query .= ' tt_content.CType IN ("' . implode('","', $contentTypes) . '")';
		}
		$query .= '
			AND tt_content.deleted =0 AND tt_content.hidden =0
			AND pages.deleted =0 AND pages.hidden =0
			ORDER BY CType, list_type, pageUid, contentUid, title
		';

		$res = $GLOBALS['TYPO3_DB']->sql_query($query);

		while (($row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res))) {
			if (is_array($row)) {
				$pages[] = array(
					'pageUid' => intval($row['pageUid']),
					'contentUid' => intval($row['contentUid']),
					'title' => $row['title'],
					'list_type' => $row['list_type'],
					'CType' => $row['CType']
				);
			}
		}

		$GLOBALS['TYPO3_DB']->sql_free_result($res);

		return $pages;
	}

	/**
	 * Get an array of page id's that are marked as being a site root.
	 *
	 * @return array
	 */
	public static function getSiteRoots() {
		return $GLOBALS['TYPO3_DB']->exec_SELECTgetRows(
			'uid, title',
			'pages',
			'is_siteroot = 1 AND deleted = 0 AND hidden = 0 AND pid != -1',
			'', '', '',
			'uid'
		);
	}

	/**
	 * Get the domain record for a given page id
	 *
	 * @param int $pid
	 * @return array
	 */
	public static function getDomainRecords($pid) {
		return $GLOBALS['TYPO3_DB']->exec_SELECTgetRows(
			'domainName',
			'sys_domain',
			'hidden = 0 AND pid = ' . (int) $pid,
			'', 'sorting'
		);
	}
}
