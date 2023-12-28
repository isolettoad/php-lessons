<?php

/**
 * @throws Exception
 */
function getNewName(): string
{
    $alphabet = range("A", "Z");
    $letterPartOfName = $alphabet[random_int(
            array_key_first($alphabet),
            array_key_last($alphabet)
        )] . $alphabet[random_int(array_key_first($alphabet), array_key_last($alphabet))];
    $digitPartOfName = (string)random_int(100, 999);

    return $letterPartOfName . $digitPartOfName;
}

echo getNewName();