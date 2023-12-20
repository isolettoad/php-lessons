<?php

$text = "Кажется, нас обнаружили! Надо срочно уходить отсюда, пока не поздно. Бежим же скорее!";
// Другие варианты для тестов
// $text = "Ну, прости меня! Не хотела я тебе зла сделать; да в себе не вольна была. Что говорила, что делала, себя не помнила.";
// $text = "Идет гражданская война. Космические корабли повстанцев, наносящие удар с тайной базы, одержали первую победу, в схватке со зловещей Галактической Империей.";

function test($text):void
{
    $lowercaseText = mb_strtolower($text);
    $sentences = preg_split('/([.?!;] )+/', $lowercaseText, 0, PREG_SPLIT_NO_EMPTY);
    foreach ($sentences as &$sentence)
    {
        $sentence = explode(' ', $sentence);
        $sentence = array_reverse($sentence);
        foreach ($sentence as &$word)
        {
            $word = trim($word, ',');
        }
        unset($word);
    }
    unset($sentence);

    var_dump($sentences);
}

/* Делает первую букву предложения заглавной */
function makeFirstletterUppercase(string $text):string
{
    /* Сделай сам */
}
function makeYodaStyleText(string $text)
{
    $result = '';
}

test($text);
$yodaText = makeYodaStyleText($text);
echo "Йода говорит: {$yodaText}\n";
