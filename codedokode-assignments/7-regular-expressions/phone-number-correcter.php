<?php

$correctNumber = '8-911 12 345 67';
$incorrectNumber = '+8 234 5678901';

$russianNumberPattern = '/^([\- ]?(8|\+[\- ]?7)[\- \(\)]*)(\(?\d\)*[\- \(\)]*){10}$/';

/**
 * @throws Exception
 */

function printFormattedPhoneNumber(
    string $phoneNumber,
    $numberPattern = '/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/'
): void {
    $isCorrect = checkPhoneNumberCorrectness($numberPattern, $phoneNumber);
    if ($isCorrect) {
        $formattedNumber = formatPhoneNumberToStringOfDigits($phoneNumber);

        echo $formattedNumber . PHP_EOL;
    } else {
        echo 'строка ' . $phoneNumber . ' не содержит в себе верный номер телефона' . PHP_EOL;
    }
}

function checkPhoneNumberCorrectness(string $numberPattern, string $phoneNumber): bool
{
    $isCorrect = preg_match($numberPattern, $phoneNumber);

    if (PREG_NO_ERROR !== preg_last_error()) {
        throw new Exception(preg_last_error_msg());
    }

    return $isCorrect;
}

function formatPhoneNumberToStringOfDigits(string $phoneNumber): string
{
    $formattedNumber = $phoneNumber;
    $areaCodeToReplace = '/^\+[\- ]?7/';
    $unnecessaryCharactersBetweenNumbers = '/[\- \(\)]/';
    $formattedNumber = preg_replace($areaCodeToReplace, '', $formattedNumber);
    $formattedNumber = preg_replace($unnecessaryCharactersBetweenNumbers, '', $formattedNumber);

    return $formattedNumber;
}

printFormattedPhoneNumber($correctNumber, $russianNumberPattern);
printFormattedPhoneNumber($incorrectNumber, $russianNumberPattern);