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
 * Class NotCondition
 *
 * Negation
 *
 * Example: "NOT DayOfMonth = 4"
 */
class NotCondition extends AbstractDateCondition
{
    /**
     * @var DateConditionInterface
     */
    protected $condition;

    /**
     *
     * @param DateConditionInterface $condition
     */
    public function __construct($condition)
    {
        $this->condition = $condition;
    }

    /**
     * @param \DateTime $date
     * @return bool
     */
    public function contains(\DateTime $date)
    {
        return !$this->condition->contains($date);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return 'NOT(' . $this->condition->__toString() . ')';
    }
}


?>
