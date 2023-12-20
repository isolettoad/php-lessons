<?php

$text = 'Жызнь это координально но сдесь ею места нет,но:как зделал бох так она и зделана';

$rules = [
    '(\:)([\S])',
    '(\,)([\S])',
    '(\.)([\S])',
    '(\!)([\S])',
    '(\?)([\S])',
    'бох',
    'жы',
    'шы',
    'координально',
    'зделал',
    'зделаю',
    'зделан',
    'сдесь',
    '([^,])\sа\s',
    '([^,])\sно\s',
];

$corrections = [
    '$1 $2',
    '$1 $2',
    '$1 $2',
    '$1 $2',
    '$1 $2',
    'Б-г',
    'жи',
    'ши',
    'кардинально',
    'сделал',
    'сделаю',
    'сделан',
    'здесь',
    '$1, а ',
    '$1, но ',
];

function fixErrorsInText(array $rules, array $corrections, string $text): string
{
    $patterns = [];
    foreach ($rules as $rule) {
        $patterns[] = '/' . $rule . '/iu';
    }

    return (string)preg_replace($patterns, $corrections, $text);
}

function findErrorsInText(array $rules, string $text): array
{
    $groupName = 'errors';
    $errors = [];
    $pattern = '/(?<' . $groupName . '>' . implode('|', $rules) . ')/iu';
    preg_match_all($pattern, $text, $errors);
    return $errors[$groupName];
}

function displayErrors(array $errors): void
{
    foreach ($errors as $error) {
        $errorText = $error;
        echo 'В тексте найдена ошибка, кусок текста содержащий ошибку: ' . $errorText . PHP_EOL;
    }
}

displayErrors(findErrorsInText($rules, $text));
echo fixErrorsInText($rules, $corrections, $text);