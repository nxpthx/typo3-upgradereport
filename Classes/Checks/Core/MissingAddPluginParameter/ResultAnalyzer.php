<?php
/**
 *  Copyright notice
 *
 *  ⓒ 2014 Peter Kuehn <peter.kuehn@wmdb.de>
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
 * Class Tx_Smoothmigration_Checks_Core_MissingAddPluginParameter_ResultAnalyzer
 *
 * @author Peter Kuehn
 */
class Tx_Smoothmigration_Checks_Core_MissingAddPluginParameter_ResultAnalyzer
	extends Tx_Smoothmigration_Checks_AbstractCheckResultAnalyzer {

	/**
	 * @param Tx_Smoothmigration_Domain_Model_Issue $issue
	 *
	 * @return string
	 */
	public function getExplanation(Tx_Smoothmigration_Domain_Model_Issue $issue) {
		return $this->ll('result.typo3-core-code-missingaddpluginparameter.explanation');
	}

	/**
	 * @param Tx_Smoothmigration_Domain_Model_Issue $issue
	 *
	 * @return string
	 */
	public function getSolution(Tx_Smoothmigration_Domain_Model_Issue $issue) {
		if (method_exists($issue->getLocation(), 'getMinimumVersion')) {
			$minimumVersion = $issue->getLocation()->getMinimumVersion();
			$maximumVersion = $issue->getLocation()->getMaximumVersion();
		}
		return $this->ll(
			'result.typo3-core-code-missingaddpluginparameter.solution',
			array(
				$issue->getLocation()->getExtension(),
				$minimumVersion,
				$maximumVersion
			)
		);
	}

}
