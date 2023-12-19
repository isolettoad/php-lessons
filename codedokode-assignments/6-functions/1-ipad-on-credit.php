<?php

function getTotalCreditPayment(int $creditedAmount, float $rate, int $monthlyServicePayment, int $monthlyPayment): float
{
    $remainingCreditAmount = (float)$creditedAmount;
    $creditDurationInMonths = 20;
    $totalPayedAmount = 0.0;

    while ($creditDurationInMonths) {
        $remainingCreditAmount = $remainingCreditAmount * $rate + $monthlyServicePayment;

        if ($monthlyPayment >= $remainingCreditAmount) {
            $monthlyPayment = $remainingCreditAmount;
        }

        $remainingCreditAmount -= $monthlyPayment;
        $totalPayedAmount += $monthlyPayment;

        if (0.0 === $remainingCreditAmount) {
            break;
        }

        $creditDurationInMonths--;
    }

    return $totalPayedAmount;
}

echo 'HomoCredit: ' . getTotalCreditPayment(40000, 1.04, 500, 5000) . "\n";
echo 'SoftBank: ' . getTotalCreditPayment(40000, 1.03, 1000, 5000) . "\n";
echo 'StrawberryBank: ' . getTotalCreditPayment(47777, 1.02, 0, 5000) . "\n";


