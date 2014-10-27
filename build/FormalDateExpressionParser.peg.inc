<?php
namespace ToDate\Parser\Generated;

/*!* !insert_autogen_warning */

/*                                                                        *
 * This file is part of the ToDate library                                *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU Lesser General Public License, either version 3   *
 * of the License, or (at your option) any later version.                 *
 *                                                                        *
 * (c) 2012-2014 Johannes Künsebeck <kuensebeck@googlemail.com            */

use hafriedlander\Peg\Parser\Basic;

/*!* !insert_autogen_warning */

/**
 * Class FormalDateExpressionParser
 *
 * Grammar for the peg parser
 */
class FormalDateExpressionParser extends Basic
{
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

/*!* !insert_autogen_warning */