<?php 


/**
 * --- Day 2: Red-Nosed Reports ---
 * 
 * 
 */


// Get data from file
$input = file_get_contents('data.txt');
$data = explode("\n", $input);
foreach ($data as $key => $value) {
    $data[$key] = explode(" ", $value);
}


/**
 * Get the difference between the two numbers
 * if the absolute value of the difference is greater than 3, the report is unsafe
 * check if the values are increasing or decreasing
 */


function is_safe($report) {
    $increasing = null; 
    for ($i = 0; $i < count($report) - 1; $i++) {
        $diff = $report[$i + 1] - $report[$i]; 
        if ($diff == 0 || abs($diff) > 3) { 
            return false;
        }
        if ($increasing === null) {
            $increasing = $diff > 0;
        } else {
            if (($increasing && $diff < 0) || (!$increasing && $diff > 0)) {
                return false;
            }
        }
    }
    return true;
}

$safeCount = 0;

foreach ($data as $report) {
    if (is_safe($report)) {
        $safeCount++;
    }
}

echo "Number of safe reports: " . $safeCount . "\n";

/**
 * --- Part 2: ---
 */


 /**
  * When unsafe, remove the faulty number and check if the report is safe
  */

function is_safe_with_removal($report) {
    $n = count($report);
    
    for ($i = 0; $i < $n; $i++) {
        $modified_report = array_merge(array_slice($report, 0, $i), array_slice($report, $i + 1));
        
        if (is_safe($modified_report)) {
            return true;
        }
    }
    
    return false;
}

function count_safe_reports($data) {
    $safe_count = 0;
   
    foreach ($data as $report) {
        if (is_safe($report) || is_safe_with_removal($report)) {
            $safe_count++;
        }
    }
    
    return $safe_count;
}


echo "Number of safe reports with Problem Dampener: " . count_safe_reports($data) . "\n";

?>