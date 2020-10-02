<?php
use PHPUnit\Framework\TestCase;

use Algorithms\Backpack\Backpack;

class BackpackTest extends TestCase
{
    public function testExample()
    {
        $backpack = new Backpack();

        // Test method calcSumm is exists
        $this->assertTrue(
            method_exists($backpack, 'calcSumm'), 
            'Class does not have method calcSumm'
        );

        // Test method calcSumm return 9
        $maxWeight = 10;
        $items = [
            ["weight" => 4, "price" => 3],
            ["weight" => 3, "price" => 4],
            ["weight" => 2, "price" => 3],
            ["weight" => 2, "price" => 2]
        ];
        $this->assertSame(9, $backpack->calcSumm($maxWeight, $items));
    }
}
