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

/* All german holidays in one simple string! */
$germanHolidays = 'DayAndMonth = 1/1 OR Date = Easter-2 OR Date = Easter+1 OR DayAndMonth = 1/5 OR Date = Easter+39 OR Date = Easter+50 OR Date = Easter+60 OR DayAndMonth = 3/10 OR DayAndMonth = 1/11 OR DayAndMonth = 25/12 OR DayAndMonth = 26/12';

$holidays = ToDate::conditionalIterator('2021-01-01', '2021-12-31' ,$germanHolidays);
foreach ($holidays as $holiday) {
    echo $holiday->format('d.m.Y, l') . PHP_EOL;
}
# 01.01.2021, Friday
# 02.04.2021, Friday
# 05.04.2021, Monday
# 01.05.2021, Saturday
# 13.05.2021, Thursday
# 24.05.2021, Monday
# 03.06.2021, Thursday
# 03.10.2021, Sunday
# 01.11.2021, Monday
# 25.12.2021, Saturday
# 26.12.2021, Sunday

