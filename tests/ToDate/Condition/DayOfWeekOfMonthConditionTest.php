<?php

namespace ToDate\Condition;

/**
 * Test class for DayOfWeekOfMonthCondition.
 * Generated by PHPUnit on 2012-02-06 at 19:35:30.
 */
class DayOfWeekOfMonthConditionTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @covers ToDate\Condition\DayOfWeekOfMonthCondition::__construct
     */
    public function testConstructor()
    {
        $c = new DayOfWeekOfMonthCondition(3, 'WED');
        self::assertEquals('DayOfWeekOfMonth = 3WED', (string) $c);
    }

    /**
     * @covers ToDate\Condition\DayOfWeekOfMonthCondition::contains
     */
    public function testContainsChecksDayOfWeek()
    {
        $c = new DayOfWeekOfMonthCondition(1, 'TUE');

        self::assertTrue($c->contains(new \DateTime('2012-02-07')));
        self::assertFalse($c->contains(new \DateTime('2012-02-06')));
        self::assertFalse($c->contains(new \DateTime('2012-02-08')));
    }

    /**
     * @covers ToDate\Condition\DayOfWeekOfMonthCondition::contains
     */
    public function testContainsChecksDayOfWeekForFirstDay()
    {
        $c = new DayOfWeekOfMonthCondition(1, 'WED');

        self::assertTrue($c->contains(new \DateTime('2012-02-01')));
        self::assertFalse($c->contains(new \DateTime('2012-02-08')));
    }

    /**
     * @covers ToDate\Condition\DayOfWeekOfMonthCondition::contains
     */
    public function testContainsChecksWeekOfMonth()
    {
        $c = new DayOfWeekOfMonthCondition(1, 'TUE');
        self::assertTrue($c->contains(new \DateTime('2012-02-07')));
        self::assertFalse($c->contains(new \DateTime('2012-02-14')));
        self::assertFalse($c->contains(new \DateTime('2012-02-21')));
        self::assertFalse($c->contains(new \DateTime('2012-02-28')));
        self::assertFalse($c->contains(new \DateTime('2012-01-31')));
    }

    /**
     * @covers ToDate\Condition\DayOfWeekOfMonthCondition::contains
     */
    public function testContainsChecksWeekOfMonthForWeek3()
    {
        $c = new DayOfWeekOfMonthCondition(3, 'TUE');
        self::assertFalse($c->contains(new \DateTime('2012-02-07')));
        self::assertFalse($c->contains(new \DateTime('2012-02-14')));
        self::assertTrue($c->contains(new \DateTime('2012-02-21')));
        self::assertFalse($c->contains(new \DateTime('2012-02-28')));
        self::assertFalse($c->contains(new \DateTime('2012-01-31')));
    }

    /**
     * @covers ToDate\Condition\DayOfWeekOfMonthCondition::contains
     */
    public function testContainsChecksWeekOfMonthForMissingWeek5()
    {
        $c = new DayOfWeekOfMonthCondition(5, 'TUE');
        self::assertFalse($c->contains(new \DateTime('2012-02-07')));
        self::assertFalse($c->contains(new \DateTime('2012-02-14')));
        self::assertFalse($c->contains(new \DateTime('2012-02-21')));
        self::assertFalse($c->contains(new \DateTime('2012-02-28')));
        self::assertFalse($c->contains(new \DateTime('2012-03-06')));
    }

    /**
     * @covers ToDate\Condition\DayOfWeekOfMonthCondition::contains
     */
    public function testContainsChecksWeekOfMonthForLastWeekday()
    {
        $c = new DayOfWeekOfMonthCondition(DayOfWeekOfMonthCondition::LAST, 'TUE');
        self::assertTrue($c->contains(new \DateTime('2012-02-28')));
        self::assertFalse($c->contains(new \DateTime('2012-02-21')));
        self::assertFalse($c->contains(new \DateTime('2012-03-06')));
    }

    /**
     * @covers ToDate\Condition\DayOfWeekOfMonthCondition::contains
     */
    public function testContainsChecksWeekOfMonthForLastWeekdayOnNextMonth()
    {
        $c = new DayOfWeekOfMonthCondition(DayOfWeekOfMonthCondition::LAST, 'THU');
        self::assertTrue($c->contains(new \DateTime('2012-02-23')));
        self::assertFalse($c->contains(new \DateTime('2012-02-16')));
        self::assertFalse($c->contains(new \DateTime('2012-03-01')));
    }

    /**
     * @covers ToDate\Condition\DayOfWeekOfMonthCondition::contains
     */
    public function testContainsChecksWeekOfMonthForLastWeekdayOnLastDayMonth()
    {
        $c = new DayOfWeekOfMonthCondition(DayOfWeekOfMonthCondition::LAST, 'WED');
        self::assertTrue($c->contains(new \DateTime('2012-02-29')));
        self::assertFalse($c->contains(new \DateTime('2012-02-22')));
        self::assertFalse($c->contains(new \DateTime('2012-03-07')));
    }

    /**
     * @covers ToDate\Condition\DayOfWeekOfMonthCondition::contains
     */
    public function testContainsChecksWeekOfMonthForPenultimateWeekday()
    {
        $c = new DayOfWeekOfMonthCondition(DayOfWeekOfMonthCondition::PENULTIMATE, 'TUE');
        self::assertTrue($c->contains(new \DateTime('2012-02-21')));
        self::assertFalse($c->contains(new \DateTime('2012-02-14')));
        self::assertFalse($c->contains(new \DateTime('2012-03-28')));
    }

    /**
     * @covers ToDate\Condition\DayOfWeekOfMonthCondition::contains
     */
    public function testContainsChecksWeekOfMonthWithMultipleWeeks()
    {
        $c = new DayOfWeekOfMonthCondition(array(2, -1), 'TUE');

        self::assertFalse($c->contains(new \DateTime('2012-02-7')));
        self::assertTrue($c->contains(new \DateTime('2012-02-14')));
        self::assertFalse($c->contains(new \DateTime('2012-02-21')));
        self::assertTrue($c->contains(new \DateTime('2012-02-28')));
    }

    /**
     * @covers ToDate\Condition\DayOfWeekOfMonthCondition::contains
     */
    public function testContainsOnYearBoundary() {
        $c = new DayOfWeekOfMonthCondition(array(2, -1), 'SAT');
        $this->assertFalse($c->contains(new \DateTime('2014-12-06')));
        $this->assertTrue($c->contains(new \DateTime('2014-12-13')));
        $this->assertFalse($c->contains(new \DateTime('2014-12-20')));
        $this->assertTrue($c->contains(new \DateTime('2014-12-27')));
    }

    /**
     * @covers ToDate\Condition\DayOfWeekOfMonthCondition::__toString
     */
    public function testToString()
    {
        $c = new DayOfWeekOfMonthCondition(1, 'TUE');
        self::assertEquals('DayOfWeekOfMonth = 1TUE', (string) $c);
    }

    /**
     * @covers ToDate\Condition\AbstractDateCondition::toArray
     * @covers ToDate\Condition\DayOfWeekOfMonthCondition::__toString
     */
    public function testToStringWithMultipleWeeks()
    {
        $c = new DayOfWeekOfMonthCondition('2,-1', 'TUE');
        self::assertEquals('DayOfWeekOfMonth = 2,-1TUE', (string) $c);
    }

}
