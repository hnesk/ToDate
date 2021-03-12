<?php

namespace ToDate\Condition;

use PHPUnit\Framework\TestCase;

/**
 * Test class for MonthCondition.
 * Generated by PHPUnit on 2012-02-06 at 22:18:11.
 */
class MonthConditionTest extends TestCase
{

    /**
     * @covers ToDate\Condition\MonthCondition::__construct
     * @covers ToDate\Condition\MonthCondition::contains
     */
    public function testContainsFindsSingleMonth()
    {
        $c = new MonthCondition(3);
        self::assertFalse($c->contains(new \DateTime('2012-04-04')));
        self::assertFalse($c->contains(new \DateTime('2012-02-04')));
        self::assertTrue($c->contains(new \DateTime('2012-03-04')));
    }

    /**
     * @covers ToDate\Condition\MonthCondition::__construct
     * @covers ToDate\Condition\MonthCondition::contains
     */
    public function testContainsFindsMonths()
    {
        $c = new MonthCondition(array(3, 4));
        self::assertFalse($c->contains(new \DateTime('2012-02-04')));
        self::assertTrue($c->contains(new \DateTime('2012-03-04')));
        self::assertTrue($c->contains(new \DateTime('2012-04-04')));
        self::assertFalse($c->contains(new \DateTime('2012-05-04')));
    }

    /**
     * @covers ToDate\Condition\MonthCondition::__construct
     * @covers ToDate\Condition\MonthCondition::contains
     */
    public function testContainsFindsMonthRange()
    {
        $c = new MonthCondition('3-5');
        self::assertFalse($c->contains(new \DateTime('2012-02-04')));
        self::assertTrue($c->contains(new \DateTime('2012-03-04')));
        self::assertTrue($c->contains(new \DateTime('2012-04-04')));
        self::assertTrue($c->contains(new \DateTime('2012-05-04')));
        self::assertFalse($c->contains(new \DateTime('2012-06-04')));

    }

    /**
     * @covers ToDate\Condition\MonthCondition::__construct
     * @covers ToDate\Condition\MonthCondition::__toString
     */
    public function testToString()
    {
        $c = new MonthCondition('3-5');
        self::assertEquals('Month = 3,4,5', (string) $c);
    }

}
