<?php


/**
 * Class CheckRegistry
 */
class Tx_Smoothmigration_Service_Check_Registry implements t3lib_Singleton {

	protected $registeredChecks = array();


	/**
	 * @param string $className
	 * @return void
	 */
	public function registerCheck($className) {
		if (class_exists($className) && in_array('Tx_Smoothmigration_Domain_Interface_Check', class_implements($className))) {
			$this->registeredChecks[] = $className;
		}
	}


	/**
	 * @param array $classNames
	 * @return void
	 */
	public function registerChecks(array $classNames) {
		foreach ($classNames as $className) {
			$this->registerCheck($className);
		}
	}

	/**
	 * Returns Instances of all registered checks which apply to this instance.
	 *
	 * @return Tx_Smoothmigration_Domain_Interface_Check[]
	 */
	public function getActiveChecks() {
		$activeChecks = array();
		/** @var Tx_Smoothmigration_Service_Check_RequirementsAnalyzer $requirementsAnalyzer */
		$requirementsAnalyzer = t3lib_div::makeInstance('Tx_Smoothmigration_Service_Check_RequirementsAnalyzer');

		foreach ($this->registeredChecks as $className) {
			/** @var Tx_Smoothmigration_Domain_Interface_Check $check */
			$check = t3lib_div::makeInstance($className);
			if ($requirementsAnalyzer->isCheckActive($check)) {
				$activeChecks[] = $check;
			}
		}

		return $activeChecks;
	}

	/**
	 * @param $searchedIdentifier
	 *
	 * @return null|Tx_Smoothmigration_Domain_Interface_Check
	 */
	public function getActiveCheckByIdentifier($searchedIdentifier) {
		$checks = $this->getActiveChecks();
		foreach ($checks as $check) {
			if ($check->getIdentifier() == $searchedIdentifier) {
				return $check;
			}
		}
		return NULL;
	}

	/**
	 * @return Tx_Smoothmigration_Service_Check_Registry
	 */
	public static function getInstance() {
		return t3lib_div::makeInstance('Tx_Smoothmigration_Service_Check_Registry');
	}
}

?>