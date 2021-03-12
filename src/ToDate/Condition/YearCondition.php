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
 * Class YearCondition
 *
 * Implements year based condition
 * Example: "Year = 2010-2015"
 */
class YearCondition extends FeatureInSetCondition
{
    /**
     * @param array|string $years
     */
    public function __construct($years)
    {
        parent::__construct('Y', $years);
    }

    /**
     * @return string
     */
    public function __toString() : string
    {
        return self::formatSet('Year', $this->set);
    }
}
