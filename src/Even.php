<?php

namespace BrainGames\Even;

require_once __DIR__ . '/../vendor/autoload.php';

use function cli\line;
use function cli\prompt;

line('Answer "yes" if the number is even, otherwise answer "no".');
$answer = prompt('Question 15');
line("Your answer: %s", $answer);

if ($answer === 'no') {
    line("Correct!");
    $answer = prompt('Question 6');
    line("Your answer: %s", $answer);

    if ($answer === 'yes') {
        line("Correct!");
        $answer = prompt('Question 7');
        line("Your answer: %s", $answer);

        if ($answer === 'no') {
            line("Correct!");
            line("Congratulations, {$name}!");
        } elseif ($answer === 'yes') {
            line("'yes' is wrong answer ;(. Correct answer was 'no'.\nLet's try again, {$name}'");
        } else {
            line("{$answer} is not correct!");
        }

    } elseif ($answer === 'no') {
        line("'no' is wrong answer ;(. Correct answer was 'yes'.\nLet's try again, {$name}'");
    } else {
        line("{$answer} is not correct!");
    }
}


elseif ($answer === 'yes') {
    line("'yes' is wrong answer ;(. Correct answer was 'no'.\nLet's try again, {$name}'");
}


else {
    line("{$answer} is not correct!");
}
