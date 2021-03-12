<?php
namespace ToDate\Parser\Generated;

/** @noinspection ALL  */

/*
WARNING: This file has been machine generated. Do not edit it, or your changes will be overwritten next time it is compiled.
Regenerate with:

$ php build/compile.php

*/


use hafriedlander\Peg\Parser;

class FormalDateExpressionParser extends Parser\Packrat {

    /* Token: /[\d\w-]+/ */
    protected $match_Token_typestack = ['Token'];
    function match_Token($stack = []) {
    	$matchrule = 'Token'; $result = $this->construct($matchrule, $matchrule);
    	if (($subres = $this->rx('/[\d\w-]+/')) !== \false) {
    		$result["text"] .= $subres;
    		return $this->finalise($result);
    	}
    	else { return \false; }
    }


    /* TokenList: Token (','|'-' Token)* */
    protected $match_TokenList_typestack = ['TokenList'];
    function match_TokenList($stack = []) {
    	$matchrule = 'TokenList'; $result = $this->construct($matchrule, $matchrule);
    	$_12 = \null;
    	do {
    		$key = 'match_Token'; $pos = $this->pos;
    		$subres = $this->packhas($key, $pos)
    			? $this->packread($key, $pos)
    			: $this->packwrite($key, $pos, $this->match_Token(\array_merge($stack, [$result])));
    		if ($subres !== \false) { $this->store($result, $subres); }
    		else { $_12 = \false; break; }
    		while (\true) {
    			$res_11 = $result;
    			$pos_11 = $this->pos;
    			$_10 = \null;
    			do {
    				$_8 = \null;
    				do {
    					$res_2 = $result;
    					$pos_2 = $this->pos;
    					if (\substr($this->string, $this->pos, 1) === ',') {
    						$this->pos += 1;
    						$result["text"] .= ',';
    						$_8 = \true; break;
    					}
    					$result = $res_2;
    					$this->pos = $pos_2;
    					$_6 = \null;
    					do {
    						if (\substr($this->string, $this->pos, 1) === '-') {
    							$this->pos += 1;
    							$result["text"] .= '-';
    						}
    						else { $_6 = \false; break; }
    						$key = 'match_Token'; $pos = $this->pos;
    						$subres = $this->packhas($key, $pos)
    							? $this->packread($key, $pos)
    							: $this->packwrite($key, $pos, $this->match_Token(\array_merge($stack, [$result])));
    						if ($subres !== \false) {
    							$this->store($result, $subres);
    						}
    						else { $_6 = \false; break; }
    						$_6 = \true; break;
    					}
    					while(\false);
    					if( $_6 === \true ) { $_8 = \true; break; }
    					$result = $res_2;
    					$this->pos = $pos_2;
    					$_8 = \false; break;
    				}
    				while(\false);
    				if( $_8 === \false) { $_10 = \false; break; }
    				$_10 = \true; break;
    			}
    			while(\false);
    			if( $_10 === \false) {
    				$result = $res_11;
    				$this->pos = $pos_11;
    				unset($res_11, $pos_11);
    				break;
    			}
    		}
    		$_12 = \true; break;
    	}
    	while(\false);
    	if( $_12 === \true ) { return $this->finalise($result); }
    	if( $_12 === \false) { return \false; }
    }


    /* Feature: /[dDjlNSwzWFmMntLoYyeIOPTZ]+/ */
    protected $match_Feature_typestack = ['Feature'];
    function match_Feature($stack = []) {
    	$matchrule = 'Feature'; $result = $this->construct($matchrule, $matchrule);
    	if (($subres = $this->rx('/[dDjlNSwzWFmMntLoYyeIOPTZ]+/')) !== \false) {
    		$result["text"] .= $subres;
    		return $this->finalise($result);
    	}
    	else { return \false; }
    }


    /* Number: /[-+]?\d+/ */
    protected $match_Number_typestack = ['Number'];
    function match_Number($stack = []) {
    	$matchrule = 'Number'; $result = $this->construct($matchrule, $matchrule);
    	if (($subres = $this->rx('/[-+]?\d+/')) !== \false) {
    		$result["text"] .= $subres;
    		return $this->finalise($result);
    	}
    	else { return \false; }
    }


    /* Unit: /days?|weeks?|months?|years?|d|w|m|y|D|W|M|Y/ */
    protected $match_Unit_typestack = ['Unit'];
    function match_Unit($stack = []) {
    	$matchrule = 'Unit'; $result = $this->construct($matchrule, $matchrule);
    	if (($subres = $this->rx('/days?|weeks?|months?|years?|d|w|m|y|D|W|M|Y/')) !== \false) {
    		$result["text"] .= $subres;
    		return $this->finalise($result);
    	}
    	else { return \false; }
    }


    /* Offset: Number > Unit? */
    protected $match_Offset_typestack = ['Offset'];
    function match_Offset($stack = []) {
    	$matchrule = 'Offset'; $result = $this->construct($matchrule, $matchrule);
    	$_20 = \null;
    	do {
    		$key = 'match_Number'; $pos = $this->pos;
    		$subres = $this->packhas($key, $pos)
    			? $this->packread($key, $pos)
    			: $this->packwrite($key, $pos, $this->match_Number(\array_merge($stack, [$result])));
    		if ($subres !== \false) { $this->store($result, $subres); }
    		else { $_20 = \false; break; }
    		if (($subres = $this->whitespace()) !== \false) { $result["text"] .= $subres; }
    		$res_19 = $result;
    		$pos_19 = $this->pos;
    		$key = 'match_Unit'; $pos = $this->pos;
    		$subres = $this->packhas($key, $pos)
    			? $this->packread($key, $pos)
    			: $this->packwrite($key, $pos, $this->match_Unit(\array_merge($stack, [$result])));
    		if ($subres !== \false) { $this->store($result, $subres); }
    		else {
    			$result = $res_19;
    			$this->pos = $pos_19;
    			unset($res_19, $pos_19);
    		}
    		$_20 = \true; break;
    	}
    	while(\false);
    	if( $_20 === \true ) { return $this->finalise($result); }
    	if( $_20 === \false) { return \false; }
    }


    /* WeekNumber: /-?[1-5]/ */
    protected $match_WeekNumber_typestack = ['WeekNumber'];
    function match_WeekNumber($stack = []) {
    	$matchrule = 'WeekNumber'; $result = $this->construct($matchrule, $matchrule);
    	if (($subres = $this->rx('/-?[1-5]/')) !== \false) {
    		$result["text"] .= $subres;
    		return $this->finalise($result);
    	}
    	else { return \false; }
    }


    /* WeekList: WeekNumber (',' WeekNumber)* */
    protected $match_WeekList_typestack = ['WeekList'];
    function match_WeekList($stack = []) {
    	$matchrule = 'WeekList'; $result = $this->construct($matchrule, $matchrule);
    	$_28 = \null;
    	do {
    		$key = 'match_WeekNumber'; $pos = $this->pos;
    		$subres = $this->packhas($key, $pos)
    			? $this->packread($key, $pos)
    			: $this->packwrite($key, $pos, $this->match_WeekNumber(\array_merge($stack, [$result])));
    		if ($subres !== \false) { $this->store($result, $subres); }
    		else { $_28 = \false; break; }
    		while (\true) {
    			$res_27 = $result;
    			$pos_27 = $this->pos;
    			$_26 = \null;
    			do {
    				if (\substr($this->string, $this->pos, 1) === ',') {
    					$this->pos += 1;
    					$result["text"] .= ',';
    				}
    				else { $_26 = \false; break; }
    				$key = 'match_WeekNumber'; $pos = $this->pos;
    				$subres = $this->packhas($key, $pos)
    					? $this->packread($key, $pos)
    					: $this->packwrite($key, $pos, $this->match_WeekNumber(\array_merge($stack, [$result])));
    				if ($subres !== \false) {
    					$this->store($result, $subres);
    				}
    				else { $_26 = \false; break; }
    				$_26 = \true; break;
    			}
    			while(\false);
    			if( $_26 === \false) {
    				$result = $res_27;
    				$this->pos = $pos_27;
    				unset($res_27, $pos_27);
    				break;
    			}
    		}
    		$_28 = \true; break;
    	}
    	while(\false);
    	if( $_28 === \true ) { return $this->finalise($result); }
    	if( $_28 === \false) { return \false; }
    }


