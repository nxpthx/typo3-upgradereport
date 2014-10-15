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
 * Class Tx_Smoothmigration_Checks_Core_Namespace_Definition
 *
 * @author Michiel Roos
 */
class Tx_Smoothmigration_Checks_Core_Namespace_Processor extends Tx_Smoothmigration_Checks_AbstractCheckProcessor {

	/**
	 * Execute the check
	 *
	 * @return void
	 */
	public function execute() {
		/** @var Tx_Smoothmigration_Service_ClassAliasProvider $classAliasProvider */
		$classAliasProvider = t3lib_div::makeInstance('Tx_Smoothmigration_Service_ClassAliasProvider');

		if ($this->getExtensionKey()) {
			// Legacy Classes
			$legacyLocations = Tx_Smoothmigration_Utility_FileLocatorUtility::searchInExtension(
				$this->getExtensionKey(),
				'.*\.(php|inc)$',
				'(' . implode('|', (array_keys($classAliasProvider->getLegacyClasses()))) . ')'
			);
			// Class Alias Map
			$locations = Tx_Smoothmigration_Utility_FileLocatorUtility::searchInExtension(
				$this->getExtensionKey(),
				'.*\.(php|inc)$',
				'(' . implode('|', (array_keys($classAliasProvider->getClassAliasMap()))) . ')'
			);
		} else {
			// Legacy Classes
			$legacyLocations = Tx_Smoothmigration_Utility_FileLocatorUtility::searchInExtensions(
				'.*\.(php|inc)$',
				'(' . implode('|', (array_keys($classAliasProvider->getLegacyClasses()))) . ')'
			);
			// Class Alias Map
			$locations = Tx_Smoothmigration_Utility_FileLocatorUtility::searchInExtensions(
				'.*\.(php|inc)$',
				'(' . implode('|', (array_keys($classAliasProvider->getClassAliasMap()))) . ')'
			);
		}

		foreach ($legacyLocations as $location) {
			$this->issues[] = new Tx_Smoothmigration_Domain_Model_Issue($this->parentCheck->getIdentifier(), $location);
		}
		foreach ($locations as $location) {
			$this->issues[] = new Tx_Smoothmigration_Domain_Model_Issue($this->parentCheck->getIdentifier(), $location);
		}
	}
}
