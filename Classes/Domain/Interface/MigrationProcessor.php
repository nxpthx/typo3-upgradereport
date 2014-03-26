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
 * Interface Tx_Smoothmigration_Domain_Interface_MigrationProcessor
 *
 * @author Michiel Roos
 */
interface Tx_Smoothmigration_Domain_Interface_MigrationProcessor extends Tx_Smoothmigration_Domain_Interface_Processor {

	/**
	 * @param Tx_Smoothmigration_Domain_Interface_Migration $migration
	 */
	public function __construct(Tx_Smoothmigration_Domain_Interface_Migration $migration);

    /**
     * Set the MigrationMessageManager
     *
     * @param Tx_Smoothmigration_Migrations_MigrationMessageManager $manager
     * @return void
     */
    public function setMigrationMessageManager(Tx_Smoothmigration_Migrations_MigrationMessageManager $manager);
}

?>