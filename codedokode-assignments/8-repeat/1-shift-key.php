<?php

$text = "ну что.      не смотрел еще black mesa.я собирался скачать  ,но все как-то некогда было.";

// Для тестов
// $text = 'roses are red,and violets are blue.whatever you do i'll keep it for you.';
// $text = 'привет.есть 2 функции,preg_split и explode ,не понимаю,в чем между ними разница.';

/* Делает первую букву в строке заглавной */


function makeFirstLetterUppercase(string &$text):void
{
    $text = mb_strtoupper(mb_substr($text, 0, 1)) . mb_substr($text, 1);
}


/* исправляет текст */
function fixText(string $text):string
{
    $sentencePattern = '/(?<=[!?.])./u';
    $sentences = preg_split($sentencePattern , $text, flags:PREG_SPLIT_NO_EMPTY);
    array_walk($sentences, 'makeFirstLetterUppercase');

}

fixText($text);

$result = fixText($text);
echo "{$result}\n";
