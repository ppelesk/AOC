<?php 


    /*
    * --- Day 4: ---
    * 
    *  Part 1: 
    */ 


$input = file_get_contents('data.txt');

$lines = explode("\n", $input);

$data = []; 


foreach ($lines as $line) {
    if (!empty(trim($line))) { 
        $data[] = str_split($line);
    }
}


function findXMAS($data) {
    $word = "XMAS";
    $wordLength = strlen($word);
    $rows = count($data);
    $cols = count($data[0]);
    $count = 0;

    $directions = [
        [0, 1], [0, -1], [1, 0], [-1, 0], // horizontal and vertical
        [1, 1], [1, -1], [-1, 1], [-1, -1] // diagonal
    ];

    for ($r = 0; $r < $rows; $r++) {
        for ($c = 0; $c < $cols; $c++) {
            foreach ($directions as $dir) {
                $found = true;
                for ($k = 0; $k < $wordLength; $k++) {
                    $nr = $r + $k * $dir[0];
                    $nc = $c + $k * $dir[1];
                    if ($nr < 0 || $nr >= $rows || $nc < 0 || $nc >= $cols || $data[$nr][$nc] != $word[$k]) {
                        $found = false;
                        break;
                    }
                }
                if ($found) {
                    $count++;
                }
            }
        }
    }

    return $count;
}

$totalXMAS = findXMAS($data);
echo "Total occurrences of XMAS: " . $totalXMAS . "\n";




/**
 * Part 2:
 */



 $input = file_get_contents('data.txt');
 $data = []; 

 $lines = explode("\n", $input);
 

 foreach ($lines as $line) {
     if (!empty(trim($line))) { 
         $data[] = str_split($line); 
     }
 }
 
 function rotateArray($data) {
     $rows = count($data);
     $cols = count($data[0]);
     $rotated = [];
 
     for ($c = 0; $c < $cols; $c++) {
         $newRow = [];
         for ($r = $rows - 1; $r >= 0; $r--) {
             $newRow[] = $data[$r][$c];
         }
         $rotated[] = $newRow;
     }
 
     return $rotated;
 }
 
 function findMAS($data) {
     $rows = count($data);
     $cols = count($data[0]);
     $count = 0;
 
     for ($r = 1; $r < $rows - 1; $r++) {
         for ($c = 1; $c < $cols - 1; $c++) {
             if ($data[$r][$c] == 'A') {
                 if (
                     ($data[$r - 1][$c - 1] == 'M' && $data[$r + 1][$c + 1] == 'S' &&
                      $data[$r - 1][$c + 1] == 'S' && $data[$r + 1][$c - 1] == 'M')
                 ) {
                     $count++;
                 } elseif (
                     ($data[$r - 1][$c - 1] == 'S' && $data[$r + 1][$c + 1] == 'M' &&
                      $data[$r - 1][$c + 1] == 'M' && $data[$r + 1][$c - 1] == 'S')
                 ) {
                     $count++;
                 }
             }
         }
     }
 
     return $count;
 }
 
 $totalMAS = findMAS($data);
 $data90 = rotateArray($data);
 $totalMAS += findMAS($data90);

 
 echo "Total occurrences of X-MAS: " . $totalMAS . "\n";