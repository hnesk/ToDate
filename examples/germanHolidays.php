<?php
/*                                                                        *
 * This file is part of the ToDate library                                *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU Lesser General Public License, either version 3   *
 * of the License, or (at your option) any later version.                 *
 *                                                                        *
 * (c) 2012-2014 Johannes Künsebeck <kuensebeck@googlemail.com            */

require_once __DIR__ . '/../vendor/autoload.php';

use ToDate\Iterator\ConditionIterator;
use ToDate\Iterator\DayIterator;

$germanHolidays = 'DayOfWeek = SAT,SUN OR DayAndMonth = 1/1 OR Date = Easter-2 OR Date = Easter+1 OR DayAndMonth = 1/5 OR Date = Easter+39 OR Date = Easter+50 OR Date = Easter+60 OR DayAndMonth = 3/10 OR DayAndMonth = 1/11 OR DayAndMonth = 25/12 OR DayAndMonth = 26/12';

$it = new ConditionIterator(new DayIterator('2014-01-01', '2014-12-31'), $germanHolidays);
foreach ($it as $date) {
    echo $date->format('d.m.Y, l') . PHP_EOL;
}
