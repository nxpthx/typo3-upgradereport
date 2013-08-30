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
 * Class Tx_Smoothmigration_Checks_Core_CallToDeprecatedStaticMethods_Definition
 *
 * @author Peter Beernink
 */
class Tx_Smoothmigration_Checks_Core_CallToDeprecatedStaticMethods_Processor extends Tx_Smoothmigration_Checks_AbstractCheckProcessor {

	/**
	 * @var Tx_Smoothmigration_Domain_Repository_DeprecationRepository
	 */
	protected $deprecationRepository;

	/**
	 * Inject the deprecation repository
	 *
	 * @param Tx_Smoothmigration_Domain_Repository_DeprecationRepository $deprecationRepository
	 * @return void
	 */
	public function injectDeprecationRepository(Tx_Smoothmigration_Domain_Repository_DeprecationRepository $deprecationRepository) {
		$this->deprecationRepository = $deprecationRepository;
	}

	/**
	 * Execute the check
	 *
	 * @return void
	 */
	public function execute() {
		/** @var Tx_Smoothmigration_Service_FileLocatorService $fileLocatorService */
		$fileLocatorService = t3lib_div::makeInstance('Tx_Smoothmigration_Service_FileLocatorService');
		$locations = $fileLocatorService->searchInExtensions('.*\.(php|inc)$',
			$this->generateRegularExpression()
		);
		foreach ($locations as $location) {
			$issue = new Tx_Smoothmigration_Domain_Model_Issue($this->parentCheck->getIdentifier(), $location);
			$issue->setAdditionalInformation($this->getRepleacabilityReport($location));
			$this->issues[] = $issue;
		}
	}

	/**
	 * See if we can replace the found deprecation
	 * @param $location
	 * @return array
	 */
	protected function getRepleacabilityReport($location) {
		$report = array();
		$match = $location->getMatchedString();
		$match = rtrim($match, '(');
		list($class, $method) = explode('::', $match);
		$deprecation = $this->deprecationRepository->findOneStaticByClassAndMethod($class, $method);
		if ($deprecation instanceof Tx_Smoothmigration_Domain_Model_Deprecation) {
			$report['isReplaceable'] = $deprecation->getNoBrainer();
			$report['replacementClass'] = $deprecation->getReplacementClass();
			$report['replacementMethod'] = $deprecation->getReplacementMethod();
			$report['replacementMessage'] = $deprecation->getReplacementMessage();
			$report['deprecationMessage'] = $deprecation->getMessage();
		} else {
			$report['isReplaceable'] = FALSE;
		}
		return $report;
	}

	/**
	 * Generate a regular expression to search for all deprecated static calls
	 */
	protected function generateRegularExpression() {
		$regularExpression = array();

		$deprecatedMethods = $this->deprecationRepository->findByIsStatic(TRUE);
		foreach ($deprecatedMethods as $deprecatedMethod) {
			$regularExpression[] = '(' . $deprecatedMethod->getClass() . '::' . $deprecatedMethod->getMethod() . '\s?\(' . ')';
		}
		return implode('|', $regularExpression);
	}

}

?>