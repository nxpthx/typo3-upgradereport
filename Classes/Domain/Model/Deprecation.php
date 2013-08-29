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
 * Class Tx_Smoothmigration_Domain_Model_Deprecation
 *
 * @author Michiel Roos
 */
class Tx_Smoothmigration_Domain_Model_Deprecation extends Tx_Extbase_DomainObject_AbstractEntity {

	/**
	 * @var string
	 */
	protected $file;

	/**
	 * @var string
	 */
	protected $class;

	/**
	 * @var string
	 */
	protected $insterface;

	/**
	 * @var string
	 */
	protected $method;

	/**
	 * @var string
	 */
	protected $message;

	/**
	 * @var integer
	 */
	protected $isStatic;

	/**
	 * @var string
	 */
	protected $visibility;

	/**
	 * @var string
	 */
	protected $deprecatedSinceVersion;

	/**
	 * @var string
	 */
	protected $removedInVersion;

	/**
	 * @var string
	 */
	protected $replacementClass;

	/**
	 * @var string
	 */
	protected $replacementInterface;

	/**
	 * @var integer
	 */
	protected $noBrainer;

	/**
	 * @var string
	 */
	protected $replacementMessage;

	/**
	 * @return string
	 */
	public function getClass() {
		return $this->class;
	}

	/**
	 * @return string
	 */
	public function getDeprecatedSinceVersion() {
		return $this->deprecatedSinceVersion;
	}

	/**
	 * @return string
	 */
	public function getFile() {
		return $this->file;
	}

	/**
	 * @return string
	 */
	public function getInsterface() {
		return $this->insterface;
	}

	/**
	 * @return int
	 */
	public function getIsStatic() {
		return $this->isStatic;
	}

	/**
	 * @return string
	 */
	public function getMessage() {
		return $this->message;
	}

	/**
	 * @return string
	 */
	public function getMethod() {
		return $this->method;
	}

	/**
	 * @return int
	 */
	public function getNoBrainer() {
		return $this->noBrainer;
	}

	/**
	 * @return string
	 */
	public function getRemovedInVersion() {
		return $this->removedInVersion;
	}

	/**
	 * @return string
	 */
	public function getReplacementClass() {
		return $this->replacementClass;
	}

	/**
	 * @return string
	 */
	public function getReplacementInterface() {
		return $this->replacementInterface;
	}

	/**
	 * @return string
	 */
	public function getReplacementMessage() {
		return $this->replacementMessage;
	}

	/**
	 * @return string
	 */
	public function getVisibility() {
		return $this->visibility;
	}

}

?>