    /* DayOfWeek: 'MON'|'TUE'|'WED'|'THU'|'FRI'|'SAT'|'SUN' */
    protected $match_DayOfWeek_typestack = ['DayOfWeek'];
    function match_DayOfWeek($stack = []) {
    	$matchrule = 'DayOfWeek'; $result = $this->construct($matchrule, $matchrule);
    	$_53 = \null;
    	do {
    		$res_30 = $result;
    		$pos_30 = $this->pos;
    		if (($subres = $this->literal('MON')) !== \false) {
    			$result["text"] .= $subres;
    			$_53 = \true; break;
    		}
    		$result = $res_30;
    		$this->pos = $pos_30;
    		$_51 = \null;
    		do {
    			$res_32 = $result;
    			$pos_32 = $this->pos;
    			if (($subres = $this->literal('TUE')) !== \false) {
    				$result["text"] .= $subres;
    				$_51 = \true; break;
    			}
    			$result = $res_32;
    			$this->pos = $pos_32;
    			$_49 = \null;
    			do {
    				$res_34 = $result;
    				$pos_34 = $this->pos;
    				if (($subres = $this->literal('WED')) !== \false) {
    					$result["text"] .= $subres;
    					$_49 = \true; break;
    				}
    				$result = $res_34;
    				$this->pos = $pos_34;
    				$_47 = \null;
    				do {
    					$res_36 = $result;
    					$pos_36 = $this->pos;
    					if (($subres = $this->literal('THU')) !== \false) {
    						$result["text"] .= $subres;
    						$_47 = \true; break;
    					}
    					$result = $res_36;
    					$this->pos = $pos_36;
    					$_45 = \null;
    					do {
    						$res_38 = $result;
    						$pos_38 = $this->pos;
    						if (($subres = $this->literal('FRI')) !== \false) {
    							$result["text"] .= $subres;
    							$_45 = \true; break;
    						}
    						$result = $res_38;
    						$this->pos = $pos_38;
    						$_43 = \null;
    						do {
    							$res_40 = $result;
    							$pos_40 = $this->pos;
    							if (($subres = $this->literal('SAT')) !== \false) {
    								$result["text"] .= $subres;
    								$_43 = \true; break;
    							}
    							$result = $res_40;
    							$this->pos = $pos_40;
    							if (($subres = $this->literal('SUN')) !== \false) {
    								$result["text"] .= $subres;
    								$_43 = \true; break;
    							}
    							$result = $res_40;
    							$this->pos = $pos_40;
    							$_43 = \false; break;
    						}
    						while(\false);
    						if( $_43 === \true ) { $_45 = \true; break; }
    						$result = $res_38;
    						$this->pos = $pos_38;
    						$_45 = \false; break;
    					}
    					while(\false);
    					if( $_45 === \true ) { $_47 = \true; break; }
    					$result = $res_36;
    					$this->pos = $pos_36;
    					$_47 = \false; break;
    				}
    				while(\false);
    				if( $_47 === \true ) { $_49 = \true; break; }
    				$result = $res_34;
    				$this->pos = $pos_34;
    				$_49 = \false; break;
    			}
    			while(\false);
    			if( $_49 === \true ) { $_51 = \true; break; }
    			$result = $res_32;
    			$this->pos = $pos_32;
    			$_51 = \false; break;
    		}
    		while(\false);
    		if( $_51 === \true ) { $_53 = \true; break; }
    		$result = $res_30;
    		$this->pos = $pos_30;
    		$_53 = \false; break;
    	}
    	while(\false);
    	if( $_53 === \true ) { return $this->finalise($result); }
    	if( $_53 === \false) { return \false; }
    }


    /* DayOfWeekList: DayOfWeek (',' DayOfWeek)* */
    protected $match_DayOfWeekList_typestack = ['DayOfWeekList'];
    function match_DayOfWeekList($stack = []) {
    	$matchrule = 'DayOfWeekList'; $result = $this->construct($matchrule, $matchrule);
    	$_60 = \null;
    	do {
    		$key = 'match_DayOfWeek'; $pos = $this->pos;
    		$subres = $this->packhas($key, $pos)
    			? $this->packread($key, $pos)
    			: $this->packwrite($key, $pos, $this->match_DayOfWeek(\array_merge($stack, [$result])));
    		if ($subres !== \false) { $this->store($result, $subres); }
    		else { $_60 = \false; break; }
    		while (\true) {
    			$res_59 = $result;
    			$pos_59 = $this->pos;
    			$_58 = \null;
    			do {
    				if (\substr($this->string, $this->pos, 1) === ',') {
    					$this->pos += 1;
    					$result["text"] .= ',';
    				}
    				else { $_58 = \false; break; }
    				$key = 'match_DayOfWeek'; $pos = $this->pos;
    				$subres = $this->packhas($key, $pos)
    					? $this->packread($key, $pos)
    					: $this->packwrite($key, $pos, $this->match_DayOfWeek(\array_merge($stack, [$result])));
    				if ($subres !== \false) {
    					$this->store($result, $subres);
    				}
    				else { $_58 = \false; break; }
    				$_58 = \true; break;
    			}
    			while(\false);
    			if( $_58 === \false) {
    				$result = $res_59;
    				$this->pos = $pos_59;
    				unset($res_59, $pos_59);
    				break;
    			}
    		}
    		$_60 = \true; break;
    	}
    	while(\false);
    	if( $_60 === \true ) { return $this->finalise($result); }
    	if( $_60 === \false) { return \false; }
    }


    /* Day: /3[01]|[12][0-9]|0?[1-9]/ */
    protected $match_Day_typestack = ['Day'];
    function match_Day($stack = []) {
    	$matchrule = 'Day'; $result = $this->construct($matchrule, $matchrule);
    	if (($subres = $this->rx('/3[01]|[12][0-9]|0?[1-9]/')) !== \false) {
    		$result["text"] .= $subres;
    		return $this->finalise($result);
    	}
    	else { return \false; }
    }


