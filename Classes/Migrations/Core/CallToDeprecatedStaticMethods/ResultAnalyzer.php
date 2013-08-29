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
 * Class Tx_Smoothmigration_Migrations_Core_CallToDeprecatedStaticMethods_ResultAnalyzer
 *
 * @author Michiel Roos
 */
class Tx_Smoothmigration_Migrations_Core_CallToDeprecatedStaticMethods_ResultAnalyzer implements Tx_Smoothmigration_Domain_Interface_MigrationResultAnalyzer {

	/**
	 * @var Tx_Smoothmigration_Migrations_Core_CallToDeprecatedStaticMethods_Definition
	 */
	protected $parentMigration;

	/**
	 * @param Tx_Smoothmigration_Domain_Interface_Migration $migration
	 */
	public function __construct(Tx_Smoothmigration_Domain_Interface_Migration $migration) {
		$this->parentMigration = $migration;
	}

	/**
	 * @param Tx_Smoothmigration_Domain_Model_Issue $issue
	 *
	 * @return string
	 */
	public function getSeverity(Tx_Smoothmigration_Domain_Model_Issue $issue) {
		return 0;
	}

	/**
	 * @param Tx_Smoothmigration_Domain_Model_Issue $issue
	 *
	 * @return string
	 */
	public function getExplanation(Tx_Smoothmigration_Domain_Model_Issue $issue) {
		return 'Call to deprecated static method';
	}

	/**
	 * @param Tx_Smoothmigration_Domain_Model_Issue $issue
	 *
	 * @return string
	 */
	public function getSolution(Tx_Smoothmigration_Domain_Model_Issue $issue) {
		return 'Replace the static method ' . substr($issue->getLocation()->getMatchedString(), 0, -1) . ' in ' . $issue->getLocation()->getFilePath() . ' on line ' . $issue->getLocation()->getLineNumber();
	}

	/**
	 * @param Tx_Smoothmigration_Domain_Model_Issue $issue
	 *
	 * @return string
	 */
	public function getRawTextForCopyPaste(Tx_Smoothmigration_Domain_Model_Issue $issue) {
		return '';
	}
}

?>