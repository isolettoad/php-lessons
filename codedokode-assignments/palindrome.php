<?php
mb_internal_encoding('utf8');

$text = "А роза упала на лапу азора";
$text = mb_strtolower($text);
$text = str_replace(" ","", $text);

$lenght = mb_strlen($text);
$halfLenght = floor($lenght / 2);
$partOne = '';
$partTwo = '';

for ($i = 0; $i <= $halfLenght; $i++){
    $a = mb_substr($text, $i,1);
    $partone .= $a;
    }

for ($y=$lenght;$y >= $halfLenght; $y--){
    $b = mb_substr($text, $y, 1);
    $parttwo .= $b;
    }

if ($partOne == $partTwo){
    echo("Это палиндром ");
}
else{
    echo("Это не палиндром ");
}