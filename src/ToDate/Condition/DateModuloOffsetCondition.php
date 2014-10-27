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
 * Class DateModuloOffsetCondition
 *
 * For recurring dates (weekly, bi-weekly) based on a specific date
 *
 * Example: "DateModulo = 2014-10-27%14d"
 * every 14 days (forward and backward) based on 2014-10-27
 */
class DateModuloOffsetCondition extends AbstractDateCondition
{

    /**
     * @var $date
     */
    protected $date;

    /**
     *
     * @var int
     */
    protected $offsetInDays;

    /**
     *
     * @param \DateTime $date
     * @param int $offsetInDays
     */
    public function __construct(\DateTime $date, $offsetInDays)
    {
        $this->date = self::normalizeDate($date);
        $this->offsetInDays = $offsetInDays;
    }

    /**
     *
     * @param \DateTime $date
     * @return boolean
     */
    public function contains(\DateTime $date)
    {
        $days = $this->date->diff(self::normalizeDate($date))->days;
        return $days % $this->offsetInDays === 0;
    }

    /**
     *
     * @return string
     */
    public function __toString()
    {
        return 'DateModulo = ' . $this->date->format('Y-m-d') . '%' . $this->offsetInDays . 'd';
    }
}
