<?php
$crates = array(1 => ["R", "G", "J", "B", "T", "V", "Z"], 2 => ["J", "R", "V", "L"], 3 => ["S", "Q", "F"], 4 => ["Z", "H", "N", "L", "F", "V", "Q", "G"], 5 => ["R", "Q", "T", "J", "C", "S", "M", "W"], 6 => ["S", "W", "T", "C", "H", "F"], 7 => ["D", "Z", "C", "V", "F", "N", "J"], 8 => ["L", "G", "Z", "D", "W", "R", "F", "Q"], 9 => ["J", "B", "W", "V", "P"]);
$lines = explode(PHP_EOL, file_get_contents("Day5.txt"));
foreach ($lines as $line) {
    $command = array_values(array_filter(preg_split("(move | from | to |)", $line)));
    for ($amount = $command[0]; $amount > 0; $amount--) {
        if (count($crates[$command[1] > 0])) {
            array_push($crates[$command[2]],end($crates[$command[1]]));
            array_pop($crates[$command[1]]);
        }
    }
}
print_array($crates);










foreach ($crates as $stack) {
    echo end($stack);
}
function print_array($array)
{
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}