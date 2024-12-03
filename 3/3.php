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

echo "Total: " . $total;




?> 