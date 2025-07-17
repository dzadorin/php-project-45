<?php

use function cli\line;
use function cli\prompt;

function prime()
{
    $countIteration = 3;
    $flag = true;
    $name = hello();
    line('Answer "yes" if given number is prime. Otherwise answer "no".');

    while ($flag && $countIteration > 0) {
        $randomNum = mt_rand(1, 100);
        $answer = prompt("Question: {$randomNum}");
        line("Your answer: %s", $answer);

        primeIteration($randomNum, $name, $answer, $flag);

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

function primeIteration(&$randomNum, &$name, &$answer, &$flag)
{
    if ($answer === 'yes' && isPrime($randomNum) === true || $answer === 'no' && isPrime($randomNum) === false) {
        return;
    } else {
        if (isPrime($randomNum) === true) {
            line("'{$answer}' is wrong answer ;(. Correct answer was 'yes'.");
        } elseif (isPrime($randomNum) === false) {
            line("'{$answer}' is wrong answer ;(. Correct answer was 'no'.");
        }
        $flag = false;
    }
}

function isPrime($num)
{
    if ($num < 2) {
        return false;
    }

    if ($num == 2) {
        return true;
    }

    if ($num % 2 == 0) {
        return false;
    }

    $sqrtNum = sqrt($num);
    for ($i = 3; $i <= $sqrtNum; $i += 2) {
        if ($num % $i == 0) {
            return false;
        }
    }
    return true;
}
