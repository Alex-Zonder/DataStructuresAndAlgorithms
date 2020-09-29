<?php
/*
 * Вычисление факториала
 * 0, 1, 2, 3,  4,   5,   6,    7,     8,      9,      10, ..
 * 1, 1, 2, 6, 24, 120, 720, 5040, 40320, 362880, 3628800, ..
 */


 class Factorial {

    /*
     * Рекурсивная функция
     */
    static public function countRecursive($x) {
        return 
            $x < 2
            ? 1
            : $x * Factorial::countRecursive($x - 1);
    }

    /*
     * Функция с циклом
     */
    static public function countWhile($x) {
        $result = 1;
        for ($y = 2; $y <= $x; $y++) {
            $result *= $y;
        } 
        return $result;
    }
}


echo "Recursive:\t".Factorial::countRecursive(-1)."\n";
echo "While:\t\t".Factorial::countWhile(-1)."\n";
