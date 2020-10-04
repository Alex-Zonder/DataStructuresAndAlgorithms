<?php
namespace Algorithms\Sort;

/**
 * Сортировка вставками
 * 
 * Сложность	Наилучший случай	В среднем	Наихудший случай
 * Время	    O(n)	            O(n^2)	    O(n^2)
 * Память	    O(1)    	        O(1)    	O(1)
 */


class InsertSort implements SortInterface
{
    /**
     * Сортировка одномерного массива чисел
     */
    public function sort(array $items, string $statement = "<"): array {
        for ($i = 1; $i < count($items); $i++) {
            if (($statement == "<" && $items[$i - 1] > $items[$i])
                || ($statement == ">" && $items[$i - 1] < $items[$i]))
            {
                for ($c = 0; $c < $i; $c++) {
                    if (($statement == "<" && $items[$i] < $items[$c])
                        || ($statement == ">" && $items[$i] > $items[$c]))
                    {
                        array_splice($items, $c, 0, [$items[$i]]);
                        array_splice($items, $i + 1, 1);
                        break;
                    }
                }
            }
        }

        return $items;
    }

    /**
     * Сортировка ассоциативного массива по ключу
     */
    public function sortByKey(array $items, string $key, string $statement = "<"): array {
        for ($i = 1; $i < count($items); $i++) {
            if (($statement == "<" && $items[$i - 1][$key] > $items[$i][$key])
                || ($statement == ">" && $items[$i - 1][$key] < $items[$i][$key]))
            {
                for ($c = 0; $c < $i; $c++) {
                    if (($statement == "<" && $items[$i][$key] < $items[$c][$key])
                        || ($statement == ">" && $items[$i][$key] > $items[$c][$key]))
                    {
                        array_splice($items, $c, 0, [$items[$i]]);
                        array_splice($items, $i + 1, 1);
                        break;
                    }
                }
            }
        }

        return $items;
    }
}
