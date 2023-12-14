<?php

$carPlate = 'С389УВ';
$postCode = 'AL5 5ND';


function carPlateCorrectnessCheck(string $isCarPlate):int
{
    $correctPlateRuleregEx = '#^[а-я][0-9]{3}[а-я]{2}$#ui';
    return  preg_match($correctPlateRuleregEx, $isCarPlate);
}

function checkIsCarNumberAndPrint(string $NumberSequence):void
{
    if (carPlateCorrectnessCheck($NumberSequence))
    {
        echo 'номер ' . $NumberSequence . ' имеет корректную форму' . PHP_EOL;
    }
    else
    {
        echo 'номер ' . $NumberSequence . ' не распознан или не имеет корректной формы' . PHP_EOL;
    }
}

checkIsCarNumberAndPrint($carPlate);
checkIsCarNumberAndPrint($postCode);