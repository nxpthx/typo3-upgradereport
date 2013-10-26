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
 * Class Tx_Smoothmigration_Checks_Core_Xclasses_ResultAnalyzer
 *
 * @author Steffen Ritter
 */
class Tx_Smoothmigration_Checks_Core_Xclasses_ResultAnalyzer extends Tx_Smoothmigration_Checks_AbstractCheckResultAnalyzer {

	/**
	 * @param Tx_Smoothmigration_Domain_Model_Issue $issue
	 *
	 * @return string
	 */
	public function getExplanation(Tx_Smoothmigration_Domain_Model_Issue $issue) {
		$information = $issue->getAdditionalInformation();
		return $this->ll(
			'result.typo3-core-code-xclasses.explanation',
			array(
				$information['IMPLEMENTATION_CLASS'],
				$information['ORIGINAL_CLASS']
			)
		);
	}

	/**
	 * @param Tx_Smoothmigration_Domain_Model_Issue $issue
	 *
	 * @return string
	 */
	public function getSolution(Tx_Smoothmigration_Domain_Model_Issue $issue) {
		$information = $issue->getAdditionalInformation();

		$originalClass = $information['ORIGINAL_CLASS'];
		$newClass = $information['IMPLEMENTATION_CLASS'];

		if (is_file($newClass)) {
			$pattern = '/^\s?class\s+([A-Za-z0-9_\\\\]+)\s+extends\s+([A-Za-z0-9_\\\\]+)/';
			foreach (new SplFileObject($newClass) as $lineContent) {
				$matches = array();
				if (preg_match($pattern, $lineContent, $matches)) {
					$newClass = $matches[1];
					$originalClass = $matches[2];
					break;
				}
			}
		}
		return $this->ll(
			'result.typo3-core-code-xclasses.solution',
			array(
				$issue->getLocation()->getPhysicalLocation()->getFilePath() .
				($issue->getLocation()->getPhysicalLocation()->getLineNumber() > -1 ?
					' line ' . $issue->getLocation()->getPhysicalLocation()->getLineNumber() :
					''),
				$originalClass,
				$newClass
			)
		);
	}

	/**
	 * @param Tx_Smoothmigration_Domain_Model_Issue $issue
	 *
	 * @return string
	 */
	public function getRawTextForCopyPaste(Tx_Smoothmigration_Domain_Model_Issue $issue) {
		$information = $issue->getAdditionalInformation();

		$originalClass = $information['ORIGINAL_CLASS'];
		$newClass = $information['IMPLEMENTATION_CLASS'];
		return $this->ll(
			'result.typo3-core-code-xclasses.raw',
			array(
				$originalClass,
				$newClass
			)
		);
	}

}

?>