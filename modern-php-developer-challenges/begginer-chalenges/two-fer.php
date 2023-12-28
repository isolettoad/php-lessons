<?php

function twoFer(string $name = 'you'): string
{
    return 'one for ' . $name . ', one for me' . PHP_EOL;
}

echo twoFer('Alice');
echo twoFer();

