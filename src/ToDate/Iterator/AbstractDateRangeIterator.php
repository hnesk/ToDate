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
use ToDate\ToDate;

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
        $this->start = ToDate::normalizeDate($start);
        $this->end = ToDate::normalizeDate($end);
        if ($this->start->getTimestamp() > $this->end->getTimestamp()) {
            throw new \InvalidArgumentException(
                sprintf(
                    'End needs to be before start, start was "%s", end was "%s"',
                    $this->start->format('Y-m-d'),
                    $this->end->format('Y-m-d')
                ),
                1414430503
            );
        }
        $this->rewind();
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
    public function getStart(): \DateTime
    {
        return clone $this->start;
    }

    /**
     * @return \DateTime
     */
    public function getEnd(): \DateTime
    {
        return clone $this->end;
    }

    /**
     * @return \DateTime
     */
    public function current(): \DateTime
    {
        return clone $this->current;
    }

    /**
     * @return int
     */
    public function key(): int
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
    public function valid(): bool
    {
        return $this->current->getTimestamp() <= $this->end->getTimestamp();
    }
}
