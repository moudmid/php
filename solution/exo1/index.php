<?php

function machine_nombre(int $number)
{
    // Convert numbers to array
    $ascending = str_split(strval($number));
    $descending = str_split(strval($number));

    // Ascending order
    sort($ascending, SORT_NUMERIC);

    // Descending order
    rsort($descending, SORT_NUMERIC);

    // Reconstruction of number
    $numberAsc = intval(implode('', $ascending));
    $numberDes = intval(implode('', $descending));

    // Return the difference
    return $numberDes - $numberAsc;
}

?>
