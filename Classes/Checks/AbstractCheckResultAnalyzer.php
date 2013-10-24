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
 * Class Tx_Smoothmigration_Checks_AbstractCheckResultAnalyzer
 *
 * @author Michiel Roos
 */
class Tx_Smoothmigration_Checks_AbstractCheckResultAnalyzer implements Tx_Smoothmigration_Domain_Interface_CheckResultAnalyzer {

	/**
	 * @var object
	 */
	protected $parentCheck;

	/**
	 * @var Tx_Extbase_Utility_Localization
	 */
	protected $translator;

	/**
	 * @param Tx_Smoothmigration_Domain_Interface_Check $check
	 */
	public function __construct(Tx_Smoothmigration_Domain_Interface_Check $check) {
		$this->parentCheck = $check;
		$translator = t3lib_div::makeInstance('Tx_Extbase_Utility_Localization');
		$this->injectTranslator($translator);
	}

	/**
	 * Injects the Localization Utility
	 *
	 * @param Tx_Extbase_Utility_Localization $translator
	 *        An instance of the Localization Utility
	 * @return void
	 */
	public function injectTranslator(Tx_Extbase_Utility_Localization $translator) {
		$this->translator = $translator;
	}

	/**
	 * Shortcut function for fetching language labels
	 *
	 * @param $key
	 * @param $arguments
	 * @return string
	 */
	public function ll($key, $arguments = NULL) {
		return $this->translator->translate($key, 'smoothmigration', $arguments);
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
		return '';
	}

	/**
	 * @param Tx_Smoothmigration_Domain_Model_Issue $issue
	 *
	 * @return string
	 */
	public function getSolution(Tx_Smoothmigration_Domain_Model_Issue $issue) {
		return '';
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