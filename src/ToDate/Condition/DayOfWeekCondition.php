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
 * Class DayOfWeekCondition
 *
 * Example: "DayOfWeek = SAT,SUN"
 */
class DayOfWeekCondition extends AbstractDayOfWeekCondition
{
    /**
     * Stores selected days as a fast to check lookup table
     * @var array
     */
    protected $daysOfWeek;

    /**
     *
     * @param array|int|string $daysOfWeeks
     */
    public function __construct($daysOfWeeks)
    {
        parent::__construct();
        $this->daysOfWeek = self::prepareWeekdays($daysOfWeeks);
    }

    /**
     * @param  \DateTime $date
     * @return boolean
     */
    public function contains(\DateTime $date) : bool
    {
        return isset($this->daysOfWeek[$date->format('N')]);
    }

    /**
     * @return string
     */
    public function __toString() : string
    {
        return 'DayOfWeek = ' . implode(',', $this->getSymbolicWeekDays($this->daysOfWeek));
    }
}
