<?php 

$input = file_get_contents('data.txt');

$data = explode("\n", $input);

foreach ($data as $key => $value) {
    $data[$key] = explode(" ", $value);
}

function isSafe($report) {
    $increasing = null; // null means not determined yet
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
  //  echo "Safe report: " . implode(" ", $report) . "\n";
    return true;
}

$safeCount = 0;

foreach ($data as $report) {
    if (isSafe($report)) {
        $safeCount++;
    }
}

echo "Number of safe reports: " . $safeCount . "\n";

/**
 * --- Day 2: ---
 */

function dampener($report) {
    $increasing = null; // null means not determined yet
    for ($i = 0; $i < count($report) - 1; $i++) {
        $diff = $report[$i + 1] - $report[$i];
        if ($diff == 0 || abs($diff) > 3) {
            print_r($report[$i]);
        }
        if ($increasing === null) {
            $increasing = $diff > 0;
        } else {
            if (($increasing && $diff < 0) || (!$increasing && $diff > 0)) {
                return false;
            }
        }
    }
  //  echo "Safe report: " . implode(" ", $report) . "\n";
    return true;
}

$safeCount = 0;

foreach ($data as $report) {
    if (dampener($report)) {
        $safeCount++;
    }
}





?>