<?php
$lines = explode(PHP_EOL, file_get_contents("Day2.txt"));
$total = 0;
$scores = ["A" => 1, "B" => 2, "C" => 3];
foreach ($lines as $line) {
    $values = explode(" ", $line);
    $total += ($values[1] == "Y") ? $scores[$values[0]] + 3 : 0;
    $total += ($values[1] == "X") ? (($scores[$values[0]] != 1) ? $scores[$values[0]] - 1 : 3) : 0;
    $total += ($values[1] == "Z") ? (($scores[$values[0]] != 3) ? $scores[$values[0]] + 7 : 7) : 0;
}
echo $total;