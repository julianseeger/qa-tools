<?php
/**
 * This file is part of the qa-tools library.
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @copyright Alexander Obuhovich <aik.bold@gmail.com>
 * @link      https://github.com/aik099/qa-tools
 */

namespace aik099\QATools\PageObject\Exception;


/**
 * Exception related to Element.
 */
class ElementException extends PageFactoryException
{
	const TYPE_UNKNOWN_METHOD = 101;

	const TYPE_INCORRECT_SELECTOR = 102;

	const TYPE_UNKNOWN_SELECTOR = 103;

	const TYPE_NOT_FOUND = 104;
}
