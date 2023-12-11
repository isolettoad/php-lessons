<?php

$anonDice1 = rand(1, 6);
$anonDice2 = rand(1, 6);

$compDice1 = rand(1, 6);
$compDice2 = rand(1, 6);

echo "У тебя выпало $anonDice1 и $anonDice2 \nУ компьютера $compDice1 и $compDice2\n";

$anonSum = $anonDice1 + $anonDice2;
$compSum = $compDice1 + $compDice2;

if (($anonDice1 == $anonDice2) && ($compDice1 == $compDice2))
{
    echo "Выпало два дабла - запости скриншот в тред\n Победила дружба";
    exit();
}

if ($anonSum > $compSum)
{
    echo "Ты победил\n";
    exit();
}
elseif ($anonSum < $compSum)
{
    echo "Победил компьютер\n";
    exit();
}
elseif ($anonSum == $compSum)
{
    echo "Победила дружба\n";
    exit();
}

