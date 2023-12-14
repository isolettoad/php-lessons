<?php

$carPlate = 'С389УВ';
$postCode = 'AL5 5ND';


/**
 * @throws Exception
 */
function isCarPlateCorrect(string $carPlate): bool
{
    $carPlatePattern = '#^[а-я][0-9]{3}[а-я]{2}$#ui';
    $result = (bool)preg_match($carPlatePattern, $carPlate);

    if(PREG_NO_ERROR !== preg_last_error())
    {
        throw new Exception(preg_last_error_msg());
    }

    return $result;
}

function printCarNumber(string $carNumber, bool $isCarNumberPatternValid): void
{
    if ($isCarNumberPatternValid) {
        echo 'номер ' . $carNumber . ' имеет корректную форму' . PHP_EOL;
    } else {
        echo 'номер ' . $carNumber . ' не распознан или не имеет корректной формы' . PHP_EOL;
    }
}

printCarNumber($carPlate, isCarPlateCorrect($carPlate));
printCarNumber($postCode, isCarPlateCorrect($postCode));