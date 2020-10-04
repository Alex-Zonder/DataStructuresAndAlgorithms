<?php
namespace Algorithms\Backpack;

/**
 *
 * Задача о рюкзаке
 * 
 * На входе: W - максимальный вес (вместимость рекзака), 
 *   w1, ..., wn - веса предметов
 *   p1, ..., pn - стоимость предметов
 * Необходимо собрать рюкзак с максимальной стоимостью.
 * 
 */

/**
 *
 * Жадный алгоритм
 * 
 * Шаги:
 * 1: Считаем удельную стоимость предметов
 *    и сортируем массив по удельной стоимости.
 * 2: Собираем рюкзак: На каждом шагу берем самый дорогой по удельной стоимости предмет.
 *    Складываем сумму предметов.
 * 
 */

use Algorithms\Sort\SortInterface;


class Backpack
{
    protected $sort;

    public function __construct(SortInterface $sort) {
        $this->sort = $sort;
    }

    /**
     * Собираем рюкзак (результат: общая стоимость собранных предметов)
     */
    public function calcSumm(int $maxWeight, array $items) {
        // Считаем удельную стоимость предметов
        foreach($items as $key => $val)
            $items[$key]["priceUdel"] = $items[$key]["price"] / $items[$key]["weight"];

        // Сортируем массив по удельной стоимости (по убыванию)
        $items = $this->sort->sortByKey($items, "priceUdel", ">");

        // Собираем рюкзак
        $summ = 0;
        $weight = 0;
        for ($i = 0; $i < count($items) && $weight < $maxWeight; $i++) {
            if ($maxWeight > $weight + $items[$i]["weight"]) {
                $weight += $items[$i]["weight"];
                $summ += $items[$i]["price"];
            }
        }

        return $summ;
    } 
}
