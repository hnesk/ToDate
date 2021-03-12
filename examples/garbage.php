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

#$garbageTime = 'DayOfWeek=MON AND NOT(Date=Easter+1 OR Date=Easter+50 OR DayAndMonth = 04/07 OR DayAndMonth = 25/12 OR DayAndMonth = 26/12';
$garbageTime = $argv[1];

foreach (ToDate::conditionalIterator('2021-01-01', '2021-12-31' ,$garbageTime) as $day) {
    echo $day->format('d.m.Y, l') . PHP_EOL;
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

