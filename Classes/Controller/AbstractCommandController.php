<?php
/**
 *  Copyright notice
 *
 *  ⓒ 2014 Michiel Roos <michiel@maxserv.nl>
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is free
 *  software; you can redistribute it and/or modify it under the terms of the
 *  GNU General Public License as published by the Free Software Foundation;
 *  either version 2 of the License, or (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful, but
 *  WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY
 *  or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for
 *  more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 */

// I can haz color / use unicode?
if (DIRECTORY_SEPARATOR !== '\\') {
	define('USE_COLOR', function_exists('posix_isatty') && posix_isatty(STDOUT));
	define('UNICODE', TRUE);
} else {
	define('USE_COLOR', getenv('ANSICON') !== FALSE);
	define('UNICODE', FALSE);
}

// Get terminal width
if (@exec('tput cols')) {
	define('TERMINAL_WIDTH', exec('tput cols'));
} else {
	define('TERMINAL_WIDTH', 79);
}

/**
 * Abstract Command Controller
 *
 * @package smoothmigration
 * @subpackage Controller
 */
class Tx_Smoothmigration_Controller_AbstractCommandController extends Tx_Extbase_MVC_Controller_CommandController {

	/**
	 * Output t3lib_FlashMessage
	 *
	 * @param t3lib_FlashMessage $message
	 *
	 * @return void
	 */
	public function outputMessage($message = NULL) {
		if ($message->getTitle()) {
			$this->outputLine($message->getTitle());
		}
		if ($message->getMessage()) {
			$this->outputLine($message->getMessage());
		}
		if ($message->getSeverity() !== t3lib_FlashMessage::OK) {
			$this->sendAndExit(1);
		}
	}

	/**
	 * Normal message
	 *
	 * @param $message
	 * @param boolean $flushOutput
	 *
	 * @return void
	 */
	public function message($message = NULL, $flushOutput = TRUE) {
		$this->outputLine($message);
		if ($flushOutput) {
			$this->response->send();
			$this->response->setContent('');
		}
	}

	/**
	 * Informational message
	 *
	 * @param string $message
	 * @param boolean $showIcon
	 * @param boolean $flushOutput
	 *
	 * @return void
	 */
	public function infoMessage($message = NULL, $showIcon = FALSE, $flushOutput = TRUE) {
		$icon = '';
		if ($showIcon && UNICODE) {
			$icon = '★ ';
		}
		if (USE_COLOR) {
			$this->outputLine("\033[0;36m" . $icon . $message . "\033[0m");
		} else {
			$this->outputLine($icon . $message);
		}
		if ($flushOutput) {
			$this->response->send();
			$this->response->setContent('');
		}
	}

	/**
	 * Error message
	 *
	 * @param string $message
	 * @param boolean $showIcon
	 * @param boolean $flushOutput
	 *
	 * @return void
	 */
	public function errorMessage($message = NULL, $showIcon = FALSE, $flushOutput = TRUE) {
		$icon = '';
		if ($showIcon && UNICODE) {
			$icon = '✖ ';
		}
		if (USE_COLOR) {
			$this->outputLine("\033[31m" . $icon . $message . "\033[0m");
		} else {
			$this->outputLine($icon . $message);
		}
		if ($flushOutput) {
			$this->response->send();
			$this->response->setContent('');
		}
	}

	/**
	 * Warning message
	 *
	 * @param string $message
	 * @param boolean $showIcon
	 * @param boolean $flushOutput
	 *
	 * @return void
	 */
	public function warningMessage($message = NULL, $showIcon = FALSE, $flushOutput = TRUE) {
		$icon = '';
		if ($showIcon) {
			$icon = '! ';
		}
		if (USE_COLOR) {
			$this->outputLine("\033[0;33m" . $icon . $message . "\033[0m");
		} else {
			$this->outputLine($icon . $message);
		}
		if ($flushOutput) {
			$this->response->send();
			$this->response->setContent('');
		}
	}

