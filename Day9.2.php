<?php
$lines = explode(PHP_EOL, file_get_contents("Day9.txt"));
$array = [];
$bodyelements = array_fill(0, 10, ["x" => 0, "y" => 0]);
foreach ($lines as $line) {
    $num = preg_replace('/[^0-9]/', '', $line);
    for ($i = 0; $i < $num; $i++) {
        $bodyelements[0]["y"] += (str_contains($line, "U")) ? 1 : (str_contains($line, "D") ? -1 : 0);
        $bodyelements[0]["x"] += (str_contains($line, "R")) ? 1 : (str_contains($line, "L") ? -1 : 0);
        for ($j = 1; $j < count($bodyelements); $j++) {
            if (abs($bodyelements[$j - 1]["y"] - $bodyelements[$j]["y"]) > 1 && abs($bodyelements[$j - 1]["x"] - $bodyelements[$j]["x"]) > 1) {
                $bodyelements[$j]["y"] += ($bodyelements[$j - 1]["y"] > $bodyelements[$j]["y"]) ? 1 : -1;
                $bodyelements[$j]["x"] += ($bodyelements[$j - 1]["x"] > $bodyelements[$j]["x"]) ? 1 : -1;
            } else {
                if (abs($bodyelements[$j - 1]["y"] - $bodyelements[$j]["y"]) > 1) {
                    $bodyelements[$j]["x"] = $bodyelements[$j - 1]["x"];
                    $bodyelements[$j]["y"] += ($bodyelements[$j - 1]["y"] > $bodyelements[$j]["y"]) ? 1 : -1;
                }
                if (abs($bodyelements[$j - 1]["x"] - $bodyelements[$j]["x"]) > 1) {
                    $bodyelements[$j]["y"] = $bodyelements[$j - 1]["y"];
                    $bodyelements[$j]["x"] += ($bodyelements[$j - 1]["x"] > $bodyelements[$j]["x"]) ? 1 : -1;
                }
            }
        }
        $array[$bodyelements[9]["y"]][$bodyelements[9]["x"]] = "X";
    }
}
echo count(array_reduce($array,'array_merge',array()));