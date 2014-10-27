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
use ToDate\ToDate;

/**
 * Class DayOfWeekOfMonthCondition
 *
 * Monthly recurring dates, based on weekdays
 *
 * Example: DayOfWeekOfMonth = 2,-1FRI
 * Every 2nd and last Friday each month
 */
class DayOfWeekOfMonthCondition extends AbstractDayOfWeekCondition
{

    const FIRST = 1;
    const SECOND = 2;
    const THIRD = 3;
    const FOURTH = 4;
    const FIFTH = 5;

    const LAST = -1;
    const ULTIMATE = -1;
    const SECOND_LAST = -2;
    const PENULTIMATE = -2;
    const THIRD_LAST = -3;
    const ANTEPENULTIMATE = -3;
    const FOURTH_LAST = -4;
    const FIFTH_LAST = -5;

    /**
     * Stores select days as a fast to check lookup table
     * @var int
     */
    protected $dayOfWeek;

    /**
     *
     * @var int
     */
    protected $weeksOfMonth;

    /**
     * @param int|array  $weeksOfMonth
     * @param int|string $dayOfWeek
     */
    public function __construct($weeksOfMonth, $dayOfWeek)
    {
        parent::__construct();
        $this->weeksOfMonth = self::toArray($weeksOfMonth);
        $this->dayOfWeek = self::lookupWeekday($dayOfWeek);
    }

    /**
     * @param  \DateTime $date
     * @return boolean
     */
    public function contains(\DateTime $date)
    {
        $date = ToDate::normalizeDate($date);
        if ($this->dayOfWeek != $date->format('N')) {
            return false;
        }

        foreach ($this->weeksOfMonth as $weekOfMonth) {
            $testDate = new \DateTime($date->format('Y-m-01'));
            if ($weekOfMonth < 0) {
                $testDate->add(new \DateInterval('P1M'));
            }

            $testDate->modify($weekOfMonth . ' ' . self::$PUKOOL[$this->dayOfWeek]);
            if ($date == $testDate) {
                return true;
            }
        }

        return false;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return 'DayOfWeekOfMonth = ' . implode(',', $this->weeksOfMonth) . self::$PUKOOL[$this->dayOfWeek];
    }
}
