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
    public static function countRecursive(int $x): int {
        if ($x < 2) return $x;

        return self::countRecursive($x - 1) + self::countRecursive($x - 2);
    }

    /*
     * Рекурсивная функция с мемоизацией
     */
    public static $fibMemo = [];
    public static function countRecursiveMemo(int $x): int {
        if (isset(self::$fibMemo[$x])) return self::$fibMemo[$x];

        if ($x < 2) return $x;

        self::$fibMemo[$x] = self::countRecursiveMemo($x - 1) + self::countRecursiveMemo($x - 2);
 
        return self::$fibMemo[$x];
    }

    /*
     * Функция с циклом
     */
    public static function countWhile(int $x): int {
        $result = [0, 1];
        for ($y = 2; $y <= $x; $y++)
            $result[$y] = $result[$y - 1] + $result[$y - 2];

        return $result[$x];
    }
}



echo "Recursive:\t".Fibonacci::countRecursive(40)."\n";
echo "RecursiveMemo:\t".Fibonacci::countRecursiveMemo(40)."\n";
echo "While:\t\t".Fibonacci::countWhile(40)."\n";
