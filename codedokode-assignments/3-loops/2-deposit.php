<?php

$initialMoney = 10000;
$interestRate = 1.10;
$yearsPassed = 0;
$investorAge = 16;

while ($initialMoney <= 1000000) {
    $initialMoney *= $interestRate;
    $yearsPassed += 1;
    $investorAge += 1;
};


echo 'Счёт вклада достигнет миллиона за ' . $yearsPassed . ' лет, вкладчику будет ' . $investorAge . ' лет' . PHP_EOL;