<?php

$text = 'Пocтaвкa мяco гoвядины, бecкостнoe для нужд государственного бюджетного учреждения здравоохранения';

function findTypos($text): array
{
    $alienLetterPattern = '/(?<words>\w*([А-Яа-яЁё][a-zA-Z]|[a-zA-Z][А-Яа-яЁё])\w*)/u';
    $mistypedWords = [];
    preg_match_all($alienLetterPattern, $text, $mistypedWords);

    return $mistypedWords['words'];
}

function annotateTypos(array $typos): array
{
    $annotatedTypos = [];
    foreach ($typos as $typo) {
        $annotatedTypos[(string)$typo] = preg_replace('/(.)([a-zA-Z])(.)/u', '$1[$2]$3', $typo);
    }

    return $annotatedTypos;
}

function printAnnotatedTypos(array $annotatedTypos): void
{
    foreach ($annotatedTypos as $typo => $markedTypo) {
        echo 'Опечатка в слово слове ' . $typo . ': ' . $markedTypo . PHP_EOL;
    }
}

printAnnotatedTypos(annotateTypos(findTypos($text)));