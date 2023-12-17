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

/**
 * @param array<string,bool> $numbers
 */
function printCheckedPhoneNumbers(array $numbers): void
{
    foreach ($numbers as $number => $isValid) {
        $numberToPrint = $number;

        if ($isValid) {
            $numberToPrint .= ' - правильный';
        } else {
            $numberToPrint .= ' - неправильный';
        }

        $numberToPrint .= PHP_EOL;

        echo $numberToPrint;
    }
}

function checkPhoneNumbers(array $numbers): array
{
    $numberPattern = '/^([\- ]?(8|\+[\- ]?7)[\- ()]*)(\(?\d\)*[\- ()]*){10}$/';
    $checkedNumbers = [];

    $correctNumbers = pregGrep($numberPattern, $numbers);

    foreach ($numbers as $number) {
        $isNumberCorrect = false;
        if (in_array($number, $correctNumbers, true)) {
            $isNumberCorrect = true;
        }

        $checkedNumbers[$number] = $isNumberCorrect;
    }

    return $checkedNumbers;
}
function pregGrep(string $pattern, array $values): array
{
    $result = preg_grep($pattern, $values);

    if (PREG_NO_ERROR !== preg_last_error()) {
        throw new RuntimeException(preg_last_error_msg());
    }

    return $result;
}

printCheckedPhoneNumbers(checkPhoneNumbers($correctNumbers));
printCheckedPhoneNumbers(checkPhoneNumbers($incorrectNumbers));