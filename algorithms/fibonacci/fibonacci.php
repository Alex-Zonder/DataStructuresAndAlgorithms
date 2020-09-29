<?php
/*
 * Числа Фибоначи
 * 0, 1, 2, 3, 4, 5, 6,  7,  8,  9, 10, ..
 * 0, 1, 1, 2, 3, 5, 8, 13, 21, 34, 55, ..
 */


 class Fibonacci {

    /*
     * Рекурсивная функция
     */
    protected $fibArr = [0, 1];
    static public function countRecursive($x) {
        if ($x < 0) return -1;
        if ($x < 2) return $x;
        $fibArr[$x] = $x + Fibonacci::countRecursive($x - 1);

        return $fibArr[$x];
    }

    /*
     * Функция с циклом
     */
    static public function countWhile($x) {
        if ($x < 0) return -1;
        $result = [0, 1];
        for ($y = 2; $y <= $x; $y++) {
            $result[] = $result[$y - 1] + $result[$y - 2];
        } 
        return $result[count($result) - 1];
    }
}

echo "Recursive:\t".Fibonacci::countRecursive(5)."\n";
echo "While:\t\t".Fibonacci::countWhile(5)."\n";
