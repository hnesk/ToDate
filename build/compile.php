<?php
/*                                                                        *
 * This file is part of the ToDate library                                *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU Lesser General Public License, either version 3   *
 * of the License, or (at your option) any later version.                 *
 *                                                                        *
 * (c) 2012-2014 Johannes Künsebeck <kuensebeck@googlemail.com            */

use hafriedlander\Peg\Compiler;

require_once __DIR__ . '/../vendor/autoload.php';


$input = file_get_contents(__DIR__ . '/FormalDateExpressionParser.peg.inc');
$output = Compiler::compile($input);
file_put_contents(__DIR__ . '/../src/ToDate/Parser/Generated/FormalDateExpressionParser.php', $output);
