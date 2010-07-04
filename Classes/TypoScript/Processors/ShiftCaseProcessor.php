<?php
declare(ENCODING = 'utf-8');
namespace F3\TYPO3\TypoScript\Processors;

/*                                                                        *
 * This script belongs to the FLOW3 package "TYPO3".                      *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU General Public License as published by the Free   *
 * Software Foundation, either version 3 of the License, or (at your      *
 * option) any later version.                                             *
 *                                                                        *
 * This script is distributed in the hope that it will be useful, but     *
 * WITHOUT ANY WARRANTY; without even the implied warranty of MERCHAN-    *
 * TABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General      *
 * Public License for more details.                                       *
 *                                                                        *
 * You should have received a copy of the GNU General Public License      *
 * along with the script.                                                 *
 * If not, see http://www.gnu.org/licenses/gpl.html                       *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

/**
 * Processor that shifts the case of a string into the specified direction.
 *
 * @version $Id$
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class ShiftCaseProcessor implements \F3\TypoScript\ProcessorInterface {

	const SHIFT_CASE_TO_UPPER = 'upper';
	const SHIFT_CASE_TO_LOWER = 'lower';
	const SHIFT_CASE_TO_TITLE = 'title';

	/**
	 * One of the SHIFT_CASE_* constants
	 * @var string
	 */
	protected $direction;

	/**
	 * @param string $prefixString a string to be prepended
	 * @return void
	 */
	public function setDirection($direction) {
		$this->direction = $direction;
	}

	/**
	 * @return string the string which is to be prepended to the subject
	 */
	public function getDirection() {
		return $this->direction;
	}

	/**
	 * Shifts the case of a string into the specified direction.
	 *
	 * @param string $subject the string to be processed
	 * @return string The processed string
	 * @author Robert Lemke <robert@typo3.org>
	 * @author Bastian Waidelich <bastian@typo3.org>
	 */
	public function process($subject) {
		switch ($this->direction) {
			case self::SHIFT_CASE_TO_LOWER :
				$processedSubject = \F3\FLOW3\Utility\Unicode\Functions::strtolower($subject);
				break;
			case self::SHIFT_CASE_TO_UPPER :
				$processedSubject = \F3\FLOW3\Utility\Unicode\Functions::strtoupper($subject);
				break;
			case self::SHIFT_CASE_TO_TITLE :
				$processedSubject = \F3\FLOW3\Utility\Unicode\Functions::strtotitle($subject);
				break;
			default:
				throw new \F3\TypoScript\Exception('Invalid direction specified for case shift. Please use one of the SHIFT_CASE_* constants.', 1179399480);
		}
		return $processedSubject;
	}
}
?>
