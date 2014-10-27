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
 * Class UnionCondition
 *
 * Implements logical OR
 * Example: "DayOfWeek = FRI OR DayOfMonth = 1-10"
 */
class UnionCondition extends AbstractLogicCondition
{
    protected static $glue = 'OR';

    protected function evaluate($a, $b)
    {
        return $a || $b;
    }
}

