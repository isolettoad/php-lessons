<?php

$text = "А роза упала на лапу азора";
$text = mb_strtolower($text);
$text = str_replace(" ","", $text);

$lenght = mb_strlen($text);
$halfLenght = floor($lenght / 2);
$partOne = mb_substr($text, 0,$halfLenght);
$partTwo = '';

for ($y=$lenght;$y > $halfLenght; $y--){
    $b = mb_substr($text, $y, 1);
    $partTwo .= $b;
}

if ($partOne == $partTwo){
    echo 'Это палиндром ';
}
else{
    echo 'Это не палиндром ';
}