<?php
class Tx_Smoothmigration_Checks_Core_CallToDeprecatedClasses_Definition extends Tx_Smoothmigration_Checks_AbstractCheckDefinition {

    /**
     * @return Tx_Smoothmigration_Domain_Interface_CheckProcessor
     */
    public function getProcessor() {
        return t3lib_div::makeInstance('Tx_Smoothmigration_Checks_Core_CallToDeprecatedClasses_Processor', $this);
    }

    /**
     * @return Tx_Smoothmigration_Domain_Interface_CheckResultAnalyzer
     */
    public function getResultAnalyzer() {
        return t3lib_div::makeInstance('Tx_Smoothmigration_Checks_Core_CallToDeprecatedClasses_ResultAnalyzer', $this);
    }

    /**
     * Returns an CheckIdentifier
     * Has to be unique
     *
     * @return string
     */
    public function getIdentifier() {
        return 'typo3-core-code-callToDeprecatedClasses';
    }
}