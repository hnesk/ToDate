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
 * Class ErrorCondition
 *
 * Dummy condition as a return value for DateConditions
 */
class ErrorCondition extends AbstractDateCondition
{

    /** @var string */
    protected $errorMessage;

    /** @var string */
    protected $originalExpression;

    /**
     * @param string $errorMessage
     * @param string $originalExpression
     */
    public function __construct($errorMessage, $originalExpression)
    {
        $this->errorMessage = $errorMessage;
        $this->originalExpression = $originalExpression;
    }

    /**
     *
     * @param  \DateTime $date
     * @return boolean
     */
    public function contains(\DateTime $date)
    {
        return false;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return 'Error In:' . $this->originalExpression . ', : ' . $this->errorMessage;
    }
}
