<?php

/**
 * Class Tx_Smoothmigration_Migrations_AbstractMigrationProcessor
 *
 * @author Mario Näther
 */
class Tx_Smoothmigration_Migrations_MigrationMessageManager {

    /**
     * @var tx_smoothmigration_cli
     */
    protected $cliDispatcher;

    /**
     * Set the CLI dispatcher
     *
     * @param tx_smoothmigration_cli $cliDispatcher
     * @return void
     */
    public function setCliDispatcher(tx_smoothmigration_cli $cliDispatcher) {
        $this->cliDispatcher = $cliDispatcher;
    }


    public function message($message = NULL) {
        if ($this->cliDispatcher) {
            $this->cliDispatcher->message($message);
        } else {
            echo $message . PHP_EOL;
        }

    }

    public function infoMessage($message = NULL, $showIcon = FALSE) {
        if ($this->cliDispatcher) {
            $this->cliDispatcher->infoMessage($message, $showIcon);
        } else {
            echo $message . PHP_EOL;
        }
    }

    public function errorMessage($message = NULL, $showIcon = FALSE) {
        if ($this->cliDispatcher) {
            $this->cliDispatcher->errorMessage($message, $showIcon);
        } else {
            echo $message . PHP_EOL;
        }
    }

    public function warningMessage($message = NULL, $showIcon = FALSE) {
        if ($this->cliDispatcher) {
            $this->cliDispatcher->warningMessage($message, $showIcon);
        } else {
            echo $message . PHP_EOL;
        }
    }

    public function successMessage($message = NULL, $showIcon = FALSE) {
        if ($this->cliDispatcher) {
            $this->cliDispatcher->successMessage($message, $showIcon);
        } else {
            echo $message;
        }
    }

    public function headerMessage($message, $style = '') {
        if ($this->cliDispatcher) {
            $this->cliDispatcher->headerMessage($message, $style);
        } else {
            echo $message . PHP_EOL;
        }
    }

}