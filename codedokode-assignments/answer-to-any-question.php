<?php

$answers = [
    1 => 'да',
    2 => 'нет',
    3 => 'не знаю',
    4 => 'никогда',
    5 => 'это зависит от тебя',
    6 => 'спроси анона'
];

$question = 'Выучу ли я PHP?';
$random = rand(1, 6);
$answer = $answers[$random];

echo 'Вопрос: ' . $question . "\n";
echo 'Ответ: ' . $answer . "\n";