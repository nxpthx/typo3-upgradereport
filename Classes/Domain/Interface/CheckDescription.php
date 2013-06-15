<?php
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2013 Steffen Ritter, rs websystems <steffen.ritter@typo3.org>
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
 * Interface Tx_Upgradereport_Domain_Interface_CheckDescription
 *
 * @author Steffen Ritter
 */
interface Tx_Upgradereport_Domain_Interface_CheckDescription {

	const TYPE_SETTINGS = 0;
	const TYPE_PHP_CODE = 1;
	const TYPE_EXTENSION = 2;
	const TYPE_DATABASE = 4;
	const TYPE_ENVIRONMENT = 8;

	/**
	 * Returns an CheckIdentifier
	 * Has to be unique
	 *
	 * @return string
	 */
	public function getIdentifier();

	/**
	 * Returns the Type of the Check
	 * One of the Constants Defined in that interface
	 *
	 * @return int
	 */
	public function getType();

	/**
	 * Returns the name of the check
	 *
	 * @return string
	 */
	public function getTitle();

	/**
	 * Returns a string which describes the check in one sentence.
	 *
	 * @return string
	 */
	public function getShortDescription();

	/**
	 * Returns a string which contains an elaborate description
	 * of what the check does.
	 *
	 * @return string
	 */
	public function getDescription();
}

?>