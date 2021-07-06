<?php

namespace Brain\Even\Gcd;

use function cli\line;
use function cli\prompt;

function gcd()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, {$name}!");
    line('Find the greatest common divisor of given numbers');
    for ($i = 0; $i < 3; $i++) {
        $num1 = mt_rand(1, 100);
        $num2 = mt_rand(1, 100);
        if ($num1 > $num2) {
            $numBigger = $num1;
            $numSmaller = $num2;
        } else {
            $numBigger = $num2;
            $numSmaller = $num1;
        }
        $result = 1;
        for ($j = 0; $j <= $numBigger; $j++) {
            $result = $numBigger % $numSmaller;
            if ($result == 0) {
                $result = $numSmaller;
                break;
            } elseif ($result < $numSmaller) {
                $numBigger = $numSmaller;
                $numSmaller = $result;
            } elseif ($result > $numSmaller) {
                $numBigger = $result;
            }
        }
        line('Question: ' . $num1 . ' ' . $num2);
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
