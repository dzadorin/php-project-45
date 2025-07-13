<?php

use function cli\line;
use function cli\prompt;

function isEven() {
    $countIteration = 1;
    $flag = true;
    $randomNum = mt_rand(1, 100);
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('Answer "yes" if the number is even, otherwise answer "no".');
    $answer = prompt("Question {$randomNum}");

    while($flag && $countIteration >= 0) {
        iteration($randomNum, $name, $answer, $flag);
        $countIteration--;

	if ($flag && $countIteration === 0) {
            line("Configuration, {$name}!");
    	}
    }

}

function iteration(&$randomNum, &$name, &$answer, &$flag) {
    if ($answer === 'yes' && $randomNum % 2 === 0 || $answer === 'no' && $randomNum % 2 !== 0) {
        line("Your answer: %s", $answer);
	line("Correct!");
        $randomNum = mt_rand(1, 100);
        $answer = prompt("Question {$randomNum}");
    }

    else {
        if($randomNum % 2 === 0) {
            line("'{$answer}' is wrong answer ;(. Correct answer was 'yes'. \nLet's try again, {$name}!");
        } else {
            line("'{$answer}' is wrong answer ;(. Correct answer was 'no'. \nLet's try again, {$name}!");
        }
        $flag = false;
    }
}
