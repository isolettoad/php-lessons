<?php

$texts = [
    'Кажется, нас обнаружили! Надо срочно уходить отсюда, пока не поздно. Бежим же скорее!',
    'Ну, прости меня! Не хотела я тебе зла сделать; да в себе не вольна была. Что говорила, что делала, себя не помнила.',
    'Идет гражданская война. Космические корабли повстанцев, наносящие удар с тайной базы, одержали первую победу, в схватке со зловещей Галактической Империей.'
];


/* Делает первую букву предложения заглавной */
function makeFirstLetterUppercase(string $text): string
{
    return mb_strtoupper(mb_substr($text, 0, 1)) . mb_substr($text, 1);
}

function makeYodaStyleText(string $text): string
{
    $lowercaseText = mb_strtolower($text);
    $sentences = preg_split('/([.?!;] )+/', $lowercaseText, 0, PREG_SPLIT_NO_EMPTY);
    $reversedSentences = [];
    foreach ($sentences as $sentence) {
        $words = explode(' ', $sentence);
        $wordsWithoutPunctuation = array_map(static function ($word) {
            return trim($word, ',.?!');
        }, $words);
        $reversedWords = array_reverse($wordsWithoutPunctuation);
        $reversedSentences[] = implode(' ', $reversedWords);
    }

    $reversedSentencesPeriodAtEnd = array_map(static function ($sentence) {
        return $sentence . '.';
    },
        $reversedSentences);
    $reversedSentencesCapitalFirstLetter = array_map('makeFirstLetterUppercase', $reversedSentencesPeriodAtEnd);
    return implode(' ', $reversedSentencesCapitalFirstLetter);
}

foreach ($texts as $text) {
    echo makeYodaStyleText($text) . PHP_EOL;
}