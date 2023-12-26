<?php

function isLeap(int $year): bool
{
    return $year % 4 === 0 || $year % 400 === 0;
}

var_dump(isLeap(2024));

