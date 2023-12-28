<?php

$creditBalance = 40000;
$creditRate = 1.03;
$servicePayment = 1000;
$monthlyPayment = 5000;
$paymentTotal = 0;

for ($month = 1; $month <= 20; $month++) {
    $creditBalance = $creditBalance * $creditRate + $servicePayment;

    if ($creditBalance > $monthlyPayment) {
        $creditBalance = $creditBalance - $monthlyPayment;
        $paymentTotal = $paymentTotal + $monthlyPayment;
    } else {
        $paymentTotal = $paymentTotal + $creditBalance;
        echo 'Ты выплатил кредит за ' . $month . 'месяцев, итоговая сумма составила ' . $paymentTotal . "\n";
        exit();
    }
}
