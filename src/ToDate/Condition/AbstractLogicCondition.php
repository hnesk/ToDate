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
 * Class AbstractLogicCondition
 *
 * Common logic for AND an OR
 */
abstract class AbstractLogicCondition extends AbstractDateCondition
{
    protected static $glue = 'XXX';
    /**
     *
     * @var DateConditionInterface
     */
    protected $condition1;
    /**
     *
     * @var DateConditionInterface
     */
    protected $condition2;

    /**
     *
     * @param DateConditionInterface $condition1
     * @param DateConditionInterface $condition2
     */
    public function __construct($condition1, $condition2)
    {
        $this->condition1 = $condition1;
        $this->condition2 = $condition2;
    }

    /**
     *
     * @param  \DateTime $date
     * @return boolean
     */
    public function contains(\DateTime $date)
    {
        return $this->evaluate($this->condition1->contains($date), $this->condition2->contains($date));
    }

    /**
     * Performs the logic operation
     * @param bool $a
     * @param bool $b
     * @return bool
     */
    abstract protected function evaluate($a, $b);

    /**
     *
     * @return string
     */
    public function __toString()
    {
        return '(' . $this->condition1->__toString() . ') ' . static::$glue . ' (' . $this->condition2->__toString() . ')';
    }

}
