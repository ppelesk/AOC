<?php 

    /*
    * --- Day 3: ---
    * 
    *  Part 1: 
    */

$input = file_get_contents('data.txt');

$matches = [];

preg_match_all('/mul\((\d+),(\d+)\)/', $input, $matches);
$total = 0;

foreach ($matches[1] as $key => $num1) {
    $num2 = $matches[2][$key];
    $total += $num1 * $num2;
}

echo "Total: " . $total . "\n";



/**
 * Part 2:
 */


preg_match_all('/mul\((\d+),(\d+)\)|do\(\)|don\'t\(\)/', $input, $matches);

$total = 0;
$pause = true; 

foreach ($matches[0] as $key => $match) {
    if (strpos($match, 'mul') === 0) {
        if ($pause) {
            $num1 = $matches[1][$key];
            $num2 = $matches[2][$key];
            $total += $num1 * $num2;
        }
    } elseif ($match === "do()") {
        $pause = true;
    } elseif ($match === "don't()") {
        $pause = false;
    }
}

echo "Total with do() and don't(): " . $total . "\n";

?> 