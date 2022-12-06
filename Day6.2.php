<?php
$letters = str_split(file_get_contents("Day6.txt"));
for ($i = 0; $i < count($letters) - 1; $i++) {
    if ($i > 13) {
        $string = "";
        for ($j = $i; $j > $i - 14; $j--) {
            $string .= $letters[$j];
        }
        $array = count_chars($string, 3);
        if (strlen($array) == 14) {
            echo $i+1;
            exit();
        }
    }
}