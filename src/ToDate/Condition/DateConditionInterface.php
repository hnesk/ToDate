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
 * Interface DateConditionInterface
 */
interface DateConditionInterface
{
    /**
     * @param \DateTime
     * @return boolean
     */
    public function contains(\DateTime $date) : bool;

    /**
     * @return string
     */
    public function __toString() : string;

}
