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

use ToDate\ToDate;

$germanHolidays = 'DayOfWeek = SAT,SUN OR DayAndMonth = 1/1 OR Date = Easter-2 OR Date = Easter+1 OR DayAndMonth = 1/5 OR Date = Easter+39 OR Date = Easter+50 OR Date = Easter+60 OR DayAndMonth = 3/10 OR DayAndMonth = 1/11 OR DayAndMonth = 25/12 OR DayAndMonth = 26/12';

$holidays = ToDate::conditionalIterator('2014-01-01', '2014-12-31' ,$germanHolidays);
foreach ($holidays as $holiday) {
    echo $holiday->format('d.m.Y, l') . PHP_EOL;
}
