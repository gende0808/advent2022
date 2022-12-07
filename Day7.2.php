<?php
$lines = explode(PHP_EOL, file_get_contents("Day7.txt"));
$array = [];
$current_dir = "";
foreach ($lines as $line) {
    if (str_contains($line, "$ cd ")) {
        $current_dir = (str_contains($line, "..")) ? preg_split('~/(?=[^/]*$)~', $current_dir)[0] : $current_dir .= "/" . str_replace("$ cd ", "", $line);
    }
    if (str_contains($line, "dir")) {
        $dir = explode("dir ", $line)[0];
        $array[$current_dir][$dir] = [];
    }
    if ((int)$line > 0) {
        $array[$current_dir][] = (int)$line;
    }
}
$answer = 0;
foreach($array as $numbers){
    $answer += array_sum($numbers);
}
foreach ($array as $foldername => $content) {
    $sum = 0;
    foreach ($array as $mapname => $stuffinside) {
        $sum += (str_contains($mapname, $foldername)) ? array_sum($stuffinside) : 0;
    }
   if($answer - $sum < 40000000){
        $blerp[] = $sum;
   }
}
echo min($blerp);