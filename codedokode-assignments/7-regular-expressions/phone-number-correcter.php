<?php

$correctNumber = '8-911 12 345 67';
$incorrectNumber = '+8 234 5678901';

/**
 * @throws Exception
 */

function printCheckedPhoneNumber(
    array $phoneNumber
): void {
    $isCorrect = array_values($phoneNumber);
    $phoneNumberToPrint = (string)array_key_first($phoneNumber);
    if ($isCorrect[0]) {
        echo 'строка ' . $phoneNumberToPrint . ' содержит в себе правильный номер телефона' . PHP_EOL;
    } else {
        echo 'строка ' . $phoneNumberToPrint . ' не содержит в себе правильный номер телефона' . PHP_EOL;
    }
}

function checkPhoneNumber(
    string $phoneNumber,
    $numberPattern = '/^8(\d){10}$/',
): array {
    $isCorrect = (bool)preg_match($numberPattern, $phoneNumber);

    if (PREG_NO_ERROR !== preg_last_error()) {
        throw new Exception(preg_last_error_msg());
    }

    $checkedNumber = [];

    if ($isCorrect) {
        $checkedNumber[$phoneNumber] = $isCorrect;
    } else {
        $checkedNumber[$phoneNumber] = $isCorrect;
    }
    return $checkedNumber;
}

function formatPhoneNumber(string $phoneNumber): string
{
    $ruleFormatTo = '/^(\+|[\- ]?7)|[\- ()]/';
    $phoneNumber = preg_replace($ruleFormatTo, '', $phoneNumber);

    return $phoneNumber;
}

printCheckedPhoneNumber(checkPhoneNumber(formatPhoneNumber($correctNumber)));
printCheckedPhoneNumber(checkPhoneNumber(formatPhoneNumber($incorrectNumber)));