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
 * Class AbstractDateCondition
 *
 * Base class for all date conditions
 */
abstract class AbstractDateCondition implements DateConditionInterface
{
    /**
     * Maps numeric strings to sets
     *
     * Example: 1-3,5,9-12 => [1,2,3,5,9,10,11,12]
     *
     * @param  string|array $stringOrArray
     * @return array
     */
    protected static function toArray($stringOrArray)
    {
        if (is_array($stringOrArray)) {
            return $stringOrArray;
        } else {
            $result = array();
            $parts = array_map('trim', explode(',', $stringOrArray));
            foreach ($parts as $part) {
                if (preg_match('/([^-]+)-([^-]+)/', $part, $matches)) {
                    $start = $matches[1];
                    $end = $matches[2];
                    if (!is_numeric($start) || !is_numeric($end)) {
                        throw new \InvalidArgumentException('"' . $part . '" has to  be an numeric range');
                    } else {
                        if ($start > $end) {
                            list($start, $end) = array($end, $start);
                        }
                        for ($t = $start; $t <= $end; $t++) {
                            $result[] = $t;
                        }
                    }
                } else {
                    $result[] = $part;
                }
            }

            return $result;
        }
    }


    /**
     * Alias for contains
     * @param \DateTime $date
     * @return bool
     */
    public function __invoke(\DateTime $date) : bool
    {
        return $this->contains($date);
    }

    /**
     * @return string
     */
    public function __toString() : string
    {
        return 'Never';
    }

    /**
     * @param \DateTime $date
     * @return bool
     */
    abstract public function contains(\DateTime $date) : bool;
}
