<?php

namespace ToDate\Condition;

/**
 * Test class for NeverCondition.
 * Generated by PHPUnit on 2012-02-06 at 22:18:11.
 */
class NeverConditionTest extends \PHPUnit_Framework_TestCase
{


    /**
     * @covers ToDate\Condition\NeverCondition::contains
     */
    public function testContains()
    {
        $c = new NeverCondition();
        self::assertFalse($c->contains(new \DateTime('2012-04-07')));
        self::assertFalse($c->contains(new \DateTime('2012-04-05')));

    }

    /**
     * @covers ToDate\Condition\NeverCondition::__toString
     */
    public function testToStringWithSingleValue()
    {
        $c = new NeverCondition();
        self::assertEquals('Never', (string)$c);
    }

}

?>
