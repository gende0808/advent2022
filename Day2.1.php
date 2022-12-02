<?php
$lines = explode(PHP_EOL, file_get_contents("Day2.txt"));
$total = 0;
$scores["A"] = $scores["X"] = 1;
$scores["B"] = $scores["Y"] = 2;
$scores["C"] = $scores["Z"] = 3;
foreach($lines as $line){
    $values = explode(" ", $line);
    $total += ($scores[$values[1]] == $scores[$values[0]]) ? $scores[$values[1]] + 3 : 0;
    $total += ($scores[$values[1]] - $scores[$values[0]] == 1 || $scores[$values[1]] - $scores[$values[0]] == -2) ? 6 + $scores[$values[1]] : 0;
    $total += ($scores[$values[1]] - $scores[$values[0]] == -1 || $scores[$values[1]] - $scores[$values[0]] == 2) ? $scores[$values[1]] : 0;
}
echo $total;