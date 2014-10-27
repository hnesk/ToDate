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
use ToDate\Parser\FormalDateExpressionParser;

$p = new FormalDateExpressionParser('DayOfWeekOfMonth = 2,-1SAT');
$secondOrLastSaturday = $p->parse();

$soRight =
    $secondOrLastSaturday->contains(new \DateTime('2014-11-29')) &&
    $secondOrLastSaturday->contains(new \DateTime('2014-11-08'));

var_dump($soRight);

$soWrong =
    $secondOrLastSaturday->contains(new \DateTime('2014-11-09')) ||
    $secondOrLastSaturday->contains(new \DateTime('2014-11-15'));

var_dump($soWrong);

$everyDayIn2014 = new DayIterator('2014-01-01', '2014-11-31');
$every2ndAndLastSaturydayIn2014 = new ConditionIterator($everyDayIn2014, $secondOrLastSaturday);

foreach ($every2ndAndLastSaturydayIn2014 as $saturday) {
    echo $saturday->format('d.m.Y, l') . PHP_EOL;
}

