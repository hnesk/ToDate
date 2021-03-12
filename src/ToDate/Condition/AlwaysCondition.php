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
 * Class AlwaysCondition
 *
 * Always true
 * Example: "Always"
 */
class AlwaysCondition extends AbstractDateCondition
{
    /**
     *
     * @param  \DateTime $date
     * @return boolean
     */
    public function contains(\DateTime $date) : bool
    {
        return true;
    }

    /**
     *
     * @return string
     */
    public function __toString() : string
    {
        return 'Always';
    }
}
