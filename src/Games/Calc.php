<?php

use function cli\line;
use function cli\prompt;

function Calc() {
    $countIteration = 3;
    $flag = true;
    $name = hello();
    line('What is the result of the expression?');

    while($flag && $countIteration > 0) {
        $firstNum = mt_rand(1, 100);
	$secondNum = mt_rand(1, 100);
	$symbols = ['+', '-', '*'];
	$randSymbol = mt_rand(0, 2);
        $answer = prompt("Question: {$firstNum} {$symbols[$randSymbol]} {$secondNum}");
        line("Your answer: %s", $answer);

        iterationCalc($firstNum, $secondNum, $randSymbol, $name, $answer, $flag);

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

function iterationCalc(&$firstNum, &$secondNum, &$randSymbol, &$name, &$answer, &$flag) {

    switch ($randSymbol) {
        case 0:
            $correctAnswer = $firstNum + $secondNum;
            break;
        case 1:
            $correctAnswer = $firstNum - $secondNum;
            break;
        case 2:
            $correctAnswer = $firstNum * $secondNum;
            break;
        default:
            throw new Exception('Invalid operator index');
    }


    if ((int)$answer === (int)$correctAnswer) {
        return;
    } else {
        line("'{$answer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
        $flag = false;
    }
}
