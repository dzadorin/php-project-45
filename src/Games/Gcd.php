<?php

use function cli\line;
use function cli\prompt;

function gcd() {
    $countIteration = 3;
    $flag = true;
    $name = hello();
    line('Find the greatest common divisor of given numbers.');

    while($flag && $countIteration > 0) {
        $randomNumOne = mt_rand(1, 100);
        $randomNumTwo = mt_rand(1, 100);
        $answer = prompt("Question: {$randomNumOne} {$randomNumTwo}");
        line("Your answer: %s", $answer);

        gcdIteration($randomNumOne, $randomNumTwo, $name, $answer, $flag);

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

function gcdIteration(&$randomNumOne, &$randomNumTwo, &$name, &$answer, &$flag) {
    $a = $randomNumOne;
    $b = $randomNumTwo;

    while ($b != 0) {
        $temp = $b;
        $b = $a % $b;
        $a = $temp;
    }

    if ((int)$answer === (int)$a) {
        return;
    } else {
        line("'{$answer}' is wrong answer ;(. Correct answer was '{$a}'.");
        $flag = false;
    }
}
