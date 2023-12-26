<?php

function slices(string $series, int $size): array
{
    $sizeOfSubject = strlen($series);
    if($size < 1 || $sizeOfSubject < $size)
    {
        return [];
    }

    $slices = [];
    $remainingToSlice = $sizeOfSubject + 1;
    $currentOffset = 0;
    while ($remainingToSlice > $size)
    {
        $slices[] = substr($series, $currentOffset, $size);
        --$remainingToSlice;
        ++$currentOffset;
    }

    return  $slices;
}

var_dump(slices('123456789', 4));