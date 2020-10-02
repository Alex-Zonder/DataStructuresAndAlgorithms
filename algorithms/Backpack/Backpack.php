<?php
namespace Algorithms\Backpack;

/*
 *
 * Задача о рюкзаке
 * 
 * На входе: W - максимальный вес (вместимость рекзака), 
 *   w1, ..., wn - веса предметов
 *   p1, ..., pn - стоимость предметов
 * Необходимо собрать рюкзак с максимальной стоимостью.
 * 
 */

/*
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


class Backpack {
    /*
     * Сортировка пузырьком
     * 
     * Сложность	Наилучший случай	В среднем	Наихудший случай
     * Время	    O(n)	            O(n2)	    O(n2)
     * Память	    O(1)    	        O(1)    	O(1)
     */
    // Сортировка одномерного массива чисел
    public static function sortBouble(array $items, string $statement = "<"): array {
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
    public static function sortBoubleByKey(array $items, string $key, string $statement = "<"): array {
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


    /*
     * Собираем рюкзак
     */
    public static function calcSumm(int $maxWeight, array $items) {
        // Считаем удельную стоимость предметов
        foreach($items as $key => $val)
            $items[$key]["priceUdel"] = $items[$key]["price"] / $items[$key]["weight"];

        // Сортируем массив по удельной стоимости
        $items = self::sortBoubleByKey($items, "priceUdel", ">");

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



// $maxWeight = 10;
// $items = [
//     ["weight" => 4, "price" => 3],
//     ["weight" => 3, "price" => 4],
//     ["weight" => 2, "price" => 3],
//     ["weight" => 2, "price" => 2]
// ];
// $summ = Backpack::calcSumm($maxWeight, $items);
// echo "SUMM: " . $summ . "\n";


// $itm = [2, 4, 3, 2, 1];
// var_dump(Backpack::sortBouble($itm, ">"));
