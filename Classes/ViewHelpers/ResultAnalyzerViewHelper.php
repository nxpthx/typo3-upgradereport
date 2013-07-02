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


class Tx_Upgradereport_ViewHelpers_ResultAnalyzerViewHelper extends Tx_Fluid_Core_ViewHelper_AbstractViewHelper {


	/**
	 * Initialize arguments
	 *
	 * @return void
	 */
	public function initializeArguments() {
		parent::initializeArguments();
	}

	/**
	 * @param Tx_Upgradereport_Domain_Model_Issue $issue
	 */
	public function render($issue) {
		$check = Tx_Upgradereport_Service_Check_Registry::getInstance()->getActiveCheckByIdentifier($issue->getInspection());

		$this->templateVariableContainer->add('explanation', $check->getResultAnalyzer()->getExplanation($issue));
		$this->templateVariableContainer->add('solution', $check->getResultAnalyzer()->getSolution($issue));

		$content = $this->renderChildren();

		$this->templateVariableContainer->remove('explanation');
		$this->templateVariableContainer->remove('solution');
		return $content;
	}
}


?>