<?php

function calculateCredit($creditBalance, $creditRate, $servicePayment, $monthlyPayment)
{
    $paymentTotal = 0;
    for($month = 1; $month <= 20; $month ++)
    {
        $creditBalance = $creditBalance * $creditRate + $servicePayment;

        if($creditBalance > $monthlyPayment)
        {
            $creditBalance = $creditBalance - $monthlyPayment;
            $paymentTotal = $paymentTotal + $monthlyPayment;
        }
        else
        {
            $paymentTotal = $paymentTotal + $creditBalance;
            return $paymentTotal;
        }
    }
}

echo 'HomoCredit: ' . calculateCredit(40000, 1.04, 500, 5000) . "\n";
echo 'SoftBank: ' . calculateCredit(40000, 1.03, 1000, 5000) . "\n";
echo 'StrawberryBank: ' . calculateCredit(47777, 1.02, 0, 5000) . "\n";


