<?php 


/**
 * --- Day 1: Historian Hysteria ---
 */

$input = [];

$listL = [];
$listR = [];
$listSortedL = [];
$listSortedR = [];


foreach ($input as $list) {
  $listL[] .= $list[0];
  $listR[] .= $list[1];
}


sort($listL);
sort($listR);


$distance = 0;  

for ($i = 0; $i < 1000; $i++) {
  $distance += abs($listL[$i] - $listR[$i]);
} 


echo "First part: " . $distance . "\n";


$result = 0;

 
foreach ($listL as $key => $value) {
    $count = 0;
    foreach ($listR as $key2 => $value2) {
        if ($value == $value2) {
            $count++;  
        }
    }
    $diff = $count * $value;
    $result += $diff;
}

echo "Second part: " . $result . "\n";
?> 