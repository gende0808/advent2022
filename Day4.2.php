<?php
$lines = explode(PHP_EOL, file_get_contents("Day4.txt"));
$total = 0;
foreach ($lines as $line) {
    $ranges = preg_split("(\,|\-)", $line);
    $total += (array_intersect(array($ranges[2], $ranges[3]), range($ranges[0], $ranges[1]))) ? 1 : ((array_intersect(array($ranges[0], $ranges[1]), range($ranges[2], $ranges[3]))) ? 1 : 0);
}
echo $total;