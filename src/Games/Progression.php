<?php

use function cli\line;
use function cli\prompt;

function progression()
{
    $countIteration = 3;
    $flag = true;
    $name = hello();
    line('What number is missing in the progression?');

    while ($flag && $countIteration > 0) {
        $arrayAndResult = progressionExpression();
        $arr = $arrayAndResult[0];
        $result = $arrayAndResult[1];
        $expression = "";

        foreach ($arr as $elem) {
            $expression .= "{$elem} ";
        }

        $answer = prompt("Question: {$expression}");
        line("Your answer: %s", $answer);

        progressionIteration($result, $name, $answer, $flag);

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

function progressionIteration(&$result, &$name, &$answer, &$flag)
{
    if ((int)$answer === (int)$result) {
        return;
    } else {
        line("'{$answer}' is wrong answer ;(. Correct answer was '{$result}'.");
        $flag = false;
    }
}

function progressionExpression()
{
    $start = mt_rand(1, 10);
    $step = mt_rand(2, 5);
    $length = mt_rand(5, 10);
    $hideElementIndex = floor($length / 2);

    $result = [];

    for ($i = 0; $i < $length; $i++) {
        $result[] = $start + ($step * $i);
    }

    $result[$hideElementIndex] = '..';

    $hideElement = $start + $hideElementIndex * $step;

    return [$result, $hideElement];
}
