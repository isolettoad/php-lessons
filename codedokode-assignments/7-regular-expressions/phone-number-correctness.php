<?php

// Правильные:
$correctNumbers = [
    '84951234567',
    '+74951234567',
    '8-495-1-234-567',
    ' 8 (8122) 56-56-56',
    '8-911-1234567',
    '8 (911) 12 345 67',
    '8-911 12 345 67',
    '8 (911) - 123 - 45 - 67',
    '+ 7 999 123 4567',
    '8 ( 999 ) 1234567',
    '8 999 123 4567'
];

// Неправильные:
$incorrectNumbers = [
    '02',
    '84951234567 позвать люсю',
    '849512345',
    '849512345678',
    '8 (409) 123-123-123',
    '7900123467',
    '5005005001',
    '8888-8888-88',
    '84951a234567',
    '8495123456a',
    '+1 234 5678901', /* неверный код страны */
    '+8 234 5678901', /* либо 8 либо +7 */
    '7 234 5678901' /* нет + */
];

$CorrectNumberPattern = '/^([\- ]?(8|\+[\- ]?7)[\- \(\)]*)(\(?\d\)*[\- \(\)]*){10}$/';

function checkPhoneNumberArrayAndPrintResult(array $arrayOfNumbers, $numberPattern): void
{
    printPhoneNumbersCheckResults($arrayOfNumbers, getCorrectPhoneNumberArray($numberPattern, $arrayOfNumbers));
}

function printPhoneNumbersCheckResults(array $unmodifiedNumbersArray, array $correctNumbersArray): void
{
    $incorrectNumbersArray = array_diff($unmodifiedNumbersArray, $correctNumbersArray);

    $amountOfNumbers = count($unmodifiedNumbersArray);
    $amountOfCorrectNumbers = count($correctNumbersArray);

    $correctNumbersString = implode(PHP_EOL, $correctNumbersArray);
    $incorrectNumbersString = implode(PHP_EOL, $incorrectNumbersArray);

    echo 'Найдено ' . $amountOfCorrectNumbers . ' из ' . $amountOfNumbers . ' номеров соответствующим правилам' . PHP_EOL . 'Правильные номера:' . PHP_EOL . $correctNumbersString . PHP_EOL . 'неправильные номера:' . PHP_EOL . $incorrectNumbersString . PHP_EOL . '---------' . PHP_EOL;
}

/**
 * @throws Exception
 */
function getCorrectPhoneNumberArray(string $NumberPattern, array $numbersArray): array
{
    $uniqueNumbers = array_unique($numbersArray);
    $correctNumbersArray = preg_grep($NumberPattern, $uniqueNumbers);

    if (PREG_NO_ERROR !== preg_last_error()) {
        throw new Exception(preg_last_error_msg());
    }

    return $correctNumbersArray;
}

checkPhoneNumberArrayAndPrintResult($correctNumbers, $CorrectNumberPattern);
checkPhoneNumberArrayAndPrintResult($incorrectNumbers, $CorrectNumberPattern);