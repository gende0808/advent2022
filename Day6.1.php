<?php
$letters = str_split(file_get_contents("Day6.txt"));
for ($i = 0; $i < count($letters) - 1; $i++) {
    if ($i > 2) {
        $string = $letters[$i] . $letters[$i - 1] . $letters[$i - 2] . $letters[$i - 3];
        $array = count_chars($string, 3);
        if (strlen($array) == 4) {
            echo $i + 1;
            exit();
        }
    }
}