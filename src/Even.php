<?php

use function cli\line;
use function cli\prompt;

function isEven() {
    $countIteration = 3;
    $flag = true;
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, {$name}");
    line('Answer "yes" if the number is even, otherwise answer "no".');

    while($flag && $countIteration > 0) {
	$randomNum = mt_rand(1, 100);
	$answer = prompt("Question {$randomNum}");
	line("Your answer: %s", $answer);

	iteration($randomNum, $name, $answer, $flag);

	if ($flag) {
            line("Correct!");
            $countIteration--;
        } else {
            break;
        }
    }

    if ($flag) {
        line("Congratulations, {$name}!");
    } else {
        line("Let's try again, {$name}!");
    }
}

function iteration(&$randomNum, &$name, &$answer, &$flag) {
    if (($answer === 'yes' && $randomNum % 2 === 0) || ($answer === 'no' && $randomNum % 2 !== 0)) {
        return;
    } else {
        if ($randomNum % 2 === 0) {
            line("'{$answer}' is wrong answer ;(. Correct answer was 'yes'.");
        } else {
            line("'{$answer}' is wrong answer ;(. Correct answer was 'no'.");
        }
        $flag = false;
    }
}
