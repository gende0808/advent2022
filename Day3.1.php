<?php
$lines = explode(PHP_EOL, file_get_contents("Day3.txt"));
$total = 0;
foreach ($lines as $rucksack) {
    $compartments = str_split($rucksack, strlen($rucksack) / 2);
    $ascii = ord(implode(array_unique(array_intersect( str_split($compartments[0]), str_split($compartments[1])))));
    $total += ($ascii > 96) ? $ascii - 96 : $ascii - 38;
}
echo $total;