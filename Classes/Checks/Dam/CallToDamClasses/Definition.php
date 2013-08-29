<?php
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2013 Peter Beernink, Drecomm (p.beernink@drecomm.nl)
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
 * Class Tx_Smoothmigration_Checks_Dam_CallToDamClasses_Definition
 *
 * @author Peter Beernink
 */
class Tx_Smoothmigration_Checks_Dam_CallToDamClasses_Definition extends Tx_Smoothmigration_Checks_AbstractCheckDefinition {

	/**
	 * @return Tx_Smoothmigration_Domain_Interface_CheckProcessor
	 */
	public function getProcessor() {
		return t3lib_div::makeInstance('Tx_Smoothmigration_Checks_Dam_CallToDamClasses_Processor', $this);
	}

	/**
	 * @return Tx_Smoothmigration_Domain_Interface_CheckResultAnalyzer
	 */
	public function getResultAnalyzer() {
		return t3lib_div::makeInstance('Tx_Smoothmigration_Checks_Dam_CallToDamClasses_ResultAnalyzer', $this);
	}

	/**
	 * Returns an CheckIdentifier
	 * Has to be unique
	 *
	 * @return string
	 */
	public function getIdentifier() {
		return 'typo3-dam-code-callToDamClasses';
	}

	/**
	 * Returns the Type of the Check
	 * One of the Constants Defined in that interface
	 *
	 * @return int
	 */
	public function getType() {
		return Tx_Smoothmigration_Domain_Interface_CheckDescription::TYPE_PHP_CODE;
	}

	/**
	 * Return the minimum TYPO3 Version the checks needs to be executed on.
	 *
	 * @return string
	 */
	public function getMinimalTypo3Version() {
		return '';
	}

	/**
	 * Return the maximal TYPO3 Version the checks needs to be executed on.
	 *
	 * @return string
	 */
	public function getMaximalTypo3Version() {
		return '';
	}

	/**
	 * Return the minimum PHP Version the checks needs to be executed on.
	 *
	 * @return string
	 */
	public function getMinimalPhpVersion() {
		return '';
	}

	/**
	 * Return the maximal PHP Version the checks needs to be executed on.
	 *
	 * @return string
	 */
	public function getMaximalPhpVersion() {
		return '';
	}

	/**
	 * Returns an array of php-modules, which need to be available
	 * to activate this check;
	 *
	 * Empty array is returned if no special modules are needed
	 *
	 * @return string[]
	 */
	public function getRequiredAvailablePhpModules() {
		return array();
	}

	/**
	 * Returns an array of php-modules, which need to be absent
	 * to activate this check
	 *
	 * Empty array is returned if there are no missing php-modules
	 *
	 * @return string[]
	 */
	public function getRequiredAbsentPhpModules() {
		return array();
	}

	/**
	 * Returns an array of Extensions which are required by this check.
	 *
	 * The array may either contain the extension-key as array key while a
	 * a version-range (x.x.x-y.y.y)is provided as value or only the extension-key
	 * as value which then will just check for presence of the given extension.
	 *
	 * @return array
	 */
	public function getRequiredExtensions() {
		return array();
	}

	/**
	 * Returns an array of Extensions which make this check either obsolete,
	 * or this check is incompatible to.
	 *
	 * @return array
	 */
	public function getConflictingExtensions() {
		return array();
	}

}

?>