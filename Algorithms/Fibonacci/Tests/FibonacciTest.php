<?php
use PHPUnit\Framework\TestCase;

use Algorithms\Fibonacci\Fibonacci;

class FibonacciTest extends TestCase
{
    public function testFibonacci()
    {
        $fibonacci = new Fibonacci();


        // Test method countRecursive is exists
        $this->assertTrue(
            method_exists($fibonacci, 'countRecursive'), 
            'Class does not have method countRecursive'
        );

        // Test method countRecursive return 13
        $this->assertSame(13, $fibonacci->countRecursive(7));


        // Test method countWhile is exists
        $this->assertTrue(
            method_exists($fibonacci, 'countWhile'), 
            'Class does not have method countWhile'
        );

        // Test method countWhile return 13
        $this->assertSame(13, $fibonacci->countWhile(7));
    }

    /**
     * @dataProvider additionProvider
     */
    public function testFibonacciProvider($a, $expected)
    {
        $fibonacci = new Fibonacci();

        $this->assertSame($expected, $fibonacci->countWhile($a));
    }

    public function additionProvider()
    {
        return [
            [0, 0],
            [1, 1],
            [2, 1],
            [3, 2],
            [4, 3],
            [5, 5],
            [6, 8],
            [7, 13],
            [8, 21],
            [9, 34]
        ];
    }
}
