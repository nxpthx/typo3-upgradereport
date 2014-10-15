<?php
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2014 Tizian Schmidlin <st@cabag.ch>
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
 * Class Tx_Smoothmigration_Migrations_Core_RequireOnceInExtension_Definition
 *
 * @author Tizian Schmidlin
 */
class Tx_Smoothmigration_Migrations_Core_Xclasses_Definition extends Tx_Smoothmigration_Migrations_AbstractMigrationDefinition {

	/**
	 * @return Tx_Smoothmigration_Domain_Interface_MigrationProcessor
	 */
	public function getProcessor() {
		return $this->objectManager->get('Tx_Smoothmigration_Migrations_Core_Xclasses_Processor', $this);
	}

	/**
	 * @return void
	 */
	public function getResultAnalyzer() {
	}

	/**
	 * Returns an MigrationIdentifier
	 * Has to be unique
	 *
	 * @return string
	 */
	public function getIdentifier() {
		return 'typo3-core-code-xclasses';
	}

	/**
	 * Get a key to identify the migration for CLI usage (a short version of the identifier)
	 *
	 * @return string
	 */
	public function getCliKey() {
		return 'xclasses';
	}

}

?>
