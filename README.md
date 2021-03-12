# ToDate

A PHP date expression library with a corresponding domain specific language (DSL)

## Describing DateConditions as strings (DSL)

This library contains a DSL (domain specific language) to describe complex date scenarios as simple strings. 
This DSL expressions get parsed to a tree of expressions, that can be evaluated for any given date.

Sounds complicated? No it isn't.

Imagine your garbage gets picked up, every first monday each month. How would communicate that fact to a machine?

```php
use ToDate\ToDate;
$garbageTime = 'DayOfWeekOfMonth=1MON';
foreach (ToDate::conditionalIterator('2021-01-01', '2021-12-31', $garbageTime) as $garbageDay) {
    echo $garbageDay->format('d.m.Y, l') . PHP_EOL;
}
```
What about every first and third monday each month?
```php
$garbageTime = 'DayOfWeekOfMonth=1,3MON';
```
What about every second and last monday each month? (using pythons notion of negative numbers as counting from the end).
```php
$garbageTime = 'DayOfWeekOfMonth=2,-1MON';
```
Ok, let's say every monday, but not if its Easter monday (constant `Easter` means Easter sunday) 
```php
$garbageTime = 'DayOfWeek=MON AND(NOT(Date=Easter+1)';
```
Or whit monday (50 days after Easter sunday), independence day, or christmas?
```php
$garbageTime = 'DayOfWeek=MON AND NOT(Date=Easter+1 OR Date=Easter+50 OR DayAndMonth=04/07 OR DayAndMonth=25/12 OR DayAndMonth=26/12)';
```

All date conditions in the  [ToDate/Condition](src/ToDate/Condition) namespace can be created with the corresponding DSL string syntax 

### DSL Building Blocks

All of these conditions are mapped to single `\ToDate\Condition\AbstractDateCondition` instance. 

#### Date

Just one fixed date, example only on Independence Day 2021

```php
\ToDate\ToDate::condition('Date=2021-07-04') == new \ToDate\Condition\DateCondition(new DateTime('2021-07-04'));
```

#### Easter based date conditions

Every whit sunday

```php
\ToDate\ToDate::condition('Date=Easter+49') == new \ToDate\Condition\EasterBasedCondition(\ToDate\Condition\EasterBasedCondition::WHIT_SUNDAY /* or 49 */);
```

#### DateModulo

Every 2 weeks (14 days) starting from 2021-03-12

```php
\ToDate\ToDate::condition('DateModule=2021-03-12%14') == new \ToDate\Condition\DateModuloOffsetCondition(new DateTime('2021-03-12'), 14);
```

#### DayAndMonth

Every independence day

```php
\ToDate\ToDate::condition('DayAndMonth=4/7') == new \ToDate\Condition\DayAndMonthCondition(4,7);
```

#### DayOfMonth

Every 1st and 15th each month

```php
\ToDate\ToDate::condition('DayOfMonth=1,15') == new \ToDate\Condition\DayOfMonthCondition([1,15]);
```

or every 1st till 9th each month

```php
\ToDate\ToDate::condition('DayOfMonth=1-9') == new \ToDate\Condition\DayOfMonthCondition([1,2,3,4,5,6,7,8,9]);
```

#### DayOfWeek

Every saturday and sunday
```php
\ToDate\ToDate::condition('DayOfWeek=SAT,SUN') == new \ToDate\Condition\DayOfWeekCondition([\ToDate\Condition\DayOfWeekCondition::SAT, \ToDate\Condition\DayOfWeekCondition::SUN]);
```


#### DayOfWeekMonth

Every 1st and 3rd monday
```php
\ToDate\ToDate::condition('DayOfWeekOfMonth=1,3MON') == new \ToDate\Condition\DayOfWeekOfMonthCondition([1,3], \ToDate\Condition\DayOfWeekCondition::MON);
```

Every 2nd and last (=-1 like in python) monday
```php
\ToDate\ToDate::condition('DayOfWeekOfMonth=2,-1MON') == new \ToDate\Condition\DayOfWeekOfMonthCondition([1,3], \ToDate\Condition\DayOfWeekCondition::MON);
```

#### Month

In the summertime 
```php
\ToDate\ToDate::condition('Month=3-10') == new \ToDate\Condition\MonthCondition([3,4,5,6,7,8,9,10]);
```

#### Year

The corona years 
```php
\ToDate\ToDate::condition('Year=2020,2021') == new \ToDate\Condition\YearCondition([2020,2021]);
```

### Combinig Conditions with logical operators

All conditions can be combined with `AND`, `OR` and `NOT` to form complex date conditions.

```php
\ToDate\ToDate::condition('DayOfWeek=MON AND NOT(Date=Easter+1)') == new \ToDate\Condition\IntersectionCondition(
    new \ToDate\Condition\DayOfWeekCondition(\ToDate\Condition\DayOfWeekCondition::MON),
    new \ToDate\Condition\NotCondition(new \ToDate\Condition\EasterBasedCondition(1))
);
```

## Examples

see also the [executable examples](examples)

```php
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


/* All german holidays 2021 in one simple string! */
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
```
