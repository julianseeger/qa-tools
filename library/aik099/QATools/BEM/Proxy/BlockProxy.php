<?php
/**
 * This file is part of the qa-tools library.
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @copyright Alexander Obuhovich <aik.bold@gmail.com>
 * @link      https://github.com/aik099/qa-tools
 */

namespace aik099\QATools\BEM\Proxy;


use aik099\QATools\BEM\ElementLocator\BEMElementLocator;
use aik099\QATools\PageObject\Exception\ElementNotFoundException;
use Behat\Mink\Element\NodeElement;
use aik099\QATools\BEM\Element\IBlock;
use aik099\QATools\PageObject\IPageFactory;

/**
 * Class for lazy-proxy creation to ensure, that BEM elements are really accessed only at moment, when user needs them.
 *
 * @method \Mockery\Expectation shouldReceive
 *
 * @link http://bit.ly/14TbcR9
 */
class BlockProxy extends PartProxy implements IBlock
{

	/**
	 * Initializes BEM block proxy.
	 *
	 * @param string            $name         Block name.
	 * @param BEMElementLocator $locator      Locator.
	 * @param IPageFactory      $page_factory Page factory.
	 */
	public function __construct($name, BEMElementLocator $locator, IPageFactory $page_factory)
	{
		parent::__construct($name, $locator, $page_factory);

		$this->className = '\\aik099\\QATools\\BEM\\Element\\Block';
	}

	/**
	 * Returns block instance.
	 *
	 * @return IBlock
	 * @throws ElementNotFoundException When block not found.
	 */
	public function getObject()
	{
		if ( !is_object($this->object) ) {
			$nodes = $this->locator->findAll();

			if ( !$nodes ) {
				throw new ElementNotFoundException('Block not found by selector: ' . (string)$this->locator);
			}

			$this->object = new $this->className($this->getName(), $nodes, $this->pageFactory, $this->locator);
			$this->object->setContainer($this->getContainer());
		}

		return $this->object;
	}

	/**
	 * Returns block nodes.
	 *
	 * @return NodeElement[]
	 */
	public function getNodes()
	{
		return $this->getObject()->getNodes();
	}

	/**
	 * Returns first block element.
	 *
	 * @param string $element_name      Element name.
	 * @param string $modificator_name  Modificator name.
	 * @param string $modificator_value Modificator value.
	 *
	 * @return NodeElement[]|null
	 */
	public function getElement($element_name, $modificator_name = null, $modificator_value = null)
	{
		return $this->getObject()->getElement($element_name, $modificator_name, $modificator_value);
	}

	/**
	 * Returns all block elements.
	 *
	 * @param string $element_name      Element name.
	 * @param string $modificator_name  Modificator name.
	 * @param string $modificator_value Modificator value.
	 *
	 * @return NodeElement[]
	 */
	public function getElements($element_name, $modificator_name = null, $modificator_value = null)
	{
		return $this->getObject()->getElements($element_name, $modificator_name, $modificator_value);
	}

	/**
	 * Finds all elements with specified selector.
	 *
	 * @param string $selector Selector engine name.
	 * @param string $locator  Selector locator.
	 *
	 * @return NodeElement[]
	 */
	public function findAll($selector, $locator)
	{
		return $this->getObject()->findAll($selector, $locator);
	}

	/**
	 * Finds first element with specified selector.
	 *
	 * @param string $selector Selector engine name.
	 * @param string $locator  Selector locator.
	 *
	 * @return NodeElement|null
	 */
	public function find($selector, $locator)
	{
		return $this->getObject()->find($selector, $locator);
	}

}
