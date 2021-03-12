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
 * Class DateCondition
 *
 * Tests against one specific date
 *
 * Example: "Date = 2014-10-27"
 */
class DateCondition extends AbstractDateCondition
{

    /**
     * @var \DateTime $date
     */
    protected $date;

    /**
     * @param \DateTime|string $date
     */
    public function __construct($date)
    {
        $this->date = ToDate::normalizeDate($date);
    }

    /**
     *
     * @param  \DateTime $date
     * @return boolean
     */
    public function contains(\DateTime $date) : bool
    {
        return $this->date == ToDate::normalizeDate($date);
    }

    /**
     *
     * @return string
     */
    public function __toString() : string
    {
        return 'Date = ' . $this->date->format('Y-m-d');
    }
}
