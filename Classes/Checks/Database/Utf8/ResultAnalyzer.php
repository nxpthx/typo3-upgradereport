<?php
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2013 Michiel Roos <michiel@maxserv.nl>
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
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * Class Tx_Smoothmigration_Checks_Database_Utf8_ResultAnalyzer
 *
 * @author Michiel Roos
 */
class Tx_Smoothmigration_Checks_Database_Utf8_ResultAnalyzer extends Tx_Smoothmigration_Checks_AbstractCheckResultAnalyzer {

	/**
	 * @param Tx_Smoothmigration_Domain_Model_Issue $issue
	 *
	 * @return string
	 */
	public function getExplanation(Tx_Smoothmigration_Domain_Model_Issue $issue) {
		return 'Incorrect database setting';
	}

	/**
	 * @param Tx_Smoothmigration_Domain_Model_Issue $issue
	 *
	 * @return string
	 */
	public function getSolution(Tx_Smoothmigration_Domain_Model_Issue $issue) {
		if (is_string($issue->getAdditionalInformation())) {
			$extraInformation = unserialize($issue->getAdditionalInformation());
		} else {
			$extraInformation = $issue->getAdditionalInformation();
		}
		switch ($extraInformation['type']) {
			case 'configuration':
				$result = $this->ll(
					'result.typo3-database-database-utf8.databaseServerSetting',
					array(
						$extraInformation['setting'],
						$extraInformation['actualValue'],
						$extraInformation['preferredValue']
					)
				);
				break;
			case 'tableCollation':
				$result = $this->ll(
					'result.typo3-database-database-utf8.databaseTableCollation',
					array(
						$extraInformation['tableName'],
						$extraInformation['tableCollation'],
						'utf8_general_ci'
					)
				);
				break;
			case 'columnCollation':
				$result = $this->ll(
					'result.typo3-database-database-utf8.databaseColumnCollation',
					array(
						$extraInformation['tableName'],
						$extraInformation['columnName'],
						$extraInformation['characterSetName'],
						$extraInformation['collationName']
					)
				);
				break;
			default:
				$result = '';
		}
		return $result;
	}
}

?>