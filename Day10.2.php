<?php
$lines = explode(PHP_EOL, file_get_contents("Day10.txt"));
$x = 2;
$cycles = 1;
$screen = array_fill(0, 6, array_fill(1, 40, "<div class='empty'></div>"));
global $screen;
for ($i = 0; $i < count($lines); $i++) {
    if (str_contains($lines[$i], "noop")) {
        do_things($cycles, $x);
        $cycles++;
    } else {
        do_things($cycles, $x);
        $cycles++;
        do_things($cycles, $x);
        $cycles++;
        $x += (int)filter_var($lines[$i], FILTER_SANITIZE_NUMBER_INT);
    }
}
function do_things($cycles, $x)
{
    global $screen;
    if (abs(($cycles % 40) - $x) <= 1) {
        $screen[intdiv($cycles, 40)][$cycles % 40] = "<div class='green'></div>";
    }
}
foreach ($screen as $row) {
    foreach ($row as $symbol) {
        echo $symbol;
    }
    echo "<br>";
}
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
