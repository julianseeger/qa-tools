<?php
/**
 * This file is part of the qa-tools library.
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @copyright Alexander Obuhovich <aik.bold@gmail.com>
 * @link      https://github.com/aik099/qa-tools
 */

namespace tests\aik099\QATools\PageObject\Element;


use Mockery as m;
use tests\aik099\QATools\PageObject\Fixture\Element\ElementContainerChild;

class ElementContainerTest extends WebElementTest
{

	/**
	 * Prepares mocks for object creation.
	 *
	 * @return void
	 */
	protected function setUp()
	{
		parent::setUp();

		$this->elementClass = '\\tests\\aik099\\QATools\\PageObject\\Fixture\\Element\\ElementContainerChild';
		$this->pageFactory->shouldReceive('initElementContainer')->once()->andReturn($this->pageFactory);
		$this->pageFactory->shouldReceive('initElements')->once()->andReturn($this->pageFactory);

		$decorator = m::mock('\\aik099\\QATools\\PageObject\\PropertyDecorator\\IPropertyDecorator');
		$this->pageFactory->shouldReceive('createDecorator')->once()->andReturn($decorator);
	}

	/**
	 * Test description.
	 *
	 * @return void
	 */
	public function testGetPageFactory()
	{
		$element = $this->createElement();
		$method = new \ReflectionMethod(get_class($element), 'getPageFactory');
		$method->setAccessible(true);

		$this->assertSame($this->pageFactory, $method->invoke($element));
	}

	/**
	 * Create element.

	 *
*@return ElementContainerChild
	 */
	protected function createElement()
	{
		return new $this->elementClass(array('xpath' => 'XPATH'), $this->pageFactory);
	}

}
