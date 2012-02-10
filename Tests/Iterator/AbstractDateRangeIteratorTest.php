<?php

namespace ToDate\Iterator;

require_once TODATE_BASEDIR . '/ToDate/Iterator/AbstractDateRangeIterator.php';

/**
 * Test class for AbstractDateRangeIterator.
 * Generated by PHPUnit on 2012-02-08 at 20:55:40.
 */
class AbstractDateRangeIteratorTest extends \PHPUnit_Framework_TestCase {

	/**
	 * @var \Iterator\AbstractDateRangeIterator
	 */
	protected $object;

	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 */
	protected function setUp() {
		$this->object = new DayIterator('2012-01-01', '2012-02-29');
	}

	/**
	 * Tears down the fixture, for example, closes a network connection.
	 * This method is called after a test is executed.
	 */
	protected function tearDown() {
		$this->object = null;
	}

	/**
	 * @covers ToDate\Iterator\AbstractDateRangeIterator::__construct
	 * @covers ToDate\Iterator\AbstractDateRangeIterator::getStart
	 * @covers ToDate\Iterator\AbstractDateRangeIterator::getEnd
	 */
	public function testConstructor() {
		$it = new \ToDate\Iterator\DayIterator(new \DateTime('2012-02-08'), new \DateTime('2012-02-09'));
		self::assertEquals(new \DateTime('2012-02-08'), $it->getStart());
		self::assertEquals(new \DateTime('2012-02-09'), $it->getEnd());
	}	

	/**
	 * @covers ToDate\Iterator\AbstractDateRangeIterator::__construct
	 * @covers ToDate\Iterator\AbstractDateRangeIterator::getStart
	 * @covers ToDate\Iterator\AbstractDateRangeIterator::getEnd
	 */
	public function testConstructorWithSwappedArguments() {
		$it = new \ToDate\Iterator\DayIterator(new \DateTime('2012-02-09'), new \DateTime('2012-02-08'));
		self::assertEquals(new \DateTime('2012-02-08'), $it->getStart());
		self::assertEquals(new \DateTime('2012-02-09'), $it->getEnd());
	}		
	
	
	/**
	 * @covers ToDate\Iterator\AbstractDateRangeIterator::__construct
	 * @covers ToDate\Iterator\AbstractDateRangeIterator::toDate
	 * @covers ToDate\Iterator\AbstractDateRangeIterator::getStart
	 * @covers ToDate\Iterator\AbstractDateRangeIterator::getEnd
	 */
	public function testConstructorWithStringArguments() {
		$it = new \ToDate\Iterator\DayIterator('2012-01-01', '2012-01-02');
		self::assertEquals(new \DateTime('2012-01-01'), $it->getStart());
		self::assertEquals(new \DateTime('2012-01-02'), $it->getEnd());
	}
	
	
	/**
	 * @covers ToDate\Iterator\AbstractDateRangeIterator::current
	 */
	public function testCurrent() {
		self::assertEquals(new \DateTime('2012-01-01'), $this->object->current());
	}

	/**
	 * @covers ToDate\Iterator\AbstractDateRangeIterator::key
	 */
	public function testKey() {
		self::assertEquals(0, $this->object->key());

	}

	/**
	 * @covers ToDate\Iterator\AbstractDateRangeIterator::next
	 * @covers ToDate\Iterator\AbstractDateRangeIterator::doNext
	 */
	public function testNext() {
		$mockIterator = $this->getMock('\ToDate\Iterator\AbstractDateRangeIterator',array('doNext'),array('2012-01-01','2012-02-29'));
		$mockIterator->expects($this->once())->method('doNext');
		
		self::assertEquals(0, $mockIterator->key());
		
		$mockIterator->next();
		
		self::assertEquals(1, $mockIterator->key());
	}

	/**
	 * @covers ToDate\Iterator\AbstractDateRangeIterator::rewind
	 */
	public function testRewind() {
		$this->object->rewind();
		self::assertEquals(0, $this->object->key());
		self::assertEquals(new \DateTime('2012-01-01'), $this->object->current());

		$this->object->next();
		self::assertNotEquals(0, $this->object->key());
		self::assertNotEquals(new \DateTime('2012-01-01'), $this->object->current());
		
		$this->object->rewind();
		self::assertEquals(0, $this->object->key());
		self::assertEquals(new \DateTime('2012-01-01'), $this->object->current());
	}

	/**
	 * @covers ToDate\Iterator\AbstractDateRangeIterator::valid
	 */
	public function testValid() {
		$this->object = new \ToDate\Iterator\DayIterator('2012-01-01', '2012-01-01');
		self::assertTrue($this->object->valid());
		$this->object->next();
		self::assertFalse($this->object->valid());
		
	}

}

?>
