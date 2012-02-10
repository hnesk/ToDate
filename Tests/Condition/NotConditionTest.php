<?php

namespace ToDate\Condition;

require_once TODATE_BASEDIR . '/ToDate/Condition/NotCondition.php';
require_once TODATE_BASEDIR . '/ToDate/Condition/AlwaysCondition.php';
require_once TODATE_BASEDIR . '/ToDate/Condition/NeverCondition.php';

/**
 * Test class for NotCondition.
 * Generated by PHPUnit on 2012-02-06 at 22:18:11.
 */
class NotConditionTest extends \PHPUnit_Framework_TestCase {

	/**
	 * @covers ToDate\Condition\NotCondition::__construct
	 * @covers ToDate\Condition\NotCondition::contains
	 */
	public function testNotAlwaysIsNeverTrueContains() {
		$c = new NotCondition(new AlwaysCondition());
		self::assertFalse($c->contains(new \DateTime('2012-04-05')));
	}

	/**
	 * @covers ToDate\Condition\NotCondition::contains
	 */
	public function testNotNeverIsAlwaysTrueContains() {
		$c = new NotCondition(new NeverCondition());
		self::assertTrue($c->contains(new \DateTime('2012-04-05')));
	}
	/**
	 * @covers ToDate\Condition\NotCondition::contains
	 */
	public function testNotNotAlwaysIsAlwaysTrueContains() {
		$c = new NotCondition(new NotCondition(new AlwaysCondition()));
		self::assertTrue($c->contains(new \DateTime('2012-04-05')));
	}
	
	/**
	 * @covers ToDate\Condition\NotCondition::__toString
	 */
	public function testToStringWithSingleValue() {
		$c = new NotCondition(new AlwaysCondition());
		self::assertEquals('NOT(Always)', (string)$c);
	}
	
}

?>
