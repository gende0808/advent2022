<?php
$lines = explode(PHP_EOL, file_get_contents("Day8.txt"));
$array = [];
$trees = 0;
$best = 0;
foreach ($lines as $line) {
    $addthis = [];
    foreach (str_split($line) as $item) {
        $addthis[] = array("number" => $item);
    }
    $array[] = $addthis;
}
for ($i = 0; $i < count($array); $i++) {
    for ($j = 0; $j < count($array); $j++) {
        $treesleft = $treesdown = $treesright = $treesup = 0;
        $currentTree = $array[$i][$j]["number"];
        for ($k = $j - 1; $k >= 0; $k--) {
            if ($currentTree > $array[$i][$k]["number"]) {
                $treesleft++;
            } else {
                $treesleft++;
                break;
            }
        }
        for ($k = $j + 1; $k < count($array); $k++) {
            if ($currentTree > $array[$i][$k]["number"]) {
                $treesright++;
            } else {
                $treesright++;
                break;
            }
        }
        for ($k = $i - 1; $k >= 0; $k--) {
            if ($currentTree > $array[$k][$j]["number"]) {
                $treesup++;
            } else {
                $treesup++;
                break;
            }
        }
        for ($k = $i + 1; $k < count($array); $k++) {
            if ($currentTree > $array[$k][$j]["number"]) {
                $treesdown++;
            } else {
                $treesdown++;
                break;
            }
        }
        $best = ($treesleft * $treesright * $treesdown * $treesup > $best) ? ($treesleft * $treesright * $treesdown * $treesup) : $best;
    }
}
echo $best;
