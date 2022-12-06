<?php
$letters = file_get_contents("Day6.txt");
for ($i = 1; $i < strlen($letters) - 1; $i++) {
    echo (strlen(count_chars(substr($letters, $i, 14), 3)) >= 14) ? $i+14 . "<br>" : "";
}