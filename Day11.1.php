<?php
$lines = preg_split('/\s*\n(\s*\n)*\s*/', file_get_contents("Day11.txt"));
$monkeys = [];
for ($i = 0; $i < count($lines); $i += 6) {
    $id = preg_replace("(Monkey |:)", "", $lines[$i]);
    preg_match_all('/\d+/', $lines[$i + 1], $matches);
    $monkeys[$id]["items"] = $matches[0];
    $monkeys[$id]["operation"] = preg_replace("(Operation: new = )", "", $lines[$i + 2]);
    $monkeys[$id]["test"] = preg_replace("(Test: divisible by )", "", $lines[$i + 3]);
    $monkeys[$id]["true"] = preg_replace("(If true: throw to monkey )", "", $lines[$i + 4]);
    $monkeys[$id]["false"] = preg_replace("(If false: throw to monkey )", "", $lines[$i + 5]);
    $monkeys[$id]["inspections"] = 0;
}
for ($operations = 0; $operations < 20; $operations++) {
    for ($monkey = 0; $monkey < count($monkeys); $monkey++) {
        for ($item = 0; $item < count($monkeys[$monkey]["items"]); $item++) {
            $monkeys[$monkey]["inspections"]++;
            $operationNumber = $int = (int)filter_var($monkeys[$monkey]["operation"], FILTER_SANITIZE_NUMBER_INT);
            if (str_contains($monkeys[$monkey]["operation"], "*")) {
                if (substr_count($monkeys[$monkey]["operation"], "old") > 1) {
                    $monkeys[$monkey]["items"][$item] *= $monkeys[$monkey]["items"][$item];
                } else {
                    $monkeys[$monkey]["items"][$item] *= $operationNumber;
                }
            } else {
                $monkeys[$monkey]["items"][$item] = $monkeys[$monkey]["items"][$item] + $operationNumber;
            }
            $monkeys[$monkey]["items"][$item] = floor($monkeys[$monkey]["items"][$item] / 3);
            if ($monkeys[$monkey]["items"][$item] % $monkeys[$monkey]["test"] == 0) {
                $monkeys[$monkeys[$monkey]["true"]]["items"][] = $monkeys[$monkey]["items"][$item];
            } else {
                $monkeys[$monkeys[$monkey]["false"]]["items"][] = $monkeys[$monkey]["items"][$item];
            }
        }
       $monkeys[$monkey]["items"] = [];
    }
}
foreach($monkeys as $monkey){
    echo $monkey["inspections"]."<br>";
}