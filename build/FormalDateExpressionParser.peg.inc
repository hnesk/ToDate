<?php
/** @noinspection ALL  */

/*
WARNING: This file has been machine generated. Do not edit it, or your changes will be overwritten next time it is compiled.
Regenerate with:

$ php build/compile.php

*/

namespace ToDate\Parser\Generated;

use hafriedlander\Peg\Parser;

class FormalDateExpressionParser extends Parser\Packrat {

    /*!* DateExpression

    Token: /[\d\w-]+/
    TokenList: Token (','|'-' Token)*
    Feature: /[dDjlNSwzWFmMntLoYyeIOPTZ]+/
    Number: /[-+]?\d+/
    Unit: /days?|weeks?|months?|years?|d|w|m|y|D|W|M|Y/

    Offset: Number > Unit?

    WeekNumber: /-?[1-5]/
    WeekList: WeekNumber (',' WeekNumber)*
    DayOfWeek: 'MON'|'TUE'|'WED'|'THU'|'FRI'|'SAT'|'SUN'
    DayOfWeekList: DayOfWeek (',' DayOfWeek)*

    Day: /3[01]|[12][0-9]|0?[1-9]/
    DayList: Day ((','|'-') Day)*

    Month:/1[0-2]|0?[0-9]/
    MonthList: Month ((','|'-') Month)*

    Year:/\d{4}/
    YearList: Year ((','|'-') Year)*

    Date:Year:Year '-' Month:Month '-' Day:Day
    Easter: 'Easter' > Offset:Offset

    Equal: '=' | 'IN'

    DateExpression: 'Date' > Equal > (Date:Date|Easter:Easter)
    DateModuloExpression: 'DateModulo' > Equal > Date > '%' > Offset
    DayOfWeekOfMonthExpression:'DayOfWeekOfMonth' > Equal > WeekList DayOfWeek
    DayOfMonthExpression: 'DayOfMonth' > Equal > DayList:DayList
    DayAndMonthExpression: 'DayAndMonth' > Equal > Day:Day '/' Month:Month
    DayOfWeekExpression: 'DayOfWeek' > Equal > DayOfWeekList:DayOfWeekList
    MonthExpression: 'Month' > Equal > MonthList:MonthList
    YearExpression: 'Year' > Equal > YearList:YearList
    FeatureExpression: '"' > Feature:Feature > '"' > Equal > TokenList:TokenList
    NotExpression: 'NOT(' > operand:Result > ')'
    Expression: NotExpression | DateExpression | DateModuloExpression | DayOfWeekOfMonthExpression | DayOfMonthExpression | DayAndMonthExpression | DayOfWeekExpression | MonthExpression | YearExpression | FeatureExpression |  '(' > Result > ')'

    AndExpression: 'AND' > operand:Expression >
    OrExpression: 'OR' > operand:Expression >

    Result: Expression > (AndExpression | OrExpression) *

    */
}
