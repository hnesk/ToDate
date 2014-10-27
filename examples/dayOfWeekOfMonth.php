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

$soRight =
    $secondOrLastSaturday->contains(new \DateTime('2014-11-29')) &&
    $secondOrLastSaturday->contains(new \DateTime('2014-11-08'));

var_dump($soRight);

$soWrong =
    $secondOrLastSaturday->contains(new \DateTime('2014-11-09')) ||
    $secondOrLastSaturday->contains(new \DateTime('2014-11-15'));

var_dump($soWrong);

$everySecondAndLastSaturydayIn2014 = ToDate::conditionalIterator('2014-01-01', '2014-12-31', $secondOrLastSaturday);

foreach ($everySecondAndLastSaturydayIn2014 as $saturday) {
    echo $saturday->format('d.m.Y, l') . PHP_EOL;
}
