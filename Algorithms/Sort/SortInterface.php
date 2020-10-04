<?php
namespace Algorithms\Sort;

interface SortInterface
{
    /**
     * Сортировка одномерного массива чисел
     */
    public function sort(array $items, string $statement = "<"): array;

    /**
     * Сортировка ассоциативного массива по ключу
     */
    public function sortByKey(array $items, string $key, string $statement = "<"): array;
}