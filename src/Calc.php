<?php

namespace Brain\Even\Calc;

use function cli\line;
use function cli\prompt;

function calc()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, {$name}!");
    line('What is the result of the expression?');
    for ($i = 0; $i < 3; $i++) {
        $randomNumber1 = mt_rand(0, 10);
        $randomNumber2 = mt_rand(0, 10);
        $operations = ['-', '+', '*'];
        $randomOperation = $operations[array_rand($operations)];
        $expression = $randomNumber1 . ' ' . $randomOperation . ' ' . $randomNumber2;
        switch ($randomOperation) {
            case '-':
                $result = $randomNumber1 - $randomNumber2;
                break;
            case '+':
                $result = $randomNumber1 + $randomNumber2;
                break;
            case '*':
                $result = $randomNumber1 * $randomNumber2;
                break;
        }
        line('Question: ' . $expression);
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
