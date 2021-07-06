<?php

namespace Brain\Progression\Prog;

use function cli\line;
use function cli\prompt;

function prog()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, {$name}!");
    line('What number is missing in the progression?');
    for ($i = 0; $i < 3; $i++) {
        $arrayNumber = [];
        $randomNumber = mt_rand(1, 10);
        array_push($arrayNumber, $randomNumber);
        $randomStep = mt_rand(1, 10);
        for ($j = 0; $j <= 10; $j++) {
            $curr = $randomNumber + $randomStep;
            array_push($arrayNumber, $curr);
            $randomNumber = $curr;
        }
        $randomKey = array_rand($arrayNumber);
        $result = $arrayNumber[$randomKey];
        $arrayNumber[$randomKey] = '..';
        $numberRow = implode(' ', $arrayNumber);
        line('Question: ' . $numberRow);
        $answer = prompt('Your answer');
        if ($answer == $result) {
            line('Correct!');
            continue;
        } else {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$result}'");
            return line("Let's try again, {$name}!");
        }
    }
    return line('Congratulations, ' . $name);
}