    /* DayList: Day ((','|'-') Day)* */
    protected $match_DayList_typestack = ['DayList'];
    function match_DayList($stack = []) {
    	$matchrule = 'DayList'; $result = $this->construct($matchrule, $matchrule);
    	$_74 = \null;
    	do {
    		$key = 'match_Day'; $pos = $this->pos;
    		$subres = $this->packhas($key, $pos)
    			? $this->packread($key, $pos)
    			: $this->packwrite($key, $pos, $this->match_Day(\array_merge($stack, [$result])));
    		if ($subres !== \false) { $this->store($result, $subres); }
    		else { $_74 = \false; break; }
    		while (\true) {
    			$res_73 = $result;
    			$pos_73 = $this->pos;
    			$_72 = \null;
    			do {
    				$_69 = \null;
    				do {
    					$_67 = \null;
    					do {
    						$res_64 = $result;
    						$pos_64 = $this->pos;
    						if (\substr($this->string, $this->pos, 1) === ',') {
    							$this->pos += 1;
    							$result["text"] .= ',';
    							$_67 = \true; break;
    						}
    						$result = $res_64;
    						$this->pos = $pos_64;
    						if (\substr($this->string, $this->pos, 1) === '-') {
    							$this->pos += 1;
    							$result["text"] .= '-';
    							$_67 = \true; break;
    						}
    						$result = $res_64;
    						$this->pos = $pos_64;
    						$_67 = \false; break;
    					}
    					while(\false);
    					if( $_67 === \false) { $_69 = \false; break; }
    					$_69 = \true; break;
    				}
    				while(\false);
    				if( $_69 === \false) { $_72 = \false; break; }
    				$key = 'match_Day'; $pos = $this->pos;
    				$subres = $this->packhas($key, $pos)
    					? $this->packread($key, $pos)
    					: $this->packwrite($key, $pos, $this->match_Day(\array_merge($stack, [$result])));
    				if ($subres !== \false) {
    					$this->store($result, $subres);
    				}
    				else { $_72 = \false; break; }
    				$_72 = \true; break;
    			}
    			while(\false);
    			if( $_72 === \false) {
    				$result = $res_73;
    				$this->pos = $pos_73;
    				unset($res_73, $pos_73);
    				break;
    			}
    		}
    		$_74 = \true; break;
    	}
    	while(\false);
    	if( $_74 === \true ) { return $this->finalise($result); }
    	if( $_74 === \false) { return \false; }
    }


    /* Month:/1[0-2]|0?[0-9]/ */
    protected $match_Month_typestack = ['Month'];
    function match_Month($stack = []) {
    	$matchrule = 'Month'; $result = $this->construct($matchrule, $matchrule);
    	if (($subres = $this->rx('/1[0-2]|0?[0-9]/')) !== \false) {
    		$result["text"] .= $subres;
    		return $this->finalise($result);
    	}
    	else { return \false; }
    }


    /* MonthList: Month ((','|'-') Month)* */
    protected $match_MonthList_typestack = ['MonthList'];
    function match_MonthList($stack = []) {
    	$matchrule = 'MonthList'; $result = $this->construct($matchrule, $matchrule);
    	$_88 = \null;
    	do {
    		$key = 'match_Month'; $pos = $this->pos;
    		$subres = $this->packhas($key, $pos)
    			? $this->packread($key, $pos)
    			: $this->packwrite($key, $pos, $this->match_Month(\array_merge($stack, [$result])));
    		if ($subres !== \false) { $this->store($result, $subres); }
    		else { $_88 = \false; break; }
    		while (\true) {
    			$res_87 = $result;
    			$pos_87 = $this->pos;
    			$_86 = \null;
    			do {
    				$_83 = \null;
    				do {
    					$_81 = \null;
    					do {
    						$res_78 = $result;
    						$pos_78 = $this->pos;
    						if (\substr($this->string, $this->pos, 1) === ',') {
    							$this->pos += 1;
    							$result["text"] .= ',';
    							$_81 = \true; break;
    						}
    						$result = $res_78;
    						$this->pos = $pos_78;
    						if (\substr($this->string, $this->pos, 1) === '-') {
    							$this->pos += 1;
    							$result["text"] .= '-';
    							$_81 = \true; break;
    						}
    						$result = $res_78;
    						$this->pos = $pos_78;
    						$_81 = \false; break;
    					}
    					while(\false);
    					if( $_81 === \false) { $_83 = \false; break; }
    					$_83 = \true; break;
    				}
    				while(\false);
    				if( $_83 === \false) { $_86 = \false; break; }
    				$key = 'match_Month'; $pos = $this->pos;
    				$subres = $this->packhas($key, $pos)
    					? $this->packread($key, $pos)
    					: $this->packwrite($key, $pos, $this->match_Month(\array_merge($stack, [$result])));
    				if ($subres !== \false) {
    					$this->store($result, $subres);
    				}
    				else { $_86 = \false; break; }
    				$_86 = \true; break;
    			}
    			while(\false);
    			if( $_86 === \false) {
    				$result = $res_87;
    				$this->pos = $pos_87;
    				unset($res_87, $pos_87);
    				break;
    			}
    		}
    		$_88 = \true; break;
    	}
    	while(\false);
    	if( $_88 === \true ) { return $this->finalise($result); }
    	if( $_88 === \false) { return \false; }
    }


    /* Year:/\d{4}/ */
    protected $match_Year_typestack = ['Year'];
    function match_Year($stack = []) {
    	$matchrule = 'Year'; $result = $this->construct($matchrule, $matchrule);
    	if (($subres = $this->rx('/\d{4}/')) !== \false) {
    		$result["text"] .= $subres;
    		return $this->finalise($result);
    	}
    	else { return \false; }
    }


    /* YearList: Year ((','|'-') Year)* */
    protected $match_YearList_typestack = ['YearList'];
    function match_YearList($stack = []) {
    	$matchrule = 'YearList'; $result = $this->construct($matchrule, $matchrule);
    	$_102 = \null;
    	do {
    		$key = 'match_Year'; $pos = $this->pos;
    		$subres = $this->packhas($key, $pos)
    			? $this->packread($key, $pos)
    			: $this->packwrite($key, $pos, $this->match_Year(\array_merge($stack, [$result])));
    		if ($subres !== \false) { $this->store($result, $subres); }
    		else { $_102 = \false; break; }
    		while (\true) {
    			$res_101 = $result;
    			$pos_101 = $this->pos;
    			$_100 = \null;
    			do {
    				$_97 = \null;
    				do {
    					$_95 = \null;
    					do {
    						$res_92 = $result;
    						$pos_92 = $this->pos;
    						if (\substr($this->string, $this->pos, 1) === ',') {
    							$this->pos += 1;
    							$result["text"] .= ',';
    							$_95 = \true; break;
    						}
    						$result = $res_92;
    						$this->pos = $pos_92;
    						if (\substr($this->string, $this->pos, 1) === '-') {
    							$this->pos += 1;
    							$result["text"] .= '-';
    							$_95 = \true; break;
    						}
    						$result = $res_92;
    						$this->pos = $pos_92;
    						$_95 = \false; break;
    					}
    					while(\false);
    					if( $_95 === \false) { $_97 = \false; break; }
    					$_97 = \true; break;
    				}
    				while(\false);
    				if( $_97 === \false) { $_100 = \false; break; }
    				$key = 'match_Year'; $pos = $this->pos;
    				$subres = $this->packhas($key, $pos)
    					? $this->packread($key, $pos)
    					: $this->packwrite($key, $pos, $this->match_Year(\array_merge($stack, [$result])));
    				if ($subres !== \false) {
    					$this->store($result, $subres);
    				}
    				else { $_100 = \false; break; }
    				$_100 = \true; break;
    			}
    			while(\false);
    			if( $_100 === \false) {
    				$result = $res_101;
    				$this->pos = $pos_101;
    				unset($res_101, $pos_101);
    				break;
    			}
    		}
    		$_102 = \true; break;
    	}
    	while(\false);
    	if( $_102 === \true ) { return $this->finalise($result); }
    	if( $_102 === \false) { return \false; }
    }


