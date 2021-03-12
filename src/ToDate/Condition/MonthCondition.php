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
 * Class MonthCondition
 *
 * Month base condition
 *
 * Example: "Month = 1-3"
 */
class MonthCondition extends FeatureInSetCondition
{

    /**
     * @param array|string $months
     */
    public function __construct($months)
    {
        parent::__construct('n', $months);
    }

    /**
     * @return string
     */
    public function __toString() : string
    {
        return self::formatSet('Month', $this->set);
    }
}
