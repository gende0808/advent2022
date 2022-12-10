<?php
$lines = explode(PHP_EOL, file_get_contents("Day10.txt"));
$x = 1;
$cycles = $result = 0;
for ($i = 0; $i < count($lines); $i++) {
    if (str_contains($lines[$i], "noop")) {
        $cycles++;
        if (in_array($cycles, [20, 60, 100, 140, 180, 220])) {
            $result += $cycles * $x;
        }
    } else {
        $cycles += 1;
        if (in_array($cycles, [20, 60, 100, 140, 180, 220])) {
            $result += $cycles * $x;
        }
        $cycles += 1;
        if (in_array($cycles, [20, 60, 100, 140, 180, 220])) {
            $result += $cycles * $x;
        }
        $x += (int)filter_var($lines[$i], FILTER_SANITIZE_NUMBER_INT);
    }
}
echo $result;