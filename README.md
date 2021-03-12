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

### DateCondition
```php
    <?php

    $helloween2014 = new DateCondition('2014-10-31');
    // alternative
    $helloween2014 = new DateCondition(new \DateTime('2014-10-31'));
```

### DateModuloOffsetCondition
```php
    <?php

    $everySecondFridayStartingHelloween = new DateModuloOffsetCondition('2014-10-31',14);
```

### DayOfWeekOfMonthCondition
```php
    <?php

    $everySecondAndLastFridayAMonth = new DayOfWeekOfMonthCondition([2,-1], DayOfWeekOfMonthCondition::FRI);
    // alterantive 
    $everySecondAndLastFridayAMonth = new DayOfWeekOfMonthCondition([2,-1], 'FRI');
```

### DayOfMonthCondition
```php
    <?php

    $every1stAnd15th = new DayOfMonthCondition([1,15]);
```

### DayAndMonthCondition
```php 
    <?php

    $everyHelloween= new DayAndMonthCondition(31,10);
```

### DayOfWeekCondition
```php
    <?php
    
    $weekend = new DayOfWeekCondition([DayOfWeekCondition::SAT, DayOfWeekCondition::SUN]);
    // alternative
    $weekend = new DayOfWeekCondition('6-7');
```

### MonthCondition
```php
    <?php
    
    $summer = new MonthCondition([4,5,6,7,8,9,10]);
    // alternative
    $summer = new MonthCondition('4-10');
```
### YearExpression
```php
    <?php
    
    $future = new YearCondition('2020-2099');
```

### EasterBasedCondition
```php
    <?php
    
    $easterSunday = new EasterBasedCondition(0);
    $easterMonday = new EasterBasedCondition(1);
    $elevenDaysAfterEasterSunday = new EasterBasedCondition(11);
    // All easter constants
    $goodFriday        = new EasterBasedCondition(EasterBasedCondition::GOOD_FRIDAY);
    $holySaturday      = new EasterBasedCondition(EasterBasedCondition::HOLY_SATURDAY);
    $easterSunday      = new EasterBasedCondition(EasterBasedCondition::EASTER_SUNDAY);
    $easterMonday      = new EasterBasedCondition(EasterBasedCondition::EASTER_MONDAY);
    $ascensionThursday = new EasterBasedCondition(EasterBasedCondition::ASCENSION_THURSDAY);
    $whitSunday        = new EasterBasedCondition(EasterBasedCondition::WHIT_SUNDAY);
    $whitMonday        = new EasterBasedCondition(EasterBasedCondition::WHIT_MONDAY);
    $corpusChristi     = new EasterBasedCondition(EasterBasedCondition::CORPUS_CHRISTI);
    
```


## Logical Expressions

### IntersectionCondition or "AND"
```php
    <?php
    
    $allSaturydaysInSummer = new IntersectionCondition(new MonthCondition('4-10'), new DayOfWeekCondition('SAT');
```

### UnionCondition or "OR"
```php
    <?php
    
    $favoriteDays = new IntersectionCondition(new DayOfMonthCondition(25,12), new DayOfWeekCondition('SAT,SUN');
```

### NotCondition 
```php
    <?php
    
    $winter= new NotCondition(new MonthCondition('4-10'));
```

## DSL

DayOfWeek = SAT,SUN

DayAndMonth = 1/1

Date = Easter-2

Date = Easter

DayAndMonth = 1/5

DayOfWeek = SAT,SUN AND NOT DayAndMonth = 1/1
