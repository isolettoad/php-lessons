<?php

$letters = [
    'ко',
    'и',
    'дзу',
    'ми',
    'са',
    'ку',
    'ра',
    'да',
    'чи',
    'а',
    'ки',
    'ми',
    'на',
    'го',
    'ха',
    'ру'
];

$name = '';

for ($i =1; $i <= 4; $i++)
{
    $random = rand(0, count($letters));
    $randomText = $letters[$random];

    echo 'Выпало число' . $random . ', слог' . $randomText . "\n";

    $name .= $randomText;
}

echo '-------------' . "\n";
echo 'Советую имя: ' . $name . '- не прогадаешь!' . "\n";