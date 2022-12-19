<?php
$pairingNumber = 0;
$result = array();
$lines = explode(PHP_EOL, file_get_contents("Day13.txt"));
for ($i = 0; $i < count($lines); $i += 3) {
    $pairingNumber++;
    $pair_1 = json_decode($lines[$i]);
    $pair_2 = json_decode($lines[$i + 1]);
    $pair_1_size = mb_strlen(serialize((array)$pair_1), '8bit');
    $pair_2_size = mb_strlen(serialize((array)$pair_2), '8bit');
    $block1 = array();
    array_walk_recursive($pair_1, function ($item) use (&$block1) {
        $block1[] = $item;
    });
    $block2 = array();
    array_walk_recursive($pair_2, function ($item) use (&$block2) {
        $block2[] = $item;
    });
    if (empty($block1)) {
        if (!empty($block2)) {
            $result[] = $pairingNumber;
            break;
        } elseif ($pair_1_size < $pair_2_size) {
            $result[] = $pairingNumber;
            break;
        }
    }
    for ($j = 0; $j < count($block1); $j++) {
        if (isset($block2[$j])) {
            if ($block1[$j] < $block2[$j]) {
                $result[] = $pairingNumber;
                break;
            }
        }
        if ($j == count($block1) - 1 && $block1[$j] == $block2[$j] && count($block1) < count($block2)) {
            $result[] = $pairingNumber;
            break;
        }
    }
}
print_array($result);
echo array_sum($result);
function print_array($array)
{
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}
//5687 too low
//492 too low