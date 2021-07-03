<?php

namespace Brain\Even\BrainEven;

use function cli\line;
use function cli\prompt;

function isEven()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, {$name}!");
    line('Answer "yes" if the number is even, otherwise answer "no"');
    for ($i = 0; $i < 3; $i++) {
        $randomNumber = mt_rand(0, 300);
        $isEven = $randomNumber % 2 == 0 ? 'yes' : 'no';
        line('Question: '. $randomNumber);
        $answer = prompt('Your answer');
        if ($answer == $isEven) {
            line('Correct!');
            continue;
        } else {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$isEven}'");
            return line("Let's try again, {$name}!");
        }
    }
    return line('Congratulations, ' . $name);
}
