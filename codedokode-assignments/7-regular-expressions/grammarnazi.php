<?php

$text = 'Жызнь это координально но сдесь ею места нет,но:как зделал бох так она и зделана';

$missingspaces = '/(, )(. )(! )(; )(\? )(: )/gmu';
$zhishi = '/(жы)(шы)/gmu';
$commonmisspeling = '/(координально)(сдесь)(зделал)(зделаю)(зделан)/gmu';
$tochkazapyatay = '/((\.|,) а)((\.|,) но)/gmu';

function findMisspelling(string $rules, $text):string
{
    $errors = [];
    preg_match_all($rules, $text, $errors);

    return $errors[0];
}