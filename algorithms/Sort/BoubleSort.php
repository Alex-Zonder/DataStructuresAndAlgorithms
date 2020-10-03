<?php
namespace Algorithms\Sort;

/*
 * Сортировка пузырьком
 * 
 * Сложность	Наилучший случай	В среднем	Наихудший случай
 * Время	    O(n)	            O(n^2)	    O(n^2)
 * Память	    O(1)    	        O(1)    	O(1)
 */


class BoubleSort implements SortInterface {
    // Сортировка одномерного массива чисел
    public function sort(array $items, string $statement = "<"): array {
        $swapped = false;
        do {
            $swapped = false;
            for ($i = 1; $i < count($items); $i++) {
                if (($statement == "<" && $items[$i] < $items[$i - 1])
                    || ($statement == ">" && $items[$i] > $items[$i - 1]))
                {
                    list($items[$i], $items[$i - 1]) = array($items[$i - 1], $items[$i]);
                    $swapped = true;
                }
            }
        } while($swapped !== false);
        return $items;
    }
    // Сортировка item'ов по ключу
    public function sortByKey(array $items, string $key, string $statement = "<"): array {
        $swapped = false;
        do {
            $swapped = false;
            for ($i = 1; $i < count($items); $i++) {
                if (($statement == "<" && $items[$i][$key] < $items[$i - 1][$key])
                    || ($statement == ">" && $items[$i][$key] > $items[$i - 1][$key]))
                {
                    list($items[$i], $items[$i - 1]) = [$items[$i - 1], $items[$i]];
                    $swapped = true;
                }
            }
        } while($swapped !== false);
        return $items;
    }
}