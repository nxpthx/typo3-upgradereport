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
 * Message Service
 *
 * @package smoothmigration
 * @subpackage Service
 */
class Tx_Smoothmigration_Service_MessageService implements t3lib_Singleton {

	/**
	 * Ansi color code
	 */
	const COLOR_INFO = "\033[0;36m";

	/**
	 * Ansi color code
	 */
	const COLOR_ERROR = "\033[0;31m";

	/**
	 * Ansi color code
	 */
	const COLOR_RESET = "\033[0m";

	/**
	 * Ansi color code
	 */
	const COLOR_SUCCESS = "\033[0;32m";

	/**
	 * Ansi color code
	 */
	const COLOR_WARNING = "\033[0;33m";

	/**
	 * @var array
	 */
	private $completions = array();

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
	 *
	 * @return void
	 */
	public function message($message = NULL) {
		$this->outputLine($message);
	}

	/**
	 * Informational message
	 *
	 * @param string $message
	 * @param boolean $showIcon
	 *
	 * @return void
	 */
	public function infoMessage($message = NULL, $showIcon = FALSE) {
		$icon = '';
		if ($showIcon && UNICODE) {
			$icon = '★ ';
		}
		if (USE_COLOR) {
			$this->outputLine(self::COLOR_INFO . $icon . $message . self::COLOR_RESET);
		} else {
			$this->outputLine($icon . $message);
		}
	}

	/**
	 * Error message
	 *
	 * @param string $message
	 * @param boolean $showIcon
	 *
	 * @return void
	 */
	public function errorMessage($message = NULL, $showIcon = FALSE) {
		$icon = '';
		if ($showIcon && UNICODE) {
			$icon = '✖ ';
		}
		if (USE_COLOR) {
			$this->outputLine(self::COLOR_ERROR . $icon . $message . self::COLOR_RESET);
		} else {
			$this->outputLine($icon . $message);
		}
	}

	/**
	 * Warning message
	 *
	 * @param string $message
	 * @param boolean $showIcon
	 *
	 * @return void
	 */
	public function warningMessage($message = NULL, $showIcon = FALSE) {
		$icon = '';
		if ($showIcon) {
			$icon = '! ';
		}
		if (USE_COLOR) {
			$this->outputLine(self::COLOR_WARNING . $icon . $message . self::COLOR_RESET);
		} else {
			$this->outputLine($icon . $message);
		}
	}

	/**
	 * Success message
	 *
	 * @param string $message
	 * @param boolean $showIcon
	 *
	 * @return void
	 */
	public function successMessage($message = NULL, $showIcon = FALSE) {
		$icon = '';
		if ($showIcon && UNICODE) {
			$icon = '✔ ';
		}
		if (USE_COLOR) {
			$this->outputLine(self::COLOR_SUCCESS . $icon . $message . self::COLOR_RESET);
		} else {
			$this->outputLine($icon . $message);
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
			$string = self::COLOR_INFO . $string . self::COLOR_RESET;
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
			$string = self::COLOR_ERROR . $string . self::COLOR_RESET;
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
			$string = self::COLOR_WARNING . $string . self::COLOR_RESET;
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
			$string = self::COLOR_SUCCESS . $string . self::COLOR_RESET;
		}

		return $string;
	}


