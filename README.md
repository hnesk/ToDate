# ToDate

An easy PHP date library and DSL for date Expressions

## Example
```php
    <?php
 
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
        
```

## Basic Expressions

DateExpression

DateModuloExpression

DayOfWeekOfMonthExpression

DayOfMonthExpression

DayAndMonthExpression

DayOfWeekExpression

MonthExpression

YearExpression

FeatureExpression

## Logical Expressions

AndExpression

OrExpression

NotExpression

## Examples

DayOfWeek = SAT,SUN

DayAndMonth = 1/1

Date = Easter-2

Date = Easter

DayAndMonth = 1/5

DayOfWeek = SAT,SUN AND NOT DayAndMonth = 1/1
