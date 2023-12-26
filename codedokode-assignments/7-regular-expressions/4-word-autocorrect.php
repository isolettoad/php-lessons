<?php

$text = 'Ты дурак, ты ДуРак, ты дypak, ты д у р а к';

function replaceWordFool(string $text): string
{
    $rule = '/д( *)([уy])( *)([рp])( *)([аa])( *)([кk])/ui';
    $replaceTo = 'нехороший человек';

    return preg_replace($rule, $replaceTo, $text);
}

echo replaceWordFool($text);