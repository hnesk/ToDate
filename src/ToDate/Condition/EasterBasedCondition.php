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
 * Class EasterBasedCondition
 *
 * Date condition base on the date of easter
 *
 *
 * Example: "Easter" - Easter Sunday
 * Example: "Easter - 2" - Good Friday
 * Example: "Easter + 50" - Whit Monday
 */
class EasterBasedCondition extends AbstractDateCondition
{
    const GOOD_FRIDAY = -2;
    const HOLY_SATURDAY = -1;
    const EASTER_SUNDAY = 0;
    const EASTER_MONDAY = 1;
    const ASCENSION_THURSDAY = 40;
    const WHIT_SUNDAY = 49;
    const WHIT_MONDAY = 50;
    const CORPUS_CHRISTI = 61;

    /** @var array  */
    protected static $easterCache = array();

    /** @var int */
    protected $offset;

    /**
     * @param int $offset Offset from easter
     */
    public function __construct($offset = 0)
    {
        $this->offset = -1 * $offset;
    }

    /**
     * @param \DateTime $date
     * @return boolean
     */
    public function contains(\DateTime $date)
    {
        $testDate = self::normalizeDate($date, $this->offset . ' days');

        list($weekDay, $dayCheck, $year) = explode('-', $testDate->format('N-nd-Y'));

        // easter is never after 25.04, never before 22.03 and always on a sunday
        if ($dayCheck > 425 || $weekDay != 7 || $dayCheck < 322) {
            return false;
        }

        if (!isset(self::$easterCache[$year])) {
            $easterDate = new \DateTime('21-03-' . $year);
            $easterDate->modify(easter_days($year) . ' days');
            self::$easterCache[$year] = $easterDate;
        } else {
            $easterDate = self::$easterCache[$year];
        }
        return $testDate == $easterDate;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return 'Easter' . ($this->offset != 0 ? ($this->offset < 0 ? '+' : '') . (-1 * $this->offset) : '');
    }
}
