<?php

$text = 'o@outlook.com sadfsa @yandex.ru   kaft93x@com dcu@yandex.ru
19dn@outlook
pa5h@m  ail.ru
   281av0gmail.com
8edmfh@outlook.com
sfn13i@mail.ru
g0orc3x1@outlook.com
rv7bp@gmail.com';

function printEmails(array $emails): void
{
    echo 'Найденные адреса:' . PHP_EOL;

    foreach ($emails as $address) {
        echo $address . PHP_EOL;
    }
}

function findEmailsInText(string $text): array
{
    $emailPattern = '/([a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-Z0-9_-]+)/u';

    $emails = [];
    preg_match_all($emailPattern, $text, $emails);

    return $emails[0]; //preg_match_all передаёт многомерный массив с двумя дубликатами из за особенностей групп регекса
}

printEmails(findEmailsInText($text));