<?php
$lines = explode(PHP_EOL, file_get_contents("Day9.txt"));
$array = [];
$xhead = $xtail = 0;
$yhead = $ytail = 0;
foreach ($lines as $line) {
    $num = preg_replace('/[^0-9]/', '', $line);
    for ($i = 0; $i < $num; $i++) {
        $yhead += (str_contains($line, "U")) ? 1 : (str_contains($line, "D") ? -1 : 0);
        $xhead += (str_contains($line, "R")) ? 1 : (str_contains($line, "L") ? -1 : 0);
        if (abs($yhead - $ytail) > 1) {
            $xtail = $xhead;
            if ($yhead > $ytail) {
                $ytail += 1;
            }else{
                $ytail -= 1;
            }
        }
        if (abs($xhead - $xtail) > 1) {
            $ytail = $yhead;
            if ($xhead > $xtail) {
                $xtail += 1;
            }else{
                $xtail -= 1;
            }
        }
        $array[$ytail][$xtail] = "X";
    }
}
$total = 0;
foreach($array as $row){
    $total += count($row);
}
echo $total;