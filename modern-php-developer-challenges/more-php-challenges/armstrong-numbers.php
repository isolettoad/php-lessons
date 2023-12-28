<?php

function isArmstrongNumber(int $number): bool
{
    $digits = str_split((string)$number);

    $sumOfRaisedDigits = 0;
    foreach ($digits as $digit) {
        $sumOfRaisedDigits += (int)$digit ** count($digits);
    }

    return $number === $sumOfRaisedDigits;
}

var_dump(isArmstrongNumber(153));