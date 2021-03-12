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

$secondOrLastSaturday = ToDate::condition('DayOfWeekOfMonth = 2,-1SAT');

var_dump($secondOrLastSaturday->contains(new \DateTime('2014-11-29')));
# bool(true)

var_dump($secondOrLastSaturday->contains(new \DateTime('2014-11-09')));
# bool(false)

$everySecondAndLastSaturydayIn2021 = ToDate::conditionalIterator('2021-01-01', '2021-12-31', $secondOrLastSaturday);

foreach ($everySecondAndLastSaturydayIn2021 as $saturday) {
    echo $saturday->format('d.m.Y, l') . PHP_EOL;
}
# 09.01.2021, Saturday
# 30.01.2021, Saturday
# 13.02.2021, Saturday
# ...
# 11.12.2021, Saturday
# 25.12.2021, Saturday
