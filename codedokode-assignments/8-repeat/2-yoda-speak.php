<?php

$text = "Кажется, нас обнаружили! Надо срочно уходить отсюда, пока не поздно. Бежим же скорее!";
// Другие варианты для тестов
// $text = "Ну, прости меня! Не хотела я тебе зла сделать; да в себе не вольна была. Что говорила, что делала, себя не помнила.";
// $text = "Идет гражданская война. Космические корабли повстанцев, наносящие удар с тайной базы, одержали первую победу, в схватке со зловещей Галактической Империей.";

function test($text):void
{
    $lowercaseText = mb_strtolower($text);
    $sentences = preg_split('/([.?!;] )+/', $lowercaseText, 0, PREG_SPLIT_NO_EMPTY);
    $reversedSentences = [];
    foreach ($sentences as $sentence)
    {
        $words = explode(' ', $sentence);
        $reversedSentences = array_reverse($sentence);
        var_dump($reversedSentences);
        foreach ($words as &$word)
        {
            $word = trim($word, ',');
        }
        unset($word);
        $implodedSentence = implode(' ', $sentences);
    }
    unset($sentence);
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

