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
 * Class DayAndMonthCondition
 *
 * Example: "DayAndMonth=27/10"
 */
class DayAndMonthCondition extends FeatureInSetCondition
{

    /**
     * @param int $day
     * @param int $month
     */
    public function __construct($day, $month)
    {
        parent::__construct('j/n', (int) $day . '/' . (int) $month);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return self::formatSet('DayAndMonth', $this->set);
    }
}
