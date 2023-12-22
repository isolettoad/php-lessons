<?php

function twoFer(string $name = 'you'): string
{
    $concatenatedString = 'one for ' . $name . ', one for me' . PHP_EOL;
    return $concatenatedString;
}

echo twoFer('Alice');
echo twoFer();