    /* Date:Year:Year '-' Month:Month '-' Day:Day */
    protected $match_Date_typestack = ['Date'];
    function match_Date($stack = []) {
    	$matchrule = 'Date'; $result = $this->construct($matchrule, $matchrule);
    	$_109 = \null;
    	do {
    		$key = 'match_Year'; $pos = $this->pos;
    		$subres = $this->packhas($key, $pos)
    			? $this->packread($key, $pos)
    			: $this->packwrite($key, $pos, $this->match_Year(\array_merge($stack, [$result])));
    		if ($subres !== \false) {
    			$this->store($result, $subres, "Year");
    		}
    		else { $_109 = \false; break; }
    		if (\substr($this->string, $this->pos, 1) === '-') {
    			$this->pos += 1;
    			$result["text"] .= '-';
    		}
    		else { $_109 = \false; break; }
    		$key = 'match_Month'; $pos = $this->pos;
    		$subres = $this->packhas($key, $pos)
    			? $this->packread($key, $pos)
    			: $this->packwrite($key, $pos, $this->match_Month(\array_merge($stack, [$result])));
    		if ($subres !== \false) {
    			$this->store($result, $subres, "Month");
    		}
    		else { $_109 = \false; break; }
    		if (\substr($this->string, $this->pos, 1) === '-') {
    			$this->pos += 1;
    			$result["text"] .= '-';
    		}
    		else { $_109 = \false; break; }
    		$key = 'match_Day'; $pos = $this->pos;
    		$subres = $this->packhas($key, $pos)
    			? $this->packread($key, $pos)
    			: $this->packwrite($key, $pos, $this->match_Day(\array_merge($stack, [$result])));
    		if ($subres !== \false) {
    			$this->store($result, $subres, "Day");
    		}
    		else { $_109 = \false; break; }
    		$_109 = \true; break;
    	}
    	while(\false);
    	if( $_109 === \true ) { return $this->finalise($result); }
    	if( $_109 === \false) { return \false; }
    }


    /* Easter: 'Easter' > Offset:Offset */
    protected $match_Easter_typestack = ['Easter'];
    function match_Easter($stack = []) {
    	$matchrule = 'Easter'; $result = $this->construct($matchrule, $matchrule);
    	$_114 = \null;
    	do {
    		if (($subres = $this->literal('Easter')) !== \false) { $result["text"] .= $subres; }
    		else { $_114 = \false; break; }
    		if (($subres = $this->whitespace()) !== \false) { $result["text"] .= $subres; }
    		$key = 'match_Offset'; $pos = $this->pos;
    		$subres = $this->packhas($key, $pos)
    			? $this->packread($key, $pos)
    			: $this->packwrite($key, $pos, $this->match_Offset(\array_merge($stack, [$result])));
    		if ($subres !== \false) {
    			$this->store($result, $subres, "Offset");
    		}
    		else { $_114 = \false; break; }
    		$_114 = \true; break;
    	}
    	while(\false);
    	if( $_114 === \true ) { return $this->finalise($result); }
    	if( $_114 === \false) { return \false; }
    }


    /* Equal: '=' | 'IN' */
    protected $match_Equal_typestack = ['Equal'];
    function match_Equal($stack = []) {
    	$matchrule = 'Equal'; $result = $this->construct($matchrule, $matchrule);
    	$_119 = \null;
    	do {
    		$res_116 = $result;
    		$pos_116 = $this->pos;
    		if (\substr($this->string, $this->pos, 1) === '=') {
    			$this->pos += 1;
    			$result["text"] .= '=';
    			$_119 = \true; break;
    		}
    		$result = $res_116;
    		$this->pos = $pos_116;
    		if (($subres = $this->literal('IN')) !== \false) {
    			$result["text"] .= $subres;
    			$_119 = \true; break;
    		}
    		$result = $res_116;
    		$this->pos = $pos_116;
    		$_119 = \false; break;
    	}
    	while(\false);
    	if( $_119 === \true ) { return $this->finalise($result); }
    	if( $_119 === \false) { return \false; }
    }


    /* DateExpression: 'Date' > Equal > (Date:Date|Easter:Easter) */
    protected $match_DateExpression_typestack = ['DateExpression'];
    function match_DateExpression($stack = []) {
    	$matchrule = 'DateExpression'; $result = $this->construct($matchrule, $matchrule);
    	$_132 = \null;
    	do {
    		if (($subres = $this->literal('Date')) !== \false) { $result["text"] .= $subres; }
    		else { $_132 = \false; break; }
    		if (($subres = $this->whitespace()) !== \false) { $result["text"] .= $subres; }
    		$key = 'match_Equal'; $pos = $this->pos;
    		$subres = $this->packhas($key, $pos)
    			? $this->packread($key, $pos)
    			: $this->packwrite($key, $pos, $this->match_Equal(\array_merge($stack, [$result])));
    		if ($subres !== \false) { $this->store($result, $subres); }
    		else { $_132 = \false; break; }
    		if (($subres = $this->whitespace()) !== \false) { $result["text"] .= $subres; }
    		$_130 = \null;
    		do {
    			$_128 = \null;
    			do {
    				$res_125 = $result;
    				$pos_125 = $this->pos;
    				$key = 'match_Date'; $pos = $this->pos;
    				$subres = $this->packhas($key, $pos)
    					? $this->packread($key, $pos)
    					: $this->packwrite($key, $pos, $this->match_Date(\array_merge($stack, [$result])));
    				if ($subres !== \false) {
    					$this->store($result, $subres, "Date");
    					$_128 = \true; break;
    				}
    				$result = $res_125;
    				$this->pos = $pos_125;
    				$key = 'match_Easter'; $pos = $this->pos;
    				$subres = $this->packhas($key, $pos)
    					? $this->packread($key, $pos)
    					: $this->packwrite($key, $pos, $this->match_Easter(\array_merge($stack, [$result])));
    				if ($subres !== \false) {
    					$this->store($result, $subres, "Easter");
    					$_128 = \true; break;
    				}
    				$result = $res_125;
    				$this->pos = $pos_125;
    				$_128 = \false; break;
    			}
    			while(\false);
    			if( $_128 === \false) { $_130 = \false; break; }
    			$_130 = \true; break;
    		}
    		while(\false);
    		if( $_130 === \false) { $_132 = \false; break; }
    		$_132 = \true; break;
    	}
    	while(\false);
    	if( $_132 === \true ) { return $this->finalise($result); }
    	if( $_132 === \false) { return \false; }
    }


