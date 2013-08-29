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
 * Class Tx_Smoothmigration_Migrations_Core_CallToDeprecatedStaticMethods_Processor
 *
 * @author Michiel Roos
 */
class Tx_Smoothmigration_Migrations_Core_CallToDeprecatedStaticMethods_Processor implements Tx_Smoothmigration_Domain_Interface_MigrationProcessor {

	/**
	 * @var Tx_Smoothmigration_Domain_Repository_DeprecationRepository
	 */
	protected $deprecationRepository;

	/**
	 * Inject the deprecation repository
	 *
	 * @param Tx_Smoothmigration_Domain_Repository_DeprecationRepository $deprecationRepository
	 * @return void
	 */
	public function injectDeprecationRepository(Tx_Smoothmigration_Domain_Repository_DeprecationRepository $deprecationRepository) {
		$this->deprecationRepository = $deprecationRepository;
	}

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
	 * @var Tx_Smoothmigration_Domain_Model_Issue[]
	 */
	protected $issues = array();

	/**
	 * @return void
	 */
	public function execute() {
	}

	/**
	 * @return boolean
	 */
	public function hasIssues() {
		return count($this->issues) > 0;
	}

	/**
	 * @return Tx_Smoothmigration_Domain_Model_Issue[]
	 */
	public function getIssues() {
		return $this->issues;
	}

}

?>