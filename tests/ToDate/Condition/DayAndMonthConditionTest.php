<?php

namespace ToDate\Condition;

/**
 * Test class for DayAndMonthCondition.
 * Generated by PHPUnit on 2012-02-06 at 22:18:11.
 */
class DayAndMonthConditionTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @covers ToDate\Condition\DayAndMonthCondition::contains
     */
    public function testContainsFindsSingleDay()
    {
        $c = new DayAndMonthCondition(6, 12);
        self::assertTrue($c->contains(new \DateTime('2012-12-06')));
        self::assertFalse($c->contains(new \DateTime('2012-12-05')));
        self::assertFalse($c->contains(new \DateTime('2012-11-06')));

        self::assertTrue($c->contains(new \DateTime('2013-12-06')));
        self::assertFalse($c->contains(new \DateTime('2013-12-05')));
        self::assertFalse($c->contains(new \DateTime('2013-11-06')));

    }

    /**
     * @covers ToDate\Condition\DayAndMonthCondition::__construct
     * @covers ToDate\Condition\DayAndMonthCondition::__toString
     */
    public function testToString()
    {
        $c = new DayAndMonthCondition(6, 12);
        self::assertEquals('DayAndMonth = 6/12', (string) $c);
    }

}
