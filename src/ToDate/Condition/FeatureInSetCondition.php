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
 * Class FeatureInSetCondition
 *
 * General condition to test a feature of a date expressable
 * via @see \DateTime::format against a set of values
 *
 * Example new FeatureInSetCondition('j', '1-2,30') matches each 1st, 2nd, and 30th day ('j') of a month
 */
class FeatureInSetCondition extends AbstractDateCondition
{
    /**
     * All allowed date related format strings
     * @see http://www.php.net/manual/en/function.date.php
     */
    const ALLOWED_DATE_FEATURES = 'dDjlNSwzWFmMntLoYyeIOPTZ';
    /**
     * @var array
     */
    protected $set;
    /**
     *
     * @var string
     */
    protected $features;

    /**
     *
     * @param string $features Date format characters for php date()
     * @param int|string|array $set Allowed value(s) for feature
     * @throws \InvalidArgumentException
     */
    public function __construct($features, $set)
    {
        if (!preg_match('/[' . self::ALLOWED_DATE_FEATURES . ']+/', $features)) {
            throw new \InvalidArgumentException('Features need to be one or more of "' . self::ALLOWED_DATE_FEATURES . '", but  "' . $features . '" given');
        }
        $this->features = $features;
        $this->set = array_flip(self::toArray($set));
    }

    /**
     * @param \DateTime $date
     * @return boolean
     */
    public function contains(\DateTime $date)
    {
        return isset($this->set[$date->format($this->features)]);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return self::formatSet('"' . $this->features . '"', $this->set);
    }

    /**
     * @param string $features
     * @param array $set
     * @return string
     */
    protected static function formatSet($features, $set)
    {
        return $features . ' = ' . implode(',', array_flip($set));
    }
}
