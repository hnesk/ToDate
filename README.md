# ToDate

An easy PHP date library and DSL for date Expressions

## Example
```php
<? 
    $p = new FormalDateExpressionParser('DayOfWeekOfMonth = 2,-1SAT');
    $condition = $p->parse();
        
    $soRight = 
        $condition->contains(new \DateTime('2014-11-29')) && 
        $condition->contains(new \DateTime('2014-11-08'));
        
    $soWrong = 
        $condition->contains(new \DateTime('2014-11-09')) || 
        $condition->contains(new \DateTime('2014-11-15'));
        
        $everyDayIn2014 = new DayIterator('2014-01-01', '2014-11-31');
        $every2ndAndLastSaturydayIn2014 = new ConditionIterator($everyDayIn2014, $secondOrLastSaturday);
        
        foreach ($every2ndAndLastSaturydayIn2014 as $saturday) {
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
Date = Easter+39
Date = Easter+50
DayAndMonth = 3/10

DayOfWeek = SAT,SUN AND NOT DayAndMonth = 1/1
