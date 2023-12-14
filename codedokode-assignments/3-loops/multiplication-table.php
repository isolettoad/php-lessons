<?php

$randomNumber = rand(5,12);

echo 'Печатаю таблицу умножения чисел на самих себя от 1 до ' . $randomNumber . "\n";

for($i = 1; $i <= $randomNumber; $i++)
{
    $productOfSelf = $i * $i;
    echo  "$i" . '*' . "$i" . '=' . "$productOfSelf\n";
}