    /* DateModuloExpression: 'DateModulo' > Equal > Date > '%' > Offset */
    protected $match_DateModuloExpression_typestack = ['DateModuloExpression'];
    function match_DateModuloExpression($stack = []) {
    	$matchrule = 'DateModuloExpression'; $result = $this->construct($matchrule, $matchrule);
    	$_143 = \null;
    	do {
    		if (($subres = $this->literal('DateModulo')) !== \false) { $result["text"] .= $subres; }
    		else { $_143 = \false; break; }
    		if (($subres = $this->whitespace()) !== \false) { $result["text"] .= $subres; }
    		$key = 'match_Equal'; $pos = $this->pos;
    		$subres = $this->packhas($key, $pos)
    			? $this->packread($key, $pos)
    			: $this->packwrite($key, $pos, $this->match_Equal(\array_merge($stack, [$result])));
    		if ($subres !== \false) { $this->store($result, $subres); }
    		else { $_143 = \false; break; }
    		if (($subres = $this->whitespace()) !== \false) { $result["text"] .= $subres; }
    		$key = 'match_Date'; $pos = $this->pos;
    		$subres = $this->packhas($key, $pos)
    			? $this->packread($key, $pos)
    			: $this->packwrite($key, $pos, $this->match_Date(\array_merge($stack, [$result])));
    		if ($subres !== \false) { $this->store($result, $subres); }
    		else { $_143 = \false; break; }
    		if (($subres = $this->whitespace()) !== \false) { $result["text"] .= $subres; }
    		if (\substr($this->string, $this->pos, 1) === '%') {
    			$this->pos += 1;
    			$result["text"] .= '%';
    		}
    		else { $_143 = \false; break; }
    		if (($subres = $this->whitespace()) !== \false) { $result["text"] .= $subres; }
    		$key = 'match_Offset'; $pos = $this->pos;
    		$subres = $this->packhas($key, $pos)
    			? $this->packread($key, $pos)
    			: $this->packwrite($key, $pos, $this->match_Offset(\array_merge($stack, [$result])));
    		if ($subres !== \false) { $this->store($result, $subres); }
    		else { $_143 = \false; break; }
    		$_143 = \true; break;
    	}
    	while(\false);
    	if( $_143 === \true ) { return $this->finalise($result); }
    	if( $_143 === \false) { return \false; }
    }


    /* DayOfWeekOfMonthExpression:'DayOfWeekOfMonth' > Equal > WeekList DayOfWeek */
    protected $match_DayOfWeekOfMonthExpression_typestack = ['DayOfWeekOfMonthExpression'];
    function match_DayOfWeekOfMonthExpression($stack = []) {
    	$matchrule = 'DayOfWeekOfMonthExpression'; $result = $this->construct($matchrule, $matchrule);
    	$_151 = \null;
    	do {
    		if (($subres = $this->literal('DayOfWeekOfMonth')) !== \false) { $result["text"] .= $subres; }
    		else { $_151 = \false; break; }
    		if (($subres = $this->whitespace()) !== \false) { $result["text"] .= $subres; }
    		$key = 'match_Equal'; $pos = $this->pos;
    		$subres = $this->packhas($key, $pos)
    			? $this->packread($key, $pos)
    			: $this->packwrite($key, $pos, $this->match_Equal(\array_merge($stack, [$result])));
    		if ($subres !== \false) { $this->store($result, $subres); }
    		else { $_151 = \false; break; }
    		if (($subres = $this->whitespace()) !== \false) { $result["text"] .= $subres; }
    		$key = 'match_WeekList'; $pos = $this->pos;
    		$subres = $this->packhas($key, $pos)
    			? $this->packread($key, $pos)
    			: $this->packwrite($key, $pos, $this->match_WeekList(\array_merge($stack, [$result])));
    		if ($subres !== \false) { $this->store($result, $subres); }
    		else { $_151 = \false; break; }
    		$key = 'match_DayOfWeek'; $pos = $this->pos;
    		$subres = $this->packhas($key, $pos)
    			? $this->packread($key, $pos)
    			: $this->packwrite($key, $pos, $this->match_DayOfWeek(\array_merge($stack, [$result])));
    		if ($subres !== \false) { $this->store($result, $subres); }
    		else { $_151 = \false; break; }
    		$_151 = \true; break;
    	}
    	while(\false);
    	if( $_151 === \true ) { return $this->finalise($result); }
    	if( $_151 === \false) { return \false; }
    }


    /* DayOfMonthExpression: 'DayOfMonth' > Equal > DayList:DayList */
    protected $match_DayOfMonthExpression_typestack = ['DayOfMonthExpression'];
    function match_DayOfMonthExpression($stack = []) {
    	$matchrule = 'DayOfMonthExpression'; $result = $this->construct($matchrule, $matchrule);
    	$_158 = \null;
    	do {
    		if (($subres = $this->literal('DayOfMonth')) !== \false) { $result["text"] .= $subres; }
    		else { $_158 = \false; break; }
    		if (($subres = $this->whitespace()) !== \false) { $result["text"] .= $subres; }
    		$key = 'match_Equal'; $pos = $this->pos;
    		$subres = $this->packhas($key, $pos)
    			? $this->packread($key, $pos)
    			: $this->packwrite($key, $pos, $this->match_Equal(\array_merge($stack, [$result])));
    		if ($subres !== \false) { $this->store($result, $subres); }
    		else { $_158 = \false; break; }
    		if (($subres = $this->whitespace()) !== \false) { $result["text"] .= $subres; }
    		$key = 'match_DayList'; $pos = $this->pos;
    		$subres = $this->packhas($key, $pos)
    			? $this->packread($key, $pos)
    			: $this->packwrite($key, $pos, $this->match_DayList(\array_merge($stack, [$result])));
    		if ($subres !== \false) {
    			$this->store($result, $subres, "DayList");
    		}
    		else { $_158 = \false; break; }
    		$_158 = \true; break;
    	}
    	while(\false);
    	if( $_158 === \true ) { return $this->finalise($result); }
    	if( $_158 === \false) { return \false; }
    }


    /* DayAndMonthExpression: 'DayAndMonth' > Equal > Day:Day '/' Month:Month */
    protected $match_DayAndMonthExpression_typestack = ['DayAndMonthExpression'];
    function match_DayAndMonthExpression($stack = []) {
    	$matchrule = 'DayAndMonthExpression'; $result = $this->construct($matchrule, $matchrule);
    	$_167 = \null;
    	do {
    		if (($subres = $this->literal('DayAndMonth')) !== \false) { $result["text"] .= $subres; }
    		else { $_167 = \false; break; }
    		if (($subres = $this->whitespace()) !== \false) { $result["text"] .= $subres; }
    		$key = 'match_Equal'; $pos = $this->pos;
    		$subres = $this->packhas($key, $pos)
    			? $this->packread($key, $pos)
    			: $this->packwrite($key, $pos, $this->match_Equal(\array_merge($stack, [$result])));
    		if ($subres !== \false) { $this->store($result, $subres); }
    		else { $_167 = \false; break; }
    		if (($subres = $this->whitespace()) !== \false) { $result["text"] .= $subres; }
    		$key = 'match_Day'; $pos = $this->pos;
    		$subres = $this->packhas($key, $pos)
    			? $this->packread($key, $pos)
    			: $this->packwrite($key, $pos, $this->match_Day(\array_merge($stack, [$result])));
    		if ($subres !== \false) {
    			$this->store($result, $subres, "Day");
    		}
    		else { $_167 = \false; break; }
    		if (\substr($this->string, $this->pos, 1) === '/') {
    			$this->pos += 1;
    			$result["text"] .= '/';
    		}
    		else { $_167 = \false; break; }
    		$key = 'match_Month'; $pos = $this->pos;
    		$subres = $this->packhas($key, $pos)
    			? $this->packread($key, $pos)
    			: $this->packwrite($key, $pos, $this->match_Month(\array_merge($stack, [$result])));
    		if ($subres !== \false) {
    			$this->store($result, $subres, "Month");
    		}
    		else { $_167 = \false; break; }
    		$_167 = \true; break;
    	}
    	while(\false);
    	if( $_167 === \true ) { return $this->finalise($result); }
    	if( $_167 === \false) { return \false; }
    }


