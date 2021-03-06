<?php

namespace ToDate\Condition;

use PHPUnit\Framework\TestCase;

/**
 * Test class for AlwaysCondition.
 * Generated by PHPUnit on 2012-02-06 at 22:18:11.
 */
class AlwaysConditionTest extends TestCase
{

    /**
     * @covers ToDate\Condition\AlwaysCondition::contains
     */
    public function testContains()
    {
        $c = new AlwaysCondition();
        self::assertTrue($c->contains(new \DateTime('2012-04-07')));
        self::assertTrue($c->contains(new \DateTime('2012-04-05')));

    }

    /**
     * @covers ToDate\Condition\AlwaysCondition::__toString
     */
    public function testToStringWithSingleValue()
    {
        $c = new AlwaysCondition();
        self::assertEquals('Always', (string) $c);
    }

}
