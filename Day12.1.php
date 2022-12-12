<?php
ini_set('max_execution_time', '0'); // for infinite time of execution 
$lines = explode(PHP_EOL, file_get_contents("Day12.txt"));
$map = [];
$shortestpath = 1000;
global $shortestpath;
for ($i = 0; $i < count($lines); $i++) {
    foreach (str_split($lines[$i]) as $letter) {
        $map[$i][]["height"] = ($letter === "S") ? 0 : ($letter === "E" ? 27 : ord($letter) - 96);
    }
}
//22,0  = S
$checkNodes = ["x" =>22, "y" => 0];
go_through_map($checkNodes, $map, 0);
function go_through_map($nodeICameFrom, $map, $steps, $visited = [])
{
    global $shortestpath;
    if ($steps > $shortestpath) {
        return;
    }
    if ($map[$nodeICameFrom["x"]][$nodeICameFrom["y"]]["height"] == 27) {
        if ($steps < $shortestpath) {
            $shortestpath = $steps;
        }
    }
    $steps++;
    $originNode = $map[$nodeICameFrom["x"]][$nodeICameFrom["y"]]["height"];
    $visited[] = $nodeICameFrom;
    if (isset($map[$nodeICameFrom["x"] + 1][$nodeICameFrom["y"]]) && !in_array(["x" => $nodeICameFrom["x"] + 1, "y" => $nodeICameFrom["y"]], $visited)) {
        $neighborNode = $map[$nodeICameFrom["x"] + 1][$nodeICameFrom["y"]]["height"];
        if (($originNode - $neighborNode) >= -1) {
            go_through_map(["x" => $nodeICameFrom["x"] + 1, "y" => $nodeICameFrom["y"]], $map, $steps, $visited);
        }
    }
    if (isset($map[$nodeICameFrom["x"] - 1][$nodeICameFrom["y"]]) && !in_array(["x" => $nodeICameFrom["x"] - 1, "y" => $nodeICameFrom["y"]], $visited)) {
        $neighborNode = $map[$nodeICameFrom["x"] - 1][$nodeICameFrom["y"]]["height"];
        if (($originNode - $neighborNode) >= -1) {
            go_through_map(["x" => $nodeICameFrom["x"] - 1, "y" => $nodeICameFrom["y"]], $map, $steps, $visited);
        }
    }
    if (isset($map[$nodeICameFrom["x"]][$nodeICameFrom["y"] + 1]) && !in_array(["x" => $nodeICameFrom["x"], "y" => $nodeICameFrom["y"] + 1], $visited)) {
        $neighborNode = $map[$nodeICameFrom["x"]][$nodeICameFrom["y"] + 1]["height"];
        if (($originNode - $neighborNode) >= -1) {
            go_through_map(["x" => $nodeICameFrom["x"], "y" => $nodeICameFrom["y"] + 1], $map, $steps, $visited);
        }
    }
    if (isset($map[$nodeICameFrom["x"]][$nodeICameFrom["y"] - 1]) && !in_array(["x" => $nodeICameFrom["x"], "y" => $nodeICameFrom["y"] - 1], $visited)) {
        $neighborNode = $map[$nodeICameFrom["x"]][$nodeICameFrom["y"] - 1]["height"];
        if (($originNode - $neighborNode) >= -1) {
            go_through_map(["x" => $nodeICameFrom["x"], "y" => $nodeICameFrom["y"] - 1], $map, $steps, $visited);
        }
    }
}
echo $shortestpath;
function print_array($array)
{
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}