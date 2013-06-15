<?php


/**
 * Class CheckRegistry
 */
class Tx_Upgradereport_Service_CheckRegistry implements t3lib_Singleton {

	protected $registeredChecks = array();


	/**
	 * @param string $className
	 * @return void
	 */
	public function registerCheck($className) {
		if (class_exists($className) && in_array('Tx_Upgradereport_Domain_Interface_Check', class_implements($className))) {
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

	public static function getInstance() {
		return t3lib_div::makeInstance('Tx_Upgradereport_Service_CheckRegistry');
	}
}

?>