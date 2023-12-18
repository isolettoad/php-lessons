<?php

$text = 'Ты дурак, ты ДуРак, ты дypak, ты д у р а к';

function replaceWordFool(string $text): string
{
    $rule = '/д( *)(у|y)( *)(р|p)( *)(а|a)( *)(к|k)/ui';
    $replaceTo = 'нехороший человек';

    $correctedText = preg_replace($rule, $replaceTo, $text);

    return $correctedText;
}

echo replaceWordFool($text);

