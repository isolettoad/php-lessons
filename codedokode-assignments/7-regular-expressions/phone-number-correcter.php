<?php

$correctNumber = '8-911 12 345 67';
$incorrectNumber = '+8 234 5678901';

$russianNumberPattern = '/^([\- ]?(8|\+[\- ]?7)[\- \(\)]*)(\(?\d\)*[\- \(\)]*){10}$/';

/**
 * @throws Exception
 */

function printFormattedPhoneNumber(
    array $phoneNumber
): void {
    $IsCorrect = array_values($phoneNumber);
    $phoneNumberToPrint = (string)array_key_first($phoneNumber);
    if ($IsCorrect[0]) {
        echo 'строка ' . $phoneNumberToPrint . ' содержит в себе правильный номер телефона' . PHP_EOL;
    } else {
        echo 'строка ' . $phoneNumberToPrint . ' не содержит в себе правильный номер телефона' . PHP_EOL;
    }
}

function checkPhoneNumber(
    string $phoneNumber,
    $numberPattern = '/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/',
): array {
    $isCorrect = (bool)preg_match($numberPattern, $phoneNumber);

    if (PREG_NO_ERROR !== preg_last_error()) {
        throw new Exception(preg_last_error_msg());
    }

    $CheckedNumber = [];

    if ($isCorrect) {
        return $CheckedNumber[] = [$phoneNumber => true];
    } else {
        return $CheckedNumber[] = [$phoneNumber => false];
    }
}

function formatCheckedPhoneNumber(array $CheckedNumber): array
{
    $numberToFormat = array_key_first($CheckedNumber);
    $wasCorrect = array_values($CheckedNumber);
    $areaCodeToReplace = '/^\+[\- ]?7/';
    $unnecessaryCharactersBetweenNumbers = '/[\- ()]/';
    $numberToFormat = preg_replace($areaCodeToReplace, '', $numberToFormat);
    $numberToFormat = preg_replace($unnecessaryCharactersBetweenNumbers, '', $numberToFormat);
    $formattedCheckedNumber = [$numberToFormat => $wasCorrect];

    return $formattedCheckedNumber;
}

printFormattedPhoneNumber(formatCheckedPhoneNumber(checkPhoneNumber($correctNumber, $russianNumberPattern)));
printFormattedPhoneNumber(formatCheckedPhoneNumber(checkPhoneNumber($incorrectNumber, $russianNumberPattern)));