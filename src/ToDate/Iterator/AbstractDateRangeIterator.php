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
 * Class AbstractDateRangeIterator
 *
 * An abstract class to implement evenly spaced periods
 * like days, weeks, 2 weeks, etc
 */
abstract class AbstractDateRangeIterator implements \Iterator
{
    /** @var \DateTime */
    protected $start;

    /** @var \DateTime */
    protected $end;

    /** @var \DateTime */
    protected $current;

    /** @var int */
    protected $iteration = 0;

    /**
     *
     * @param string|\DateTime $start
     * @param string|\DateTime $end
     */
    public function __construct($start, $end)
    {
        $this->start = self::toDate($start);
        $this->end = self::toDate($end);
        if ($this->start->getTimestamp() > $this->end->getTimestamp()) {
            list($this->start, $this->end) = array($this->end, $this->start);
        }
        $this->rewind();
    }

    /**
     * Build/clone a DateTime object out of string|DateTime
     *
     * @param string|\DateTime $date
     * @return \DateTime
     */
    protected static function toDate($date)
    {
        $dateCopy = $date instanceof \DateTime ? clone $date : new \DateTime($date);
        /* @var $dateCopy \DateTime */
        $dateCopy->setTime(0, 0, 0);
        return $dateCopy;
    }

    public function rewind()
    {
        $this->current = clone $this->start;
        $this->iteration = 0;
    }

    /**
     *
     * @return \DateTime
     */
    public function getStart()
    {
        return clone $this->start;
    }

    /**
     * @return \DateTime
     */
    public function getEnd()
    {
        return clone $this->end;
    }

    public function current()
    {
        return $this->current;
    }

    public function key()
    {
        return $this->iteration;
    }

    public function next()
    {
        $this->iteration++;
        return $this->doNext();
    }

    abstract protected function doNext();

    /**
     * @return bool
     */
    public function valid()
    {
        return $this->current->getTimestamp() <= $this->end->getTimestamp();
    }
}
