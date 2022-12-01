<?php
$input = explode(PHP_EOL, file_get_contents("Day1.txt"));
$highestCalories = 0;
$temp = 0;
foreach ($input as $number) {
    if (!is_numeric($number)) {
        $total = ($temp > $total) ? $temp : $total;
        $temp = 0;
    } else {
        $temp += $number;
    }
}
echo $total;