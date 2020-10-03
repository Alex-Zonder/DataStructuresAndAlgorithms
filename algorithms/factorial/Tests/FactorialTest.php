<?php
use PHPUnit\Framework\TestCase;

use Algorithms\Factorial\Factorial;

class FactorialTest extends TestCase
{
    public function testFactorial()
    {
        $factorial = new Factorial();


        // Test method countRecursive is exists
        $this->assertTrue(
            method_exists($factorial, 'countRecursive'), 
            'Class does not have method countRecursive'
        );

        // Test method countRecursive return 5040
        $this->assertSame(5040, $factorial->countRecursive(7));


        // Test method countWhile is exists
        $this->assertTrue(
            method_exists($factorial, 'countWhile'), 
            'Class does not have method countWhile'
        );

        // Test method countWhile return 5040
        $this->assertSame(5040, $factorial->countWhile(7));
    }
}
