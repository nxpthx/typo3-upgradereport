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
 * Created by PhpStorm.
 * Author: Michiel Roos <michiel@maxserv.nl>
 * Date: 21/08/14
 * Time: 10:36
 */

/**
 * Tca userFunction
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License,
 * version 3 or later
 */
class Tx_smoothmigration_UserFunctions_Tca {
	/**
	 * deprecation title
	 *
	 * @param object $parameters
	 * @param object $parentObject
	 *
	 * @return void
	 */
	public function deprecationTitle(&$parameters, $parentObject) {
		$titleLength = $GLOBALS['BE_USER']->uc['titleLen'] ? $GLOBALS['BE_USER']->uc['titleLen'] : 30;
		$record = t3lib_BEfunc::getRecord($parameters['table'], $parameters['row']['uid']);
		$newTitle = $record['file'] . ': ' . $record['class'];
		$parameters['title'] = htmlspecialchars(t3lib_div::fixed_lgd_cs($newTitle, $titleLength));
	}

	/**
	 * issue title
	 *
	 * @param object $parameters
	 * @param object $parentObject
	 *
	 * @return void
	 */
	public function issueTitle(&$parameters, $parentObject) {
		$titleLength = $GLOBALS['BE_USER']->uc['titleLen'] ? $GLOBALS['BE_USER']->uc['titleLen'] : 30;
		$record = t3lib_BEfunc::getRecord($parameters['table'], $parameters['row']['uid']);
		$newTitle = $record['extension'] . ': ' . $record['inspection'];
		$parameters['title'] = htmlspecialchars(t3lib_div::fixed_lgd_cs($newTitle, $titleLength));
	}
}