	/**
	 * Show a header message
	 *
	 * @param $message
	 * @param string $style
	 *
	 * @return void
	 */
	public function headerMessage($message, $style = 'info') {
		// Crop the message
		$message = substr($message, 0, TERMINAL_WIDTH);
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
				$this->errorMessage($message, FALSE);
				break;
			case 'info':
				$this->infoMessage($message, FALSE);
				break;
			case 'success':
				$this->successMessage($message, FALSE);
				break;
			case 'warning':
				$this->warningMessage($message, FALSE);
				break;
			default:
				$this->message($message);
		}
	}

	/**
	 * Show a horizontal line
	 *
	 * @param string $style
	 *
	 * @return void
	 */
	public function horizontalLine($style = '') {
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
				$this->errorMessage($message, FALSE);
				break;
			case 'info':
				$this->infoMessage($message, FALSE);
				break;
			case 'success':
				$this->successMessage($message, FALSE);
				break;
			case 'warning':
				$this->warningMessage($message, FALSE);
				break;
			default:
				$this->message($message);
		}
	}

	/**
	 * Get user input
	 *
	 * @param string $text
	 * @param array $arguments
	 *
	 * @return mixed
	 */
	public function prompt($text = '', array $arguments = array()) {
		if ($arguments !== array()) {
			$text = vsprintf($text, $arguments);
		}
		readline_completion_function(array($this, 'autoComplete'));
		$input = readline($text . $this->infoString('> '));
		$input = preg_replace('/[^_ a-zA-Z0-9-]*/', '', $input);
		switch ($input) {
			case 'Q':
			case 'q':
				$this->sendAndExit();
				break;
			case 'B':
			case 'b':
				// Back has a value of -1
				$input = -1;
				break;
			default:
		}

		return $input;
	}

	/**
	 * Get user input
	 *
	 * @return mixed
	 */
	public function usage() {
		$this->message(
			'Enter identifier or number.' . PHP_EOL .
			'Use [' . $this->successString('tab') . '] key to autocomplete.' . PHP_EOL .
			'[' . $this->successString('q') . ']uit, [' . $this->successString('b') . ']ack' . PHP_EOL
		);
	}

	/**
	 * @param string $input the last command part
	 * @param integer $index the $index is the place of the cursor in the line
	 *
	 * @return array
	 */
	public function autoComplete($input = '', $index = 0) {
		$completions = array();
		// Get info about the current buffer
		$info = readline_info();
		// Figure out what the entire input is
		$fullInput = substr($info['line_buffer'], 0, $info['end']);

		// Figure out how many parts do we have?
		$inputParts = explode(' ', $fullInput);
		$partCount = count($inputParts);

		if ($partCount === 3) {
			if (in_array($inputParts[1], $this->completions['actions']['check']) OR
				in_array($inputParts[1], $this->completions['actions']['migration'])) {
				$completions = $this->completions['extensions'];
			}
		} elseif ($partCount === 2) {
			switch ($inputParts[0]) {
				case '0':
				case 'check':
					$completions = $this->completions['actions']['check'];
					break;
				case '1':
				case 'migration':
					$completions = $this->completions['actions']['migration'];
					break;
				default:
					$completions = $this->completions['extensions'];
			}
		} elseif ($partCount === 1) {
			if (isset($this->completions['commands'])) {
				$completions = $this->completions['commands'];
			} else {
				$completions = $this->completions['actions'];
			}
		}

		return $completions;
	}

	/**
	 * Outputs specified text to the console window
	 * You can specify arguments that will be passed to the text via sprintf
	 *
	 * @see http://www.php.net/sprintf
	 *
	 * @param string $text Text to output
	 * @param array $arguments Optional arguments to use for sprintf
	 *
	 * @return void
	 */
	protected function output($text, array $arguments = array()) {
		if ($arguments !== array()) {
			$text = vsprintf($text, $arguments);
		}
		echo $text;
	}

	/**
	 * Outputs specified text to the console window and appends a line break
	 *
	 * @param string $text Text to output
	 * @param array $arguments Optional arguments to use for sprintf
	 *
	 * @return string
	 * @see output()
	 */
	protected function outputLine($text = '', array $arguments = array()) {
		$this->output($text . PHP_EOL, $arguments);
	}

	/**
	 * Exits the CLI without any further code execution
	 * Should be used for commands that flush code caches.
	 *
	 * @param integer $exitCode Exit code to return on exit
	 *
	 * @return void
	 */
	protected function sendAndExit($exitCode = 0) {
		die($exitCode);
	}

	/**
	 * @param array $completions
	 *
	 * @return $this to allow for chaining
	 */
	public function setCompletions($completions) {
		$this->completions = $completions;

		return $this;
	}
}
