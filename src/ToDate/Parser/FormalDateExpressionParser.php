<?php

namespace ToDate\Parser;

/*                                                                        *
 * This file is part of the ToDate library                                *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU Lesser General Public License, either version 3   *
 * of the License, or (at your option) any later version.                 *
 *                                                                        *
 * (c) 2012-2014 Johannes Künsebeck <kuensebeck@googlemail.com            */

use ToDate\Condition\DateCondition;
use ToDate\Condition\DateConditionInterface;
use ToDate\Condition\DateModuloOffsetCondition;
use ToDate\Condition\DayAndMonthCondition;
use ToDate\Condition\DayOfMonthCondition;
use ToDate\Condition\DayOfWeekCondition;
use ToDate\Condition\DayOfWeekOfMonthCondition;
use ToDate\Condition\EasterBasedCondition;
use ToDate\Condition\FeatureInSetCondition;
use ToDate\Condition\IntersectionCondition;
use ToDate\Condition\MonthCondition;
use ToDate\Condition\NotCondition;
use ToDate\Condition\UnionCondition;
use ToDate\Condition\YearCondition;
use ToDate\Parser\Generated\FormalDateExpressionParser as GeneratedFormalDateExpressionParser;

/**
 * Class FormalDateExpressionParser
 *
 * Parses date expressions
 */
class FormalDateExpressionParser extends GeneratedFormalDateExpressionParser
{
    protected static $unitLookup = array(
        'D' => 1,
        'W' => 7,
        'M' => 30,
        'Y' => 365
    );
    protected $lastResult = array();

    /*
     * Functions for DayOfWeekOfMonthExpression
     */

    /**
     *
     * @return DateConditionInterface
     */
    public function parse()
    {
        $result = $this->match_Result();
        $this->lastResult = $result;

        return $result['Expression'];
    }

    public function getResult()
    {
        return $this->lastResult;
    }

    protected function Expression_DayOfWeekOfMonthExpression(&$self, $sub)
    {
        $self['Expression'] = new DayOfWeekOfMonthCondition($sub['WeekList'], $sub['DayOfWeek']);
    }

    /*
     * Functions for DayOfWeekExpression
     */

    protected function DayOfWeekOfMonthExpression_WeekList(&$self, $sub)
    {
        $self['WeekList'] = self::createList($sub);
    }

    /*
     * Functions for DateExpression
     */

    protected static function createList($sub)
    {
        return array_map('trim', explode(',', $sub['text']));
    }

    protected function DayOfWeekOfMonthExpression_DayOfWeek(&$self, $sub)
    {
        $self['DayOfWeek'] = $sub['text'];
    }

    protected function Expression_DayOfWeekExpression(&$self, $sub)
    {
        $self['Expression'] = new DayOfWeekCondition($sub['DayOfWeekList']['text']);
    }

    /*
     * Functions for DateOffsetExpression
     */

    protected function Expression_DateExpression(&$self, $sub)
    {
        if (isset($sub['Date'])) {
            $self['Expression'] = new DateCondition($sub['Date']);
        } else {
            if (isset($sub['EasterOffset'])) {
                $self['Expression'] = new EasterBasedCondition($sub['EasterOffset']);
            }
        }
    }

    protected function DateExpression_Date(&$self, $sub)
    {
        $self['Date'] = self::createDate($sub);
    }

    protected static function createDate($sub)
    {
        $date = new \DateTime();
        $date->setDate($sub['Year']['text'], $sub['Month']['text'], $sub['Day']['text']);
        $date->setTime(0, 0, 0);

        return $date;
    }

    protected function DateExpression_Easter(&$self, $sub)
    {
        $self['EasterOffset'] = $sub['Offset']['Number'];
    }

    protected function Expression_DateModuloExpression(&$self, $sub)
    {
        $self['Expression'] = new DateModuloOffsetCondition($sub['Date'], $sub['Offset']);
    }

    /*
     * Functions for DayOfMonthExpression
     */

    protected function DateModuloExpression_Date(&$self, $sub)
    {
        $self['Date'] = self::createDate($sub);
    }

    /*
     * Functions for DayOfMonthExpression
     */

    protected function DateModuloExpression_Offset(&$self, $sub)
    {
        $unit = isset($sub['Unit']) ? $sub['Unit'] : 'D';
        $self['Offset'] = $sub['Number'] * self::$unitLookup[$unit];

    }

    /*
     * Functions for FeatureExpression
     */

    protected function Offset_Unit(&$self, $sub)
    {
        $self['Unit'] = strtoupper(substr($sub['text'], 0, 1));
    }

    /*
     * Functions for MonthExpression
     */

    protected function Offset_Number(&$self, $sub)
    {
        $self['Number'] = intval($sub['text']);
    }

    /*
     * Functions for YearExpression
     */

    protected function Expression_DayAndMonthExpression(&$self, $sub)
    {
        $self['Expression'] = new DayAndMonthCondition($sub['Day']['text'], $sub['Month']['text']);
    }

    protected function Expression_DayOfMonthExpression(&$self, $sub)
    {
        $self['Expression'] = new DayOfMonthCondition($sub['DayList']['text']);
    }

    protected function Expression_FeatureExpression(&$self, $sub)
    {
        $self['Expression'] = new FeatureInSetCondition(trim($sub['Feature']['text']), $sub['TokenList']['text']);
    }

    protected function Expression_MonthExpression(&$self, $sub)
    {
        $self['Expression'] = new MonthCondition($sub['MonthList']['text']);
    }

    protected function Expression_YearExpression(&$self, $sub)
    {
        $self['Expression'] = new YearCondition($sub['YearList']['text']);
    }

    protected function Expression_Result(&$self, $sub)
    {
        $self['Expression'] = $sub['Expression'];
    }

    /*
     * Helper functions
     */

    protected function Expression_NotExpression(&$self, $sub)
    {
        $self['Expression'] = new NotCondition($sub['operand']['Expression']);
    }

    protected function Result_Expression(&$result, $sub)
    {
        $result['Expression'] = $sub['Expression'];
    }

    protected function Result_OrExpression(&$result, $sub)
    {
        $result['Expression'] = new UnionCondition($result['Expression'], $sub['operand']['Expression']);
    }

    protected function Result_AndExpression(&$result, $sub)
    {
        $result['Expression'] = new IntersectionCondition($result['Expression'], $sub['operand']['Expression']);
    }
}
