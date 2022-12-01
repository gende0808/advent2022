<?php
$input = explode(PHP_EOL, file_get_contents("Day1.txt"));
$temp = 0;
foreach ($input as $number) {
    if (!is_numeric($number)) {
        $total[] = $temp;
        $temp = 0;
    } else {
        $temp += $number;
    }
}
rsort($total, SORT_NUMERIC);
echo $total[0] + $total[1] + $total[2];