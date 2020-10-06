<?php
use PHPUnit\Framework\TestCase;

use Algorithms\Sort\BoubleSort;
use Algorithms\Sort\InsertSort;
use Algorithms\Sort\MergeSort;
use Algorithms\Backpack\Backpack;

class BackpackTest extends TestCase
{
    public function testBackpack()
    {
        $sort = new MergeSort();
        $backpack = new Backpack($sort);

        // Test method calcPriceGreedy is exists
        $this->assertTrue(
            method_exists($backpack, 'calcPriceGreedy'), 
            'Class does not have method calcPriceGreedy'
        );

        // Test method calcPriceGreedy return 9
        $maxWeight = 10;
        $items = [
            ["weight" => 4, "price" => 3],
            ["weight" => 3, "price" => 4],
            ["weight" => 2, "price" => 3],
            ["weight" => 2, "price" => 2]
        ];
        $this->assertSame(9, $backpack->calcPriceGreedy($maxWeight, $items));



        // Test method calcPriceBruteForce is exists
        $this->assertTrue(
            method_exists($backpack, 'calcPriceBruteForce'), 
            'Class does not have method calcPriceBruteForce'
        );

        // Test method calcPriceBruteForce return 10
        $maxWeight = 10;
        $items = [
            ["weight" => 4, "price" => 3],
            ["weight" => 3, "price" => 4],
            ["weight" => 2, "price" => 3],
            ["weight" => 2, "price" => 2]
        ];
        $this->assertSame(10, $backpack->calcPriceBruteForce($maxWeight, $items));
    }
}
