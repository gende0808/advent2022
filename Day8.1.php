<?php
$lines = explode(PHP_EOL, file_get_contents("Day8.txt"));
$array = [];
foreach ($lines as $line) {
    $addthis = [];
    foreach (str_split($line) as $item) {
        $addthis[] = array("number" => $item);
    }
    $array[] = $addthis;
}
for ($i = 0; $i < count($array); $i++) {
    $left = -1;
    for ($j = 0; $j < count($array); $j++) {
        if ($left < $array[$i][$j]["number"]) {
            $array[$i][$j]["visible"] = 1;
            $left = $array[$i][$j]["number"];
        } else {
            if($left == 9) {
                break;
            }
        }
    }
    $top = -1;
    for ($k = 0; $k < count($array); $k++) {
        if ($top < $array[$k][$i]["number"]) {
            $array[$k][$i]["visible"] = 1;
            $top = $array[$k][$i]["number"];
        } else {
            if($top == 9) {
                break;
            }
        }
    }
}
for($s = count($array)-1; $s > 0; $s--){
    $right = -1;
    for ($c = count($array) - 1; $c > 0; $c--) {
        if ($right < $array[$s][$c]["number"]) {
            $array[$s][$c]["visible"] = 1;
            $right = $array[$s][$c]["number"];
        } else {
            if($right == 9) {
                break;
            }
        }
    }
    $bottom = -1;
    for ($d = count($array) - 1; $d > 0; $d--) {
        if ($bottom < $array[$d][$s]["number"]) {
            $array[$d][$s]["visible"] = 1;
            $bottom = $array[$d][$s]["number"];
        } else {
            if($bottom == 9) {
                break;
            }
        }
    }
}
$counter =0;
foreach($array as $line){
    foreach($line as $bla){
        if(isset($bla["visible"])){
            $counter++;
        }
    } 
}
echo $counter;