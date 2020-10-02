<?php
#include 'vendor/autoload.php';

use PHPUnit\Framework\TestCase;

use Algorithms\Backpack\Backpack;

class BackpackTest extends TestCase
{
    public function testExample()
    {
        //$this->assertTrue(true);

        $backpack = new Backpack();
        // Test class calcSumm is exists
        $this->assertTrue(
            method_exists($backpack, 'calcSumm'), 
            'Class does not have method calcSumm'
        );

        //var_dump($backpack->calcSumm);
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
