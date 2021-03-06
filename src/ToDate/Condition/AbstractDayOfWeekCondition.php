<?php

namespace ToDate\Condition;

/*                                                                        *
 * This file is part of the ToDate library                                *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU Lesser General Public License, either version 3   *
 * of the License, or (at your option) any later version.                 *
 *                                                                        *
 * (c) 2012-2014 Johannes Künsebeck <kuensebeck@googlemail.com            */

/**
 * Class AbstractDayOfWeekCondition
 *
 * Common logic for DayOfWeek and DayOfWeekOfMonth cases
 */
abstract class AbstractDayOfWeekCondition extends AbstractDateCondition
{

    const MON = 1;
    const TUE = 2;
    const WED = 3;
    const THU = 4;
    const FRI = 5;
    const SAT = 6;
    const SUN = 7;

    /**
     *
     * @var array
     */
    static $LOOKUP = array(
        'MON' => self::MON,
        'TUE' => self::TUE,
        'WED' => self::WED,
        'THU' => self::THU,
        'FRI' => self::FRI,
        'SAT' => self::SAT,
        'SUN' => self::SUN
    );

    /**
     * reverse lookup
     * @var array
     */
    static $PUKOOL = array();

    /**
     * Ensure reverse lookup table
     */
    public function __construct()
    {
        if (!self::$PUKOOL) {
            self::$PUKOOL = array_flip(self::$LOOKUP);
        }
    }

    /**
     * build an array of weekday number => flag
     *
     * Input can be anything, an array or single value or comma separated string of
     * integers or symbolic weekday names, eg:
     *
     * array(1,3,5) => Monday, Wednesday, Friday => array(1=>true, 3=>true, 5=> true)
     * AbstractDayOfWeekCondition::TUE => Tuesday => array(2=>true)
     * "MON,TUE" => Monday, Tuesday => array(1 => true, 2 => true)
     * array('MON','THU') => array(1 => true, 4 => true)
     *
     * @param string|array|int $daysOfWeek
     * @return array
     * @throws \InvalidArgumentException
     */
    protected static function prepareWeekdays($daysOfWeek) : array
    {
        $daysOfWeek = self::toArray($daysOfWeek);
        $result = array();
        foreach ($daysOfWeek as $dayOfWeek) {
            $result[self::lookupWeekday($dayOfWeek)] = true;
        }

        return $result;
    }

    /**
     *
     * @param  string|int                $dayOfWeek
     * @return int
     * @throws \InvalidArgumentException
     */
    public static function lookupWeekday($dayOfWeek)
    {
        $dayOfWeek = trim($dayOfWeek);
        if (!is_numeric($dayOfWeek)) {
            if (!isset(self::$LOOKUP[$dayOfWeek])) {
                throw new \InvalidArgumentException('Day of needs to be one of MON,TUE,WED,THU,FRI,SAT,SUN or one of the class constants, but was: ' . $dayOfWeek);
            } else {
                $dayOfWeek = self::$LOOKUP[$dayOfWeek];
            }
        } else {
            if ($dayOfWeek < self::MON || $dayOfWeek > self::SUN) {
                throw new \InvalidArgumentException('Day of week needs to be one of DayOfWeekCondition::MON, ..., but was: ' . $dayOfWeek);
            }
        }

        return $dayOfWeek;
    }

    /**
     * Translates numeric to Symbolic Weekday names
     *
     * @param array $daysOfWeek
     * @return array
     */
    protected static function getSymbolicWeekDays(array $daysOfWeek): array
    {
        return array_intersect_key(self::$PUKOOL, $daysOfWeek);
    }

}
