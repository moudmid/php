<?php
$alphabet = [
    'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z',
    'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z',
    '0', '1', '2', '3', '4', '5', '6', '7', '8', '9',
    ' ', '.', ',', ';', ':'
];
?>

<?php
function dissimule(array $alphabet, string $text, string $key): string
{
    $textInt = array();
    $keyInt = array();

    for ($i = 0; $i < strlen($key); $i++) {
        array_push($keyInt, array_search($key[$i], $alphabet));
    }

    for ($i = 0; $i < strlen($text); $i++) {
        array_push($textInt, array_search($text[$i], $alphabet));
    }

    $resultInt = array();

    for ($i = 0; $i < strlen($text); $i++) {
        $val = ($textInt[$i] + $keyInt[$i % count($keyInt)]) % count($alphabet);
        array_push($resultInt, $val);
    }

    $result = array();

    for ($i = 0; $i < strlen($text); $i++) {
        array_push($result, $alphabet[$resultInt[$i]]);
    }

    return implode('', $result);
}
?>

<?php //  var_dump(dissimule($alphabet, "Bonjour ISN.", "Master2")) 
?>
<!-- OUT: N:QNDWeHi 6a -->

<?php

function revele(array $alphabet, string $text, string $key): string
{
    $keyInt = array();

    for ($i = 0; $i < strlen($key); $i++) {
        array_push($keyInt, array_search($key[$i], $alphabet));
    }

    $resultInt = array();

    for ($i = 0; $i < strlen($text); $i++) {
        array_push($resultInt, array_search($text[$i], $alphabet));
    }

    $textInt = array();

    for ($i = 0; $i < strlen($text); $i++) {
        if ($resultInt[$i] - $keyInt[$i % count($keyInt)] < 0) {
            array_push($textInt, $resultInt[$i] + count($alphabet) - $keyInt[$i % count($keyInt)]);
        } else {
            array_push($textInt, $resultInt[$i] - $keyInt[$i % count($keyInt)]);
        }
    }

    $result = array();

    for ($i = 0; $i < strlen($text); $i++) {
        array_push($result, $alphabet[$textInt[$i]]);
    }

    return implode('', $result);
}
?>

<?php  // var_dump(revele($alphabet, "T4t3LLDAK LH2aBItuKpdnKA9kxHldlFpu uNUlYA9CI", "PHPMysql")) 
?>
<!-- OUT: Exercice 3. Examen du jeudi 20 janvier 2022. -->


<form action="/test/exo3/index.php" method="GET">
    <div>
        <label for="text">Texte :</label>
        <input type="text" id="text" name="text">
    </div>

    <div>
        <label for="key">Clé :</label>
        <input type="text" id="key" name="key">
    </div>

    <button type="submit">Dissimuler</button>
</form>

<div class="result" style="width: 400px;">
    Résultat : <?= dissimule($alphabet, $_GET['text'], $_GET['key']) ?>
</div>
