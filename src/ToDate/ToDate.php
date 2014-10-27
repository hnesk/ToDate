<?php
/**
 * @author Johannes Künsebeck <jkuensebeck@taz.de>
 * @package 
 * @license proprietary
 * @copyright  2014 contrapress Satz u. Druck GmbH Neue KG
 * 
 * Created: 27.10.14 18:04
 */

namespace ToDate;


use ToDate\Iterator\ConditionIterator;
use ToDate\Iterator\DayIterator;
use ToDate\Parser\FormalDateExpressionParser;
use ToDate\Condition\DateConditionInterface;

/**
 * Class ToDate
 *
 * Static entry point for more DX
 */
class ToDate {

    /**
     * @param string $condition
     * @return DateConditionInterface
     */
    public static function condition($condition) {
        if (is_string($condition)) {
            $p = new FormalDateExpressionParser($condition);
            $condition = $p->parse();
        }
        return $condition;
    }

    /**
     * @param \DateTime|string $start
     * @param \DateTime|string|null $end
     * @param DateConditionInterface|string $condition
     * @return \Iterator
     */
    public static function conditionalIterator($start, $end, $condition) {
        $start = self::normalizeDate($start);
        $end = self::normalizeDate($end);
        $condition = self::condition($condition);
        return new ConditionIterator(new DayIterator($start, $end), $condition);
    }

    /**
     *
     * @param  \DateTime|string|null $date
     * @param  string    $modify
     * @return \DateTime|null
     */
    public static function normalizeDate($date = null, $modify = '')
    {
        if (!$date) {
            return null;
        }
        $result = $date instanceof \DateTime ? clone $date : new \DateTime($date);
        $result->setTime(0, 0, 0);
        if ($modify) {
            $result->modify($modify);
        }
        return $result;
    }
} 