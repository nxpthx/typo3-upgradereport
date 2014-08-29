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
				COUNT(tt_content.uid) as contentCount,
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
					'count' => intval($row['contentCount']),
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
}
