<?php

namespace BrainGames\even;

include 'Cli.php';

use function cli\line;
use function cli\prompt;

line("Answer \"yes\" if the number is even, otherwise answer \"no\".");
$response_user = prompt("Question: 15");
if ($response_user === 'no') {
    line("Correct");
    $response_user = prompt("Question: 6");

    if ($response_user === 'yes') {
        line("Correct");
        $response_user = prompt("Question: 7");
    } else {
        line("'no' is wrong answer ;(. Correct answer was 'yes'.");
        line("Let's try again, %s!", $name);
        exit();
    }

    if ($response_user === 'no') {
        line("Correct");
        line("Congratulations, %s!", $name);
    } else {
        line("'yes' is wrong answer ;(. Correct answer was 'no'.");
        line("Let's try again, %s!", $name);
        exit();
    }

} else {
    line("'yes' is wrong answer ;(. Correct answer was 'no'.");
    line("Let's try again, %s!", $name);
    exit();
}
