<?php

namespace Algorithms\Factorial;

/*
 * Вычисление факториала
 * 0, 1, 2, 3,  4,   5,   6,    7,     8,      9,      10, ..
 * 1, 1, 2, 6, 24, 120, 720, 5040, 40320, 362880, 3628800, ..
 */


 class Factorial {

    /*
     * Рекурсивная функция
     */
    public static function countRecursive(int $x): int {
        return 
            $x < 2
            ? 1
            : $x * self::countRecursive($x - 1);
    }

    /*
     * Функция с циклом
     */
    public static function countWhile(int $x): int {
        $result = 1;
        for ($y = 2; $y <= $x; $y++) {
            $result *= $y;
        } 
        return $result;
    }
}
