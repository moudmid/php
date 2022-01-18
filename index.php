<?php

function colorTable(int $color): array
{
    const $colors = [
        "red" => 0,
        "green" => 1,
        "blue" => 2,
    ];

    $first = random_int(0, 255);
    $second = random_int(0, $first);
    $third = random_int(0, $second);
    $max = max($first, $second, $third);

    switch ($color) {
        case $colors["red"]:
            return array($max, $second, $third);
        case $colors["green"]:
            return array($second, $max, $third);
        case $colors["blue"]:
            return array($second, $third, $max);
    }

    return null;
}
?>

<div style="display: flex;">
    <a href="/test/index.php?color=0" style="padding: 10px;">Red</a>
    <a href="/test/index.php?color=1" style="padding: 10px;">Green</a>
    <a href="/test/index.php?color=2" style="padding: 10px;">Blue</a>
</div>

<?php $color = intval($_GET['color']) ?>

<table>
    <?php for ($i = 0; $i < 50; $i++) { ?>
        <tr>
            <?php for ($j = 0; $j < 50; $j++) { ?>
                <?php $colors = colorTable($color); ?>
                <td style="background-color: rgb(<?= $colors[0] ?>,<?= $colors[1] ?>,<?= $colors[2] ?>);"></td>
            <?php } ?>
        </tr>
    <?php } ?>
</table>
