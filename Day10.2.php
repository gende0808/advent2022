<?php
$lines = explode(PHP_EOL, file_get_contents("Day10.txt"));
$x = 1;
$cycles = 1;
$screen = array_fill(0, 6, array_fill(1, 40, "<div class='empty'></div>"));
for ($i = 0; $i < count($lines); $i++) {
    if (str_contains($lines[$i], "noop")) {
        $cycles++;
        if (abs(($cycles % 40) - $x) <= 1) {
            $screen[intdiv($cycles, 40)][$cycles] = "<div class='green'></div>";
        }
    } else {
        $cycles += 1;
        if (abs(($cycles % 40) - $x) <= 1) {
            $screen[intdiv($cycles, 40)][$cycles] = "<div class='green'></div>";
        }
        $cycles += 1;
        if (abs(($cycles % 40) - $x) <= 1) {
            $screen[intdiv($cycles, 40)][$cycles] = "<div class='green'></div>";
        }
        $x += (int)filter_var($lines[$i], FILTER_SANITIZE_NUMBER_INT);
    }
}

function print_array($array)
{
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

foreach ($screen as $row) {
    foreach ($row as $symbol) {
        echo $symbol;
    }
    echo "<br>";
}
print_array($screen);
?>
<style>
    .green {
        background-color: green;
        width: 10px;
        height: 10px;
        float: left;
    }

    .empty {
        background-color: red;
        float: left;
        width: 10px;
        height: 10px;

    }
</style>
