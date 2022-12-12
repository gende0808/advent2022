<?php
$lines = explode(PHP_EOL, file_get_contents("Day12.txt"));
$map = [];
for ($i = 0; $i < count($lines); $i++) {
    foreach (str_split($lines[$i]) as $letter) {
        $map[$i][]["height"] = ($letter === "S") ? 1 : ($letter === "E" ? 26 : ord($letter) - 96);
    }
}
$checkNodes[] = ["x" => 20, "y" => 0];
go_through_map($checkNodes, $map, 0);
function go_through_map($nodesThisRow, $map, $steps, $visited = [])
{
    $futureNodes = [];
    foreach ($nodesThisRow as $node) {
        $originNode = $map[$node["x"]][$node["y"]]["height"];
        $visited[] = ["x" => $node["x"], "y" => $node["y"]];
        if ($node["x"] == 20 && $node["y"] == 149) {
            echo $steps . "<br>";
            exit;
        }
        if (isset($map[$node["x"] + 1][$node["y"]]) && !in_array(["x" => $node["x"] + 1, "y" => $node["y"]], $visited) && !in_array(["x" => $node["x"] + 1, "y" => $node["y"]], $futureNodes)) {
            $neighborNode = $map[$node["x"] + 1][$node["y"]]["height"];
            if (($originNode - $neighborNode) >= -1) {
                $futureNodes[] = ["x" => $node["x"] + 1, "y" => $node["y"]];
            }
        }
        if (isset($map[$node["x"] - 1][$node["y"]]) && !in_array(["x" => $node["x"] - 1, "y" => $node["y"]], $visited) && !in_array(["x" => $node["x"] - 1, "y" => $node["y"]], $futureNodes)) {
            $neighborNode = $map[$node["x"] - 1][$node["y"]]["height"];
            if (($originNode - $neighborNode) >= -1) {
                $futureNodes[] = ["x" => $node["x"] - 1, "y" => $node["y"]];
            }
        }
        if (isset($map[$node["x"]][$node["y"] + 1]) && !in_array(["x" => $node["x"], "y" => $node["y"] + 1], $visited) && !in_array(["x" => $node["x"], "y" => $node["y"] + 1], $futureNodes)) {
            $neighborNode = $map[$node["x"]][$node["y"] + 1]["height"];
            if (($originNode - $neighborNode) >= -1) {
                $futureNodes[] = ["x" => $node["x"], "y" => $node["y"] + 1];
            }
        }
        if (isset($map[$node["x"]][$node["y"] - 1]) && !in_array(["x" => $node["x"], "y" => $node["y"] - 1], $visited) && !in_array(["x" => $node["x"], "y" => $node["y"] - 1], $futureNodes)) {
            $neighborNode = $map[$node["x"]][$node["y"] - 1]["height"];
            if (($originNode - $neighborNode) >= -1) {
                $futureNodes[] = ["x" => $node["x"], "y" => $node["y"] - 1];
            }
        }

    }
    $steps++;
    go_through_map($futureNodes, $map, $steps, $visited);
}