    /* DayOfWeekExpression: 'DayOfWeek' > Equal > DayOfWeekList:DayOfWeekList */
    protected $match_DayOfWeekExpression_typestack = ['DayOfWeekExpression'];
    function match_DayOfWeekExpression($stack = []) {
    	$matchrule = 'DayOfWeekExpression'; $result = $this->construct($matchrule, $matchrule);
    	$_174 = \null;
    	do {
    		if (($subres = $this->literal('DayOfWeek')) !== \false) { $result["text"] .= $subres; }
    		else { $_174 = \false; break; }
    		if (($subres = $this->whitespace()) !== \false) { $result["text"] .= $subres; }
    		$key = 'match_Equal'; $pos = $this->pos;
    		$subres = $this->packhas($key, $pos)
    			? $this->packread($key, $pos)
    			: $this->packwrite($key, $pos, $this->match_Equal(\array_merge($stack, [$result])));
    		if ($subres !== \false) { $this->store($result, $subres); }
    		else { $_174 = \false; break; }
    		if (($subres = $this->whitespace()) !== \false) { $result["text"] .= $subres; }
    		$key = 'match_DayOfWeekList'; $pos = $this->pos;
    		$subres = $this->packhas($key, $pos)
    			? $this->packread($key, $pos)
    			: $this->packwrite($key, $pos, $this->match_DayOfWeekList(\array_merge($stack, [$result])));
    		if ($subres !== \false) {
    			$this->store($result, $subres, "DayOfWeekList");
    		}
    		else { $_174 = \false; break; }
    		$_174 = \true; break;
    	}
    	while(\false);
    	if( $_174 === \true ) { return $this->finalise($result); }
    	if( $_174 === \false) { return \false; }
    }


    /* MonthExpression: 'Month' > Equal > MonthList:MonthList */
    protected $match_MonthExpression_typestack = ['MonthExpression'];
    function match_MonthExpression($stack = []) {
    	$matchrule = 'MonthExpression'; $result = $this->construct($matchrule, $matchrule);
    	$_181 = \null;
    	do {
    		if (($subres = $this->literal('Month')) !== \false) { $result["text"] .= $subres; }
    		else { $_181 = \false; break; }
    		if (($subres = $this->whitespace()) !== \false) { $result["text"] .= $subres; }
    		$key = 'match_Equal'; $pos = $this->pos;
    		$subres = $this->packhas($key, $pos)
    			? $this->packread($key, $pos)
    			: $this->packwrite($key, $pos, $this->match_Equal(\array_merge($stack, [$result])));
    		if ($subres !== \false) { $this->store($result, $subres); }
    		else { $_181 = \false; break; }
    		if (($subres = $this->whitespace()) !== \false) { $result["text"] .= $subres; }
    		$key = 'match_MonthList'; $pos = $this->pos;
    		$subres = $this->packhas($key, $pos)
    			? $this->packread($key, $pos)
    			: $this->packwrite($key, $pos, $this->match_MonthList(\array_merge($stack, [$result])));
    		if ($subres !== \false) {
    			$this->store($result, $subres, "MonthList");
    		}
    		else { $_181 = \false; break; }
    		$_181 = \true; break;
    	}
    	while(\false);
    	if( $_181 === \true ) { return $this->finalise($result); }
    	if( $_181 === \false) { return \false; }
    }


    /* YearExpression: 'Year' > Equal > YearList:YearList */
    protected $match_YearExpression_typestack = ['YearExpression'];
    function match_YearExpression($stack = []) {
    	$matchrule = 'YearExpression'; $result = $this->construct($matchrule, $matchrule);
    	$_188 = \null;
    	do {
    		if (($subres = $this->literal('Year')) !== \false) { $result["text"] .= $subres; }
    		else { $_188 = \false; break; }
    		if (($subres = $this->whitespace()) !== \false) { $result["text"] .= $subres; }
    		$key = 'match_Equal'; $pos = $this->pos;
    		$subres = $this->packhas($key, $pos)
    			? $this->packread($key, $pos)
    			: $this->packwrite($key, $pos, $this->match_Equal(\array_merge($stack, [$result])));
    		if ($subres !== \false) { $this->store($result, $subres); }
    		else { $_188 = \false; break; }
    		if (($subres = $this->whitespace()) !== \false) { $result["text"] .= $subres; }
    		$key = 'match_YearList'; $pos = $this->pos;
    		$subres = $this->packhas($key, $pos)
    			? $this->packread($key, $pos)
    			: $this->packwrite($key, $pos, $this->match_YearList(\array_merge($stack, [$result])));
    		if ($subres !== \false) {
    			$this->store($result, $subres, "YearList");
    		}
    		else { $_188 = \false; break; }
    		$_188 = \true; break;
    	}
    	while(\false);
    	if( $_188 === \true ) { return $this->finalise($result); }
    	if( $_188 === \false) { return \false; }
    }


    /* FeatureExpression: '"' > Feature:Feature > '"' > Equal > TokenList:TokenList */
    protected $match_FeatureExpression_typestack = ['FeatureExpression'];
    function match_FeatureExpression($stack = []) {
    	$matchrule = 'FeatureExpression'; $result = $this->construct($matchrule, $matchrule);
    	$_199 = \null;
    	do {
    		if (\substr($this->string, $this->pos, 1) === '"') {
    			$this->pos += 1;
    			$result["text"] .= '"';
    		}
    		else { $_199 = \false; break; }
    		if (($subres = $this->whitespace()) !== \false) { $result["text"] .= $subres; }
    		$key = 'match_Feature'; $pos = $this->pos;
    		$subres = $this->packhas($key, $pos)
    			? $this->packread($key, $pos)
    			: $this->packwrite($key, $pos, $this->match_Feature(\array_merge($stack, [$result])));
    		if ($subres !== \false) {
    			$this->store($result, $subres, "Feature");
    		}
    		else { $_199 = \false; break; }
    		if (($subres = $this->whitespace()) !== \false) { $result["text"] .= $subres; }
    		if (\substr($this->string, $this->pos, 1) === '"') {
    			$this->pos += 1;
    			$result["text"] .= '"';
    		}
    		else { $_199 = \false; break; }
    		if (($subres = $this->whitespace()) !== \false) { $result["text"] .= $subres; }
    		$key = 'match_Equal'; $pos = $this->pos;
    		$subres = $this->packhas($key, $pos)
    			? $this->packread($key, $pos)
    			: $this->packwrite($key, $pos, $this->match_Equal(\array_merge($stack, [$result])));
    		if ($subres !== \false) { $this->store($result, $subres); }
    		else { $_199 = \false; break; }
    		if (($subres = $this->whitespace()) !== \false) { $result["text"] .= $subres; }
    		$key = 'match_TokenList'; $pos = $this->pos;
    		$subres = $this->packhas($key, $pos)
    			? $this->packread($key, $pos)
    			: $this->packwrite($key, $pos, $this->match_TokenList(\array_merge($stack, [$result])));
    		if ($subres !== \false) {
    			$this->store($result, $subres, "TokenList");
    		}
    		else { $_199 = \false; break; }
    		$_199 = \true; break;
    	}
    	while(\false);
    	if( $_199 === \true ) { return $this->finalise($result); }
    	if( $_199 === \false) { return \false; }
    }


