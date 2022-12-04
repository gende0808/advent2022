<?php
$lines = explode(PHP_EOL, file_get_contents("Day4.txt"));
$total = 0;
foreach ($lines as $line) {
    $ranges = preg_split("(\,|\-)", $line);
    $total += ($ranges[0] >= $ranges[2] && $ranges[1] <= $ranges[3]) ? 1 : (($ranges[2] >= $ranges[0] && $ranges[3] <= $ranges[1]) ? 1 : 0);
}
echo $total;