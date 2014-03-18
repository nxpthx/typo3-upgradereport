<?php

/**
 * Created by PhpStorm.
 * User: naether
 * Date: 17.03.14
 * Time: 17:03
 */
class Tx_Smoothmigration_Checks_Core_CallToDeprecatedClasses_Processor extends Tx_Smoothmigration_Checks_AbstractCheckProcessor
{

    protected $deprecatedClassnameRegex = array(
        '(Tx_)(.*)(_Domain_Repository_|_Domain_Model_|_Controller_)(\w+)',
        'Tx_Extbase_(\w+)',
        'Tx_Fluid_(\w+)',
        't3lib_(\w+)',
        'tslib_(\w+)'
    );

    /**
     * @return mixed
     */
    public function execute()
    {
        /** @var Tx_Smoothmigration_Service_FileLocatorService $fileLocatorService */
        $fileLocatorService = t3lib_div::makeInstance('Tx_Smoothmigration_Service_FileLocatorService');
        $locations = $fileLocatorService->searchInExtensions('.*\.(php)$',
            $this->generateRegularExpression()
        );
        foreach ($locations as $location) {
            $this->issues[] = new Tx_Smoothmigration_Domain_Model_Issue($this->parentCheck->getIdentifier(), $location);
        }
    }

    protected function generateRegularExpression() {
        return implode('|', $this->deprecatedClassnameRegex);
        #return '(Tx_)(.*)(_Domain_Repository_|_Domain_Model_|_Controller_)(\w+)|Tx_Extbase_(\w+)|Tx_Fluid_(\w+)';
    }
}