    /* NotExpression: 'NOT(' > operand:Result > ')' */
    protected $match_NotExpression_typestack = ['NotExpression'];
    function match_NotExpression($stack = []) {
    	$matchrule = 'NotExpression'; $result = $this->construct($matchrule, $matchrule);
    	$_206 = \null;
    	do {
    		if (($subres = $this->literal('NOT(')) !== \false) { $result["text"] .= $subres; }
    		else { $_206 = \false; break; }
    		if (($subres = $this->whitespace()) !== \false) { $result["text"] .= $subres; }
    		$key = 'match_Result'; $pos = $this->pos;
    		$subres = $this->packhas($key, $pos)
    			? $this->packread($key, $pos)
    			: $this->packwrite($key, $pos, $this->match_Result(\array_merge($stack, [$result])));
    		if ($subres !== \false) {
    			$this->store($result, $subres, "operand");
    		}
    		else { $_206 = \false; break; }
    		if (($subres = $this->whitespace()) !== \false) { $result["text"] .= $subres; }
    		if (\substr($this->string, $this->pos, 1) === ')') {
    			$this->pos += 1;
    			$result["text"] .= ')';
    		}
    		else { $_206 = \false; break; }
    		$_206 = \true; break;
    	}
    	while(\false);
    	if( $_206 === \true ) { return $this->finalise($result); }
    	if( $_206 === \false) { return \false; }
    }


    /* Expression: NotExpression | DateExpression | DateModuloExpression | DayOfWeekOfMonthExpression | DayOfMonthExpression | DayAndMonthExpression | DayOfWeekExpression | MonthExpression | YearExpression | FeatureExpression |  '(' > Result > ')' */
    protected $match_Expression_typestack = ['Expression'];
    function match_Expression($stack = []) {
    	$matchrule = 'Expression'; $result = $this->construct($matchrule, $matchrule);
    	$_253 = \null;
    	do {
    		$res_208 = $result;
    		$pos_208 = $this->pos;
    		$key = 'match_NotExpression'; $pos = $this->pos;
    		$subres = $this->packhas($key, $pos)
    			? $this->packread($key, $pos)
    			: $this->packwrite($key, $pos, $this->match_NotExpression(\array_merge($stack, [$result])));
    		if ($subres !== \false) {
    			$this->store($result, $subres);
    			$_253 = \true; break;
    		}
    		$result = $res_208;
    		$this->pos = $pos_208;
    		$_251 = \null;
    		do {
    			$res_210 = $result;
    			$pos_210 = $this->pos;
    			$key = 'match_DateExpression'; $pos = $this->pos;
    			$subres = $this->packhas($key, $pos)
    				? $this->packread($key, $pos)
    				: $this->packwrite($key, $pos, $this->match_DateExpression(\array_merge($stack, [$result])));
    			if ($subres !== \false) {
    				$this->store($result, $subres);
    				$_251 = \true; break;
    			}
    			$result = $res_210;
    			$this->pos = $pos_210;
    			$_249 = \null;
    			do {
    				$res_212 = $result;
    				$pos_212 = $this->pos;
    				$key = 'match_DateModuloExpression'; $pos = $this->pos;
    				$subres = $this->packhas($key, $pos)
    					? $this->packread($key, $pos)
    					: $this->packwrite($key, $pos, $this->match_DateModuloExpression(\array_merge($stack, [$result])));
    				if ($subres !== \false) {
    					$this->store($result, $subres);
    					$_249 = \true; break;
    				}
    				$result = $res_212;
    				$this->pos = $pos_212;
    				$_247 = \null;
    				do {
    					$res_214 = $result;
    					$pos_214 = $this->pos;
    					$key = 'match_DayOfWeekOfMonthExpression'; $pos = $this->pos;
    					$subres = $this->packhas($key, $pos)
    						? $this->packread($key, $pos)
    						: $this->packwrite($key, $pos, $this->match_DayOfWeekOfMonthExpression(\array_merge($stack, [$result])));
    					if ($subres !== \false) {
    						$this->store($result, $subres);
    						$_247 = \true; break;
    					}
    					$result = $res_214;
    					$this->pos = $pos_214;
    					$_245 = \null;
    					do {
    						$res_216 = $result;
    						$pos_216 = $this->pos;
    						$key = 'match_DayOfMonthExpression'; $pos = $this->pos;
    						$subres = $this->packhas($key, $pos)
    							? $this->packread($key, $pos)
    							: $this->packwrite($key, $pos, $this->match_DayOfMonthExpression(\array_merge($stack, [$result])));
    						if ($subres !== \false) {
    							$this->store($result, $subres);
    							$_245 = \true; break;
    						}
    						$result = $res_216;
    						$this->pos = $pos_216;
    						$_243 = \null;
    						do {
    							$res_218 = $result;
    							$pos_218 = $this->pos;
    							$key = 'match_DayAndMonthExpression'; $pos = $this->pos;
    							$subres = $this->packhas($key, $pos)
    								? $this->packread($key, $pos)
    								: $this->packwrite($key, $pos, $this->match_DayAndMonthExpression(\array_merge($stack, [$result])));
    							if ($subres !== \false) {
    								$this->store($result, $subres);
    								$_243 = \true; break;
    							}
    							$result = $res_218;
    							$this->pos = $pos_218;
    							$_241 = \null;
    							do {
    								$res_220 = $result;
    								$pos_220 = $this->pos;
    								$key = 'match_DayOfWeekExpression'; $pos = $this->pos;
    								$subres = $this->packhas($key, $pos)
    									? $this->packread($key, $pos)
    									: $this->packwrite($key, $pos, $this->match_DayOfWeekExpression(\array_merge($stack, [$result])));
    								if ($subres !== \false) {
    									$this->store($result, $subres);
    									$_241 = \true; break;
    								}
    								$result = $res_220;
    								$this->pos = $pos_220;
    								$_239 = \null;
    								do {
    									$res_222 = $result;
    									$pos_222 = $this->pos;
    									$key = 'match_MonthExpression'; $pos = $this->pos;
    									$subres = $this->packhas($key, $pos)
    										? $this->packread($key, $pos)
    										: $this->packwrite($key, $pos, $this->match_MonthExpression(\array_merge($stack, [$result])));
    									if ($subres !== \false) {
    										$this->store($result, $subres);
    										$_239 = \true; break;
    									}
    									$result = $res_222;
    									$this->pos = $pos_222;
    									$_237 = \null;
    									do {
    										$res_224 = $result;
    										$pos_224 = $this->pos;
    										$key = 'match_YearExpression'; $pos = $this->pos;
    										$subres = $this->packhas($key, $pos)
    											? $this->packread($key, $pos)
    											: $this->packwrite($key, $pos, $this->match_YearExpression(\array_merge($stack, [$result])));
    										if ($subres !== \false) {
    											$this->store($result, $subres);
    											$_237 = \true; break;
    										}
    										$result = $res_224;
    										$this->pos = $pos_224;
    										$_235 = \null;
    										do {
    											$res_226 = $result;
    											$pos_226 = $this->pos;
    											$key = 'match_FeatureExpression'; $pos = $this->pos;
    											$subres = $this->packhas($key, $pos)
    												? $this->packread($key, $pos)
    												: $this->packwrite($key, $pos, $this->match_FeatureExpression(\array_merge($stack, [$result])));
    											if ($subres !== \false) {
    												$this->store($result, $subres);
    												$_235 = \true; break;
    											}
    											$result = $res_226;
    											$this->pos = $pos_226;
    											$_233 = \null;
    											do {
    												if (\substr($this->string, $this->pos, 1) === '(') {
    													$this->pos += 1;
    													$result["text"] .= '(';
    												}
    												else { $_233 = \false; break; }
    												if (($subres = $this->whitespace()) !== \false) {
    													$result["text"] .= $subres;
    												}
    												$key = 'match_Result'; $pos = $this->pos;
    												$subres = $this->packhas($key, $pos)
    													? $this->packread($key, $pos)
    													: $this->packwrite($key, $pos, $this->match_Result(\array_merge($stack, [$result])));
    												if ($subres !== \false) {
    													$this->store($result, $subres);
    												}
    												else { $_233 = \false; break; }
    												if (($subres = $this->whitespace()) !== \false) {
    													$result["text"] .= $subres;
    												}
    												if (\substr($this->string, $this->pos, 1) === ')') {
    													$this->pos += 1;
    													$result["text"] .= ')';
    												}
    												else { $_233 = \false; break; }
    												$_233 = \true; break;
    											}
    											while(\false);
    											if( $_233 === \true ) { $_235 = \true; break; }
    											$result = $res_226;
    											$this->pos = $pos_226;
    											$_235 = \false; break;
    										}
    										while(\false);
    										if( $_235 === \true ) { $_237 = \true; break; }
    										$result = $res_224;
    										$this->pos = $pos_224;
    										$_237 = \false; break;
    									}
    									while(\false);
    									if( $_237 === \true ) { $_239 = \true; break; }
    									$result = $res_222;
    									$this->pos = $pos_222;
    									$_239 = \false; break;
    								}
    								while(\false);
    								if( $_239 === \true ) { $_241 = \true; break; }
    								$result = $res_220;
    								$this->pos = $pos_220;
    								$_241 = \false; break;
    							}
    							while(\false);
    							if( $_241 === \true ) { $_243 = \true; break; }
    							$result = $res_218;
    							$this->pos = $pos_218;
    							$_243 = \false; break;
    						}
    						while(\false);
    						if( $_243 === \true ) { $_245 = \true; break; }
    						$result = $res_216;
    						$this->pos = $pos_216;
    						$_245 = \false; break;
    					}
    					while(\false);
    					if( $_245 === \true ) { $_247 = \true; break; }
    					$result = $res_214;
    					$this->pos = $pos_214;
    					$_247 = \false; break;
    				}
    				while(\false);
    				if( $_247 === \true ) { $_249 = \true; break; }
    				$result = $res_212;
    				$this->pos = $pos_212;
    				$_249 = \false; break;
    			}
    			while(\false);
    			if( $_249 === \true ) { $_251 = \true; break; }
    			$result = $res_210;
    			$this->pos = $pos_210;
    			$_251 = \false; break;
    		}
    		while(\false);
    		if( $_251 === \true ) { $_253 = \true; break; }
    		$result = $res_208;
    		$this->pos = $pos_208;
    		$_253 = \false; break;
    	}
    	while(\false);
    	if( $_253 === \true ) { return $this->finalise($result); }
    	if( $_253 === \false) { return \false; }
    }


