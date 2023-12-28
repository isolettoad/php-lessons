<?php

$text = 'ну что.      не смотрел еще black mesa.я собирался скачать  ,но все как-то некогда было.';
$text1 = 'roses are red,and violets are blue.whatever you do i\'ll keep it for you.';
$text2 = 'привет.есть 2 функции,preg_split и explode ,не понимаю,в чем между ними разница.';
$text3 = 'много их в Петербурге,молоденьких дур,сегодня в атласе да бархате,а завтра , поглядишь , метут улицу вместе с голью кабацкою...в самом деле ,что было бы с нами ,если бы вместо общеудобного правила:чин чина почитай , ввелось в употребление другое,например:ум ума почитай?какие возникли бы споры!';

/* Делает первую букву в строке заглавной */

function makeFirstLetterUppercase(string $text): string
{
    return mb_strtoupper(mb_substr($text, 0, 1)) . mb_substr($text, 1);
}

/* исправляет текст */
function fixText(string $text): string
{
    $sentenceDividingPattern = '/(?<=[.!?])(?=[\w\s])/u';
    $misalignedCharactersPattern = ['/((\s)(\s))/u', '/\s*([,.?!;:])/u', '/([,.?!;:])(\w)/u'];
    $replacementPattern = ['', '$1', '$1 $2'];

    $sentences = preg_split($sentenceDividingPattern, $text, flags: PREG_SPLIT_NO_EMPTY);
    $sentencesAligned = array_map(static function ($val) use ($misalignedCharactersPattern, $replacementPattern) {
        return preg_replace($misalignedCharactersPattern, $replacementPattern, $val);
    },
        $sentences);
    $sentencesAlignedFirstLetterUppercase = array_map('makeFirstLetterUppercase', $sentencesAligned);

    return implode(' ', $sentencesAlignedFirstLetterUppercase);
}

echo fixText($text) . PHP_EOL;
echo fixText($text1) . PHP_EOL;
echo fixText($text2) . PHP_EOL;
echo fixText($text3) . PHP_EOL;