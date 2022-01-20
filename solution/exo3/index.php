<?php
$alphabet = [
    'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z',
    'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z',
    '0', '1', '2', '3', '4', '5', '6', '7', '8', '9',
    ' ', '.', ',', ';', ':'
];
?>

<?php
function dissimule(array $alphabet, string $text, string $key)
{
    $newKey = $key . substr($key, 0, strlen($text) - strlen($key));

    $textInt = array();
    $keyInt = array();

    for ($i = 0; $i < strlen($text); $i++) {
        array_push($textInt, array_search($text[$i], $alphabet));
        array_push($keyInt, array_search($newKey[$i], $alphabet));
    }

    $resultInt = array();

    for ($i = 0; $i < strlen($text); $i++) {
        $val = ($textInt[$i] + $keyInt[$i]) % count($alphabet);
        array_push($resultInt, $val);
    }

    $result = array();

    for ($i = 0; $i < strlen($text); $i++) {
        array_push($result, $alphabet[$resultInt[$i]]);
    }

    return implode('', $result);
}
?>

<?= var_dump(dissimule($alphabet, "Bonjour ISN.", "Master2")) ?>
