<?php
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2013 Peter Beernink <p.beernink@drecomm.nl>
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
 * Class Tx_Smoothmigration_Migrations_AbstractMigrationProcessor
 *
 * @author Peter Beernink
 */
abstract class Tx_Smoothmigration_Migrations_AbstractMigrationProcessor implements Tx_Smoothmigration_Domain_Interface_MigrationProcessor {

	/**
	 * @var Tx_Smoothmigration_Service_MessageService
	 */
	protected $messageService;

	/**
	 * @var boolean
	 */
	protected $encounteredExperimentalIssues = FALSE;

	/**
	 * @var boolean
	 */
	protected $experimental;

	/**
	 * @var string
	 */
	protected $extensionKey;

	/**
	 * @var Tx_Smoothmigration_Domain_Repository_IssueRepository
	 */
	protected $issueRepository;

	/**
	 * The issues found
	 *
	 * @var array
	 */
	protected $issues;

	/**
	 *
	 * @var Tx_Extbase_Object_ObjectManager
	 */
	protected $objectManager;

	/**
	 * @var Tx_Smoothmigration_Migrations_AbstractMigrationDefinition
	 */
	protected $parentMigration;

	/**
	 * @var Tx_Extbase_Utility_Localization
	 */
	protected $translator;

	/**
	 * Inject the issue repository
	 *
	 * @param Tx_Smoothmigration_Domain_Repository_IssueRepository $issueRepository
	 * @return void
	 */
	public function injectIssueRepository(Tx_Smoothmigration_Domain_Repository_IssueRepository $issueRepository) {
		$this->issueRepository = $issueRepository;
	}

	/**
	 * Inject the object manager
	 *
	 * @param Tx_Extbase_Object_ObjectManager $objectManager
	 * @return void
	 */
	public function injectObjectManager(Tx_Extbase_Object_ObjectManager $objectManager) {
		$this->objectManager = $objectManager;
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
	 * When set, try to process experimental migrations as well if any
	 *
	 * @param boolean $experimental
	 * @return void
	 */
	public function setExperimental($experimental) {
		$this->experimental = $experimental;
	}

	/**
	 * @param string $extensionKey
	 *
	 * @return $this to allow for chaining
	 */
	public function setExtensionKey($extensionKey) {
		$this->extensionKey = $extensionKey;

		return $this;
	}

	/**
	 * Set the Message Service
	 *
	 * @param Tx_Smoothmigration_Service_MessageService $messageService
	 * @return void
	 */
	public function setMessageService(Tx_Smoothmigration_Service_MessageService $messageService) {
		$this->messageService = $messageService;
	}

	/**
	 * @param Tx_Smoothmigration_Domain_Interface_Migration $migration
	 */
	public function __construct(Tx_Smoothmigration_Domain_Interface_Migration $migration) {
		$this->parentMigration = $migration;
	}

	/**
	 * BUG
	 * This causes a fatal error with PHP 5.3 since the method is already defined in the interface and not further specified here.
	 */
	//abstract public function execute();

	/**
	 * Any issues?
	 *
	 * @return boolean
	 */
	public function hasIssues() {
		if ($this->issues === NULL) {
			$this->getIssues();
		}
		return (count($this->issues) > 0);
	}

	/**
	 * Get all issues
	 *
	 * @return array
	 */
	public function getIssues() {
		if ($this->issues === NULL) {
			if ($this->extensionKey) {
				$this->issues = $this->issueRepository->findByInspectionAndExtensionKey($this->parentMigration->getIdentifier(), $this->extensionKey)->toArray();
			} else {
				$this->issues = $this->issueRepository->findByInspection($this->parentMigration->getIdentifier())->toArray();
			}
		}
		return $this->issues;
	}

	/**
	 * Get pending issues
	 *
	 * @return array
	 */
	public function getPendingIssues() {
		if ($this->issues === NULL) {
			if ($this->extensionKey) {
				$this->issues = $this->issueRepository->findPendingByInspectionAndExtensionKey($this->parentMigration->getIdentifier(), $this->extensionKey)->toArray();
			} else {
				$this->issues = $this->issueRepository->findByInspection($this->parentMigration->getIdentifier())->toArray();
			}
		}
		return $this->issues;
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
}
