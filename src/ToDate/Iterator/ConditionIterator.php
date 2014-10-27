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


use ToDate\Condition;
use ToDate\Condition\DateConditionInterface;
use ToDate\Parser\FormalDateExpressionParser;

class ConditionIterator extends \FilterIterator
{
    /** @var DateConditionInterface */
    protected $condition;

    /**
     *
     * @param \Iterator $iterator
     * @param DateConditionInterface|string $condition
     */
    public function __construct(\Iterator $iterator, $condition)
    {
        if (is_string($condition)) {
            $p = new FormalDateExpressionParser($condition);
            $condition = $p->parse();
        }
        if (!$condition instanceof DateConditionInterface) {
            throw new \InvalidArgumentException("Condition needs to implement DateConditionInterface or must be a parsable string");
        }

        $this->condition = $condition;
        parent::__construct($iterator);
    }

    /**
     * @return bool
     */
    public function accept()
    {
        $current = $this->getInnerIterator()->current();
        return $this->condition->contains($current);
    }
}
