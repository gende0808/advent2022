<?php
$lines = explode(PHP_EOL, file_get_contents("Day3.txt"));
$total = 0;
for ($i = 0; $i < count($lines); $i += 3) {
    $ascii = ord(implode(array_unique(array_intersect(str_split($lines[$i]), str_split($lines[$i + 1]), str_split($lines[$i + 2])))));
    $total += ($ascii > 96) ? $ascii - 96 : $ascii - 38;
}
echo $total;