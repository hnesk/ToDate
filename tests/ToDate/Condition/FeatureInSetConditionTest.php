<?php

namespace ToDate\Condition;

/**
 * Test class for FeatureInSetCondition.
 * Generated by PHPUnit on 2012-02-06 at 22:18:11.
 */
class FeatureInSetConditionTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @covers ToDate\Condition\FeatureInSetCondition::__construct
     * @expectedException \InvalidArgumentException
     */
    public function testConstructorThrowsExceptionWithInvalidFeature()
    {
        new FeatureInSetCondition('X', 3);
    }

    /**
     * @covers ToDate\Condition\FeatureInSetCondition::__construct
     * @covers ToDate\Condition\FeatureInSetCondition::__toString
     */
    public function testToStringWithComplexFeature()
    {
        $c = new FeatureInSetCondition('Ymd', '20120412');
        self::assertEquals('"Ymd" = 20120412', (string) $c);
    }

}