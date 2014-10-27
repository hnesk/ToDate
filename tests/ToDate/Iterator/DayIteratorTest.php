<?php

namespace ToDate\Iterator;

/**
 * Test class for DayIterator.
 * Generated by PHPUnit on 2012-02-08 at 20:52:54.
 */
class DayIteratorTest extends \PHPUnit_Framework_TestCase
{


    /**
     * @covers ToDate\Iterator\DayIterator::doNext
     */
    public function testDoNext()
    {
        $it = new DayIterator('2012-01-01', '2012-01-02');
        $it->next();
        self::assertEquals(new \DateTime('2012-01-02'), $it->current());

    }

}

?>
