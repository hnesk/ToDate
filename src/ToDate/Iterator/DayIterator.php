<?php

namespace ToDate\Iterator;

/*                                                                        *
 * This file is part of the ToDate library                                *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU Lesser General Public License, either version 3   *
 * of the License, or (at your option) any later version.                 *
 *                                                                        *
 * (c) 2012-2014 Johannes Künsebeck <kuensebeck@googlemail.com            */

/**
 * Class DayIterator
 *
 * Implements an iterator to over days
 */
class DayIterator extends AbstractDateRangeIterator implements \Iterator
{
    protected function doNext()
    {
        $this->current->modify('+1 day');
    }
}
