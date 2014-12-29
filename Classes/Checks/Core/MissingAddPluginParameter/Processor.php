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
 * Class Tx_Smoothmigration_Checks_Core_MissingAddPluginParameter_Processor
 *
 * @author Peter Kuehn
 */
class Tx_Smoothmigration_Checks_Core_MissingAddPluginParameter_Processor
	extends Tx_Smoothmigration_Checks_AbstractCheckProcessor {

	/**
	 * Execute the check
	 *
	 * @return void
	 */
	public function execute() {
		$list = Tx_Smoothmigration_Utility_ExtensionUtility::getLoadedExtensionsFiltered(TRUE, FALSE, TRUE);
		foreach ($list as $extensionKey) {
			$locations = Tx_Smoothmigration_Utility_FileLocatorUtility::searchInExtension(
				$extensionKey,
				'.*[^ext_tables]\.(php|inc)$',
				'(addPlugin\s*\(\s*(array\s*\([^\)]*\)[^\,]*\,|\$[^\,]*\,)[^\)\,]*\))'
			);
			foreach ($locations as $location) {
				$this->issues[] = new Tx_Smoothmigration_Domain_Model_Issue($this->parentCheck->getIdentifier(), $location);
			}
		}
	}
}
