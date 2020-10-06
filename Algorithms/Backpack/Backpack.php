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

use Algorithms\Sort\SortInterface;

class Backpack
{
    protected $sort;

    public function __construct(SortInterface $sort)
    {
        $this->sort = $sort;
    }


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
     * Результат: общая стоимость собранных предметов.
     * 
     * Сложность	Наилучший случай	В среднем	Наихудший случай
     * Время	    sort + O(2n)         sort + O(2n) sort + O(2n)
     * Память	    O(1)    	        O(1)    	O(1)
     * 
     */
    public function calcPriceGreedy(int $maxWeight, array $items): int
    {
        // Считаем удельную стоимость предметов (O(n))
        foreach($items as $key => $val)
            $items[$key]["priceUdel"] = $items[$key]["price"] / $items[$key]["weight"];

        // Сортируем массив по удельной стоимости (по убыванию)
        $items = $this->sort->sortByKey($items, "priceUdel", ">");

        // Собираем рюкзак
        $price = 0;
        $weight = 0;
        for ($i = 0; $i < count($items) && $weight < $maxWeight; $i++) {
            if ($maxWeight > $weight + $items[$i]["weight"]) {
                $weight += $items[$i]["weight"];
                $price += $items[$i]["price"];
            }
        }

        return $price;
    } 


    /**
     * 
     * Полный перебор (Метод грубой силы)
     * 
     * Перебираем все варианты наборов и выбираем самый дорогой, который влезает в рюкзак.
     * Количество вариантов равно 2^n где n-количество предметов.
     * За набор будем брать счетчик цикла вариантов в двоичном представлении.
     * 
     * Например:
     * Предметы: 2, 1, 0
     * -----------------
     * Набор0:   0, 0, 0
     * Набор1:   0, 0, 1
     * Набор2:   0, 1, 0
     * Набор3:   0, 1, 1
     * Набор4:   1, 0, 0
     * Набор5:   1, 0, 1
     * Набор6:   1, 1, 0
     * Набор7:   1, 1, 1
     * 
     * Итого на 3 предмета 8 наборов. 2 ^ 3 = 8.
     * 
     * Маска предмета - бинарное педставление номера/позиции предмета.
     * Например:
     * Предмет1 - 0, 0, 1
     * Предмет2 - 0, 1, 0
     * Предмет3 - 1, 0, 0
     * 
     * Результат: общая стоимость собранных предметов.
     * 
     * Сложность	Наилучший случай	В среднем	Наихудший случай
     * Время	    O((2^n)*n)	        O((2^n)*n)	O((2^n)*n)
     * Память	    O(1)    	        O(1)    	O(1)
     * 
     */
    public function calcPriceBruteForce(int $maxWeight, array $items): int
    {
        $price = 0;
        $weight = 0;
        for ($set = 1; $set < pow(2, count($items)); $set++) {
            $tmpWeight = 0;
            $tmpPrice = 0;
            for ($j = 0; $j < count($items); $j++) {
                $mask = 1 << $j;
                if (($set & $mask) > 0) {
                    $tmpWeight += $items[$j]["weight"];
                    $tmpPrice += $items[$j]["price"];
                }
            }
            if ($maxWeight >= $tmpWeight && $price < $tmpPrice) {
                $weight = $tmpWeight;
                $price = $tmpPrice;
            }
        }

        return $price;
    } 
}
