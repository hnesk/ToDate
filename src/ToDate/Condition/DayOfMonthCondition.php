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
 * Class DayOfMonthCondition
 *
 * Example: "DayOfMonth = 1,8"
 */
class DayOfMonthCondition extends FeatureInSetCondition
{

    /**
     *
     * @param array|string $days
     */
    public function __construct($days)
    {
        parent::__construct('j', $days);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return self::formatSet('DayOfMonth', $this->set);
    }
}
