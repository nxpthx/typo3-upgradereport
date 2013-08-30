<?php
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2013 Peter Beernink <p.beernink@drecomm.nl>
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
 * Class Tx_Smoothmigration_Service_Migration_Registry
 *
 * @author Peter Beernink
 */
class Tx_Smoothmigration_Service_Migration_Registry implements t3lib_Singleton {

	protected $registeredMigrations = array();


	/**
	 * @param string $className
	 * @return void
	 */
	public function registerMigration($className) {
		if (class_exists($className) && in_array('Tx_Smoothmigration_Domain_Interface_Migration', class_implements($className))) {
			$this->registeredMigrations[] = $className;
		}
	}


	/**
	 * @param array $classNames
	 * @return void
	 */
	public function registerMigrations(array $classNames) {
		foreach ($classNames as $className) {
			$this->registerMigration($className);
		}
	}

	/**
	 * Returns Instances of all registered migrations which apply to this instance.
	 *
	 * @return Tx_Smoothmigration_Domain_Interface_Migration[]
	 */
	public function getActiveMigrations() {
		$activeMigrations = array();
		/** @var Tx_Smoothmigration_Service_RequirementsAnalyzer $requirementsAnalyzer */
		$requirementsAnalyzer = t3lib_div::makeInstance('Tx_Smoothmigration_Service_RequirementsAnalyzer');

		foreach ($this->registeredMigrations as $className) {
			/** @var Tx_Smoothmigration_Domain_Interface_Migration $check */
			$migration = t3lib_div::makeInstance($className);
			if ($requirementsAnalyzer->isActive($migration)) {
				$activeMigrations[] = $migration;
			}
		}

		return $activeMigrations;
	}

	/**
	 * @param $searchedIdentifier
	 *
	 * @return null|Tx_Smoothmigration_Domain_Interface_Migration
	 */
	public function getActiveMigrationByIdentifier($searchedIdentifier) {
		$migrations = $this->getActiveMigrations();
		foreach ($migrations as $migration) {
			if ($migration->getIdentifier() == $searchedIdentifier) {
				return $migration;
			}
		}
		return NULL;
	}

	/**
	 * @param $cliKey
	 *
	 * @return null|Tx_Smoothmigration_Domain_Interface_Migration
	 */
	public function getActiveMigrationByCliKey($cliKey) {
		$migrations = $this->getActiveMigrations();
		foreach ($migrations as $migration) {
			if ($migration->getCliKey() == $cliKey) {
				return $migration;
			}
		}
		return NULL;
	}

	/**
	 * @return Tx_Smoothmigration_Service_Check_Registry
	 */
	public static function getInstance() {
		return t3lib_div::makeInstance('Tx_Smoothmigration_Service_Migration_Registry');
	}
}

?>