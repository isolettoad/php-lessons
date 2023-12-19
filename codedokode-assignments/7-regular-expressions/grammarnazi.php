<?php

$text = 'Жызнь это координально но сдесь ею места нет,но:как зделал бох так она и зделана';

$rules = [];
$rules[0] = '/~(?<=\p{L}\p{P})(?=\p{L}|\d)~iu/gmu';
$rules[1] = '/жы/gmu';
$rules[2] = '/шы/gmu';
$rules[3] = '/координально/gmu';
$rules[4] = '(зделал)(зделаю)(зделан)/gmu';
$rules[5] = 'сдесь/gmu';
$rules[6] = '/((\.|,) а)((\.|,) но)/gmu';

$corrections = [];
$corrections[0] = ' ';
$corrections[1] = 'жи';
$corrections[2] = 'ши';
$corrections[3] = 'кординально';
$corrections[4] = '';
$corrections[5] = 'здесь';
$corrections[6] = '';

function findErrorsInText(string $rules, $text):array
{
    preg_match_all($rules, $text, $errors);

    return $errors[0];
}

function correctErrors($rules, $corrections, $text):void
{
    preg_replace($rules, $corrections, $text);
}

function displayErrors(array $errors):void
{

}