	/**
	 * Success message
	 *
	 * @param string $message
	 * @param boolean $showIcon
	 * @param boolean $flushOutput
	 *
	 * @return void
	 */
	public function successMessage($message = NULL, $showIcon = FALSE, $flushOutput = TRUE) {
		$icon = '';
		if ($showIcon && UNICODE) {
			$icon = '✔ ';
		}
		if (USE_COLOR) {
			$this->outputLine("\033[0;32m" . $icon . $message . "\033[0m");
		} else {
			$this->outputLine($icon . $message);
		}
		if ($flushOutput) {
			$this->response->send();
			$this->response->setContent('');
		}
	}

	/**
	 * Info string
	 *
	 * @param string $string
	 *
	 * @return string
	 */
	public function infoString($string = NULL) {
		if (USE_COLOR) {
			$string = "\033[0;36m" . $string . "\033[0m";
		}
		return $string;
	}

	/**
	 * Error string
	 *
	 * @param string $string
	 *
	 * @return string
	 */
	public function errorString($string = NULL) {
		if (USE_COLOR) {
			$string = "\033[0;31m" . $string . "\033[0m";
		}
		return $string;
	}

	/**
	 * Warning string
	 *
	 * @param string $string
	 *
	 * @return string
	 */
	public function warningString($string = NULL) {
		if (USE_COLOR) {
			$string = "\033[0;33m" . $string . "\033[0m";
		}
		return $string;
	}

	/**
	 * Success string
	 *
	 * @param string $string
	 *
	 * @return string
	 */
	public function successString($string = NULL) {
		if (USE_COLOR) {
			$string = "\033[0;32m" . $string . "\033[0m";
		}
		return $string;
	}


	/**
	 * Show a header message
	 *
	 * @param $message
	 * @param string $style
	 * @param boolean $flushOutput
	 *
	 * @return void
	 */
	public function headerMessage($message, $style = 'info', $flushOutput = TRUE) {
		// Crop the message
		$message = substr($message, 0, TERMINAL_WIDTH );
		if (UNICODE) {
			$linePaddingLength = mb_strlen('─') * (TERMINAL_WIDTH);
			$message =
				str_pad('', $linePaddingLength, '─') . LF .
				str_pad($message, TERMINAL_WIDTH) . LF .
				str_pad('', $linePaddingLength, '─');
		} else {
			$message =
				str_pad('', TERMINAL_WIDTH, '-') . LF .
				str_pad($message, TERMINAL_WIDTH) . LF .
				str_pad('', TERMINAL_WIDTH, '-');
		}
		switch ($style) {
			case 'error':
				$this->errorMessage($message, FALSE, $flushOutput);
				break;
			case 'info':
				$this->infoMessage($message, FALSE, $flushOutput);
				break;
			case 'success':
				$this->successMessage($message, FALSE, $flushOutput);
				break;
			case 'warning':
				$this->warningMessage($message, FALSE, $flushOutput);
				break;
			default:
				$this->message($message, $flushOutput);
		}
	}

	/**
	 * Show a horizontal line
	 *
	 * @param string $style
	 * @param boolean $flushOutput
	 *
	 * @return void
	 */
	public function horizontalLine($style = '', $flushOutput = TRUE) {
		if (UNICODE) {
			$linePaddingLength = mb_strlen('─') * (TERMINAL_WIDTH);
			$message =
				str_pad('', $linePaddingLength, '─');
		} else {
			$message =
				str_pad('', TERMINAL_WIDTH, '-');
		}
		switch ($style) {
			case 'error':
				$this->errorMessage($message, FALSE, $flushOutput);
				break;
			case 'info':
				$this->infoMessage($message, FALSE, $flushOutput);
				break;
			case 'success':
				$this->successMessage($message, FALSE, $flushOutput);
				break;
			case 'warning':
				$this->warningMessage($message, FALSE, $flushOutput);
				break;
			default:
				$this->message($message, $flushOutput);
		}
	}
}
