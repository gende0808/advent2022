<?php
$lines = explode(PHP_EOL, file_get_contents("Day10.txt"));
$x = 1;
$cycles = 0;
$screen = array_fill(0, 6, array_fill(0, 40, "<div class='empty'></div>"));
for ($i = 0; $i < count($lines); $i++) {
    if (str_contains($lines[$i], "noop")) {
        $cycles++;
        $screen[floor($cycles / 40)][$x] = "<div class='block'></div>";
    } else {
        $cycles += 1;
        $screen[floor($cycles / 40)][$x] = "<div class='block'></div>";
        $cycles += 1;
        $screen[floor($cycles / 40)][$x] = "<div class='block'></div>";
        $x += (int)filter_var($lines[$i], FILTER_SANITIZE_NUMBER_INT);
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
    .block {
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
