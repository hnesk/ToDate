<?php

namespace ToDate\Condition;

use PHPUnit\Framework\TestCase;

/**
 * Test class for YearCondition.
 * Generated by PHPUnit on 2012-02-06 at 22:18:11.
 */
class YearConditionTest extends TestCase
{

    /**
     * @covers ToDate\Condition\YearCondition::__construct
     * @covers ToDate\Condition\YearCondition::contains
     */
    public function testContainsFindsSingleYear()
    {
        $c = new YearCondition(2012);
        self::assertFalse($c->contains(new \DateTime('2013-04-04')));
        self::assertFalse($c->contains(new \DateTime('2011-02-04')));
        self::assertTrue($c->contains(new \DateTime('2012-03-04')));
    }

    /**
     * @covers ToDate\Condition\YearCondition::__construct
     * @covers ToDate\Condition\YearCondition::contains
     */
    public function testContainsFindsYears()
    {
        $c = new YearCondition(array(2012, 2013));
        self::assertFalse($c->contains(new \DateTime('2011-02-04')));
        self::assertTrue($c->contains(new \DateTime('2012-03-04')));
        self::assertTrue($c->contains(new \DateTime('2013-04-04')));
        self::assertFalse($c->contains(new \DateTime('2014-05-04')));
    }

    /**
     * @covers ToDate\Condition\YearCondition::__construct
     * @covers ToDate\Condition\YearCondition::contains
     */
    public function testContainsFindsYearRange()
    {
        $c = new YearCondition('2012-2014');
        self::assertFalse($c->contains(new \DateTime('2011-02-04')));
        self::assertTrue($c->contains(new \DateTime('2012-03-04')));
        self::assertTrue($c->contains(new \DateTime('2013-04-04')));
        self::assertTrue($c->contains(new \DateTime('2014-05-04')));
        self::assertFalse($c->contains(new \DateTime('2015-06-04')));

    }

    /**
     * @covers ToDate\Condition\YearCondition::__construct
     * @covers ToDate\Condition\YearCondition::__toString
     */
    public function testToString()
    {
        $c = new YearCondition('2012-2015');
        self::assertEquals('Year = 2012,2013,2014,2015', (string) $c);
    }

}
