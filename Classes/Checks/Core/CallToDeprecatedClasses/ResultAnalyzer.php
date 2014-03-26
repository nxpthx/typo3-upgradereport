<?php

class Tx_Smoothmigration_Checks_Core_CallToDeprecatedClasses_ResultAnalyzer extends Tx_Smoothmigration_Checks_AbstractCheckResultAnalyzer {

    /**
     * @param Tx_Smoothmigration_Domain_Model_Issue $issue
     *
     * @return string
     */
    public function getExplanation(Tx_Smoothmigration_Domain_Model_Issue $issue) {
        return $this->ll('result.typo3-core-code-callToDeprecatedClasses.explanation');
    }

    /**
     * @param Tx_Smoothmigration_Domain_Model_Issue $issue
     *
     * @return string
     */
    public function getSolution(Tx_Smoothmigration_Domain_Model_Issue $issue) {
        return $this->ll(
            'result.typo3-core-code-callToDeprecatedClasses.solution',
            array (
                $issue->getLocation()->getMatchedString(),
                $issue->getLocation()->getFilePath(),
                $issue->getLocation()->getLineNumber()
            )
        );
    }

}