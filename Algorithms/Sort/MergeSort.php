<?php
namespace Algorithms\Sort;

/**
 * Сортировка слиянием
 * 
 * Сложность	Наилучший случай	В среднем	Наихудший случай
 * Время	    O(n·log n)	        O(n·log n)	O(n·log n)
 * Память	    O(n)    	        O(n)    	O(n)
 */


class MergeSort implements SortInterface
{
    /**
     * Сортировка одномерного массива чисел
     */
    public function sort(array $items, string $statement = "<"): array {
        if (count($items) <= 1)
            return $items;

        // Разбиваем массив
        $leftSize = intval(count($items) / 2);
        $rightSize = count($items) - $leftSize;
        $left = array_slice($items, 0, $leftSize);
        $right = array_slice($items, $leftSize, $rightSize);
        
        // Сортируем
        $left = $this->sort($left, $statement);
        $right = $this->sort($right, $statement);
        
        // Собираем массив
        $leftIndex = 0;
        $rightIndex = 0;
        $itemsSize = count($left) + count($right);
        for ($i = 0; $i < $itemsSize; $i++) {
            if ($leftIndex >= count($left)) {
                $items[$i] = $right[$rightIndex++];
            }
            else if ($rightIndex >= count($right)) {
                $items[$i] = $left[$leftIndex++];
            }
            else if (($statement == "<" && $left[$leftIndex] < $right[$rightIndex])
                || ($statement == ">" && $left[$leftIndex] > $right[$rightIndex]))
            {
                $items[$i] = $left[$leftIndex++];
            }
            else {
                $items[$i] = $right[$rightIndex++];
            }
        }

        return $items;
    }

    /**
     * Сортировка ассоциативного массива по ключу
     */
    public function sortByKey(array $items, string $key, string $statement = "<"): array {
        if (count($items) <= 1)
            return $items;

        // Разбиваем массив
        $leftSize = intval(count($items) / 2);
        $rightSize = count($items) - $leftSize;
        $left = array_slice($items, 0, $leftSize);
        $right = array_slice($items, $leftSize, $rightSize);
        
        // Сортируем
        $left = $this->sortByKey($left, $key, $statement);
        $right = $this->sortByKey($right, $key, $statement);
        
        // Собираем массив
        $leftIndex = 0;
        $rightIndex = 0;
        $itemsSize = count($left) + count($right);
        for ($i = 0; $i < $itemsSize; $i++) {
            if ($leftIndex >= count($left)) {
                $items[$i] = $right[$rightIndex++];
            }
            else if ($rightIndex >= count($right)) {
                $items[$i] = $left[$leftIndex++];
            }
            else if (($statement == "<" && $left[$leftIndex][$key] < $right[$rightIndex][$key])
                || ($statement == ">" && $left[$leftIndex][$key] > $right[$rightIndex][$key]))
            {
                $items[$i] = $left[$leftIndex++];
            }
            else {
                $items[$i] = $right[$rightIndex++];
            }
        }

        return $items;
    }
}