    /* AndExpression: 'AND' > operand:Expression > */
    protected $match_AndExpression_typestack = ['AndExpression'];
    function match_AndExpression($stack = []) {
    	$matchrule = 'AndExpression'; $result = $this->construct($matchrule, $matchrule);
    	$_259 = \null;
    	do {
    		if (($subres = $this->literal('AND')) !== \false) { $result["text"] .= $subres; }
    		else { $_259 = \false; break; }
    		if (($subres = $this->whitespace()) !== \false) { $result["text"] .= $subres; }
    		$key = 'match_Expression'; $pos = $this->pos;
    		$subres = $this->packhas($key, $pos)
    			? $this->packread($key, $pos)
    			: $this->packwrite($key, $pos, $this->match_Expression(\array_merge($stack, [$result])));
    		if ($subres !== \false) {
    			$this->store($result, $subres, "operand");
    		}
    		else { $_259 = \false; break; }
    		if (($subres = $this->whitespace()) !== \false) { $result["text"] .= $subres; }
    		$_259 = \true; break;
    	}
    	while(\false);
    	if( $_259 === \true ) { return $this->finalise($result); }
    	if( $_259 === \false) { return \false; }
    }


    /* OrExpression: 'OR' > operand:Expression > */
    protected $match_OrExpression_typestack = ['OrExpression'];
    function match_OrExpression($stack = []) {
    	$matchrule = 'OrExpression'; $result = $this->construct($matchrule, $matchrule);
    	$_265 = \null;
    	do {
    		if (($subres = $this->literal('OR')) !== \false) { $result["text"] .= $subres; }
    		else { $_265 = \false; break; }
    		if (($subres = $this->whitespace()) !== \false) { $result["text"] .= $subres; }
    		$key = 'match_Expression'; $pos = $this->pos;
    		$subres = $this->packhas($key, $pos)
    			? $this->packread($key, $pos)
    			: $this->packwrite($key, $pos, $this->match_Expression(\array_merge($stack, [$result])));
    		if ($subres !== \false) {
    			$this->store($result, $subres, "operand");
    		}
    		else { $_265 = \false; break; }
    		if (($subres = $this->whitespace()) !== \false) { $result["text"] .= $subres; }
    		$_265 = \true; break;
    	}
    	while(\false);
    	if( $_265 === \true ) { return $this->finalise($result); }
    	if( $_265 === \false) { return \false; }
    }


    /* Result: Expression > (AndExpression | OrExpression) * */
    protected $match_Result_typestack = ['Result'];
    function match_Result($stack = []) {
    	$matchrule = 'Result'; $result = $this->construct($matchrule, $matchrule);
    	$_276 = \null;
    	do {
    		$key = 'match_Expression'; $pos = $this->pos;
    		$subres = $this->packhas($key, $pos)
    			? $this->packread($key, $pos)
    			: $this->packwrite($key, $pos, $this->match_Expression(\array_merge($stack, [$result])));
    		if ($subres !== \false) { $this->store($result, $subres); }
    		else { $_276 = \false; break; }
    		if (($subres = $this->whitespace()) !== \false) { $result["text"] .= $subres; }
    		while (\true) {
    			$res_275 = $result;
    			$pos_275 = $this->pos;
    			$_274 = \null;
    			do {
    				$_272 = \null;
    				do {
    					$res_269 = $result;
    					$pos_269 = $this->pos;
    					$key = 'match_AndExpression'; $pos = $this->pos;
    					$subres = $this->packhas($key, $pos)
    						? $this->packread($key, $pos)
    						: $this->packwrite($key, $pos, $this->match_AndExpression(\array_merge($stack, [$result])));
    					if ($subres !== \false) {
    						$this->store($result, $subres);
    						$_272 = \true; break;
    					}
    					$result = $res_269;
    					$this->pos = $pos_269;
    					$key = 'match_OrExpression'; $pos = $this->pos;
    					$subres = $this->packhas($key, $pos)
    						? $this->packread($key, $pos)
    						: $this->packwrite($key, $pos, $this->match_OrExpression(\array_merge($stack, [$result])));
    					if ($subres !== \false) {
    						$this->store($result, $subres);
    						$_272 = \true; break;
    					}
    					$result = $res_269;
    					$this->pos = $pos_269;
    					$_272 = \false; break;
    				}
    				while(\false);
    				if( $_272 === \false) { $_274 = \false; break; }
    				$_274 = \true; break;
    			}
    			while(\false);
    			if( $_274 === \false) {
    				$result = $res_275;
    				$this->pos = $pos_275;
    				unset($res_275, $pos_275);
    				break;
    			}
    		}
    		$_276 = \true; break;
    	}
    	while(\false);
    	if( $_276 === \true ) { return $this->finalise($result); }
    	if( $_276 === \false) { return \false; }
    }



}
