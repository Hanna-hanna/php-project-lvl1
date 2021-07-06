<?php

namespace Brain\Prime\Isprime;

use function cli\line;
use function cli\prompt;

function isPrime()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, {$name}!");
    line('Answer "yes" if given number is prime. Otherwise answer "no"');
    for ($i = 0; $i < 3; $i++) {
        $randomNumber = mt_rand(1, 100);
        $dividers = 0;
        for ($j = 1; $j <= $randomNumber; $j++) {
            $randomNumber % $j === 0 ? $dividers++ : $dividers;
        }
        $isPrime = ($dividers == 2) ? 'yes' : 'no';
        line('Question: ' . $randomNumber);
        $answer = prompt('Your answer');
        if ($answer == $isPrime) {
            line('Correct!');
            continue;
        } else {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$isPrime}'");
            return line("Let's try again, {$name}!");
        }
    }
    return line('Congratulations, ' . $name);
}
