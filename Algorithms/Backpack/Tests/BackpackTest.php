<?php
use PHPUnit\Framework\TestCase;

use Algorithms\Sort\BoubleSort;
use Algorithms\Sort\InsertSort;
use Algorithms\Sort\MergeSort;
use Algorithms\Backpack\Backpack;

class BackpackTest extends TestCase
{
    public $sort = [];
    public $backpack = [];

    // public $maxWeight = 10;
    // public $items = [
    //     ["weight" => 5, "price" => 1],
    //     ["weight" => 3, "price" => 2],
    //     ["weight" => 2, "price" => 3],
    //     ["weight" => 1, "price" => 3],
    //     ["weight" => 1, "price" => 5],
    //     ["weight" => 5, "price" => 4],
    // ];
    public $maxWeight = 10;
    public $items = [
        ["weight" => 4, "price" => 3],
        ["weight" => 3, "price" => 4],
        ["weight" => 2, "price" => 3],
        ["weight" => 2, "price" => 2]
    ];

    protected function setUp(): void
    {
        $this->sort = new MergeSort();
        $this->backpack = new Backpack($this->sort);
    }


    public function testGreedy()
    {
        // Test method calcPriceGreedy is exists
        $this->assertTrue(
            method_exists($this->backpack, 'calcPriceGreedy'),
            'Class does not have method calcPriceGreedy'
        );
        // Test return
        $this->assertSame(9, $this->backpack->calcPriceGreedy($this->maxWeight, $this->items));
    }


    public function testBruteForce()
    {
        // Test method calcPriceBruteForce is exists
        $this->assertTrue(
            method_exists($this->backpack, 'calcPriceBruteForce'),
            'Class does not have method calcPriceBruteForce'
        );
        // Test return
        $this->assertSame(10, $this->backpack->calcPriceBruteForce($this->maxWeight, $this->items));
    }


    public function testBranchAndBound()
    {
        // Test method calcPriceBranchAndBound is exists
        $this->assertTrue(
            method_exists($this->backpack, 'calcPriceBranchAndBound'),
            'Class does not have method calcPriceBranchAndBound'
        );
        // Test return
        $this->assertSame(10, $this->backpack->calcPriceBranchAndBound($this->maxWeight, $this->items));
    }
}
