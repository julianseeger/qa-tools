<?php
/**
 * This file is part of the qa-tools library.
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @copyright Alexander Obuhovich <aik.bold@gmail.com>
 * @link      https://github.com/aik099/qa-tools
 */

namespace aik099\QATools\HtmlElements\Element;


use aik099\QATools\PageObject\Element\IContainerAware;

/**
 * Represents a typified element.
 *
 * @method \Mockery\Expectation shouldReceive
 */
interface ITypifiedElement extends IContainerAware, INamed
{

}
