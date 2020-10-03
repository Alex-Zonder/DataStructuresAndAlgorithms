<?php
use PHPUnit\Framework\TestCase;

use Algorithms\Sort\InsertSort;

class InsertSortTest extends TestCase
{
    public function testInsertSort()
    {
        $sort = new InsertSort();

        // Test method sort is exists
        $this->assertTrue(
            method_exists($sort, 'sort'), 
            'Class does not have method sort'
        );

        // Test method sort return [1, 2, 2, 3, 4]
        $itm = [2, 4, 3, 2, 1];
        $this->assertSame([1, 2, 2, 3, 4], $sort->sort($itm));

        // Test method sort return [4, 3, 2, 2, 1]
        $itm = [2, 4, 3, 2, 1];
        $this->assertSame([4, 3, 2, 2, 1], $sort->sort($itm, ">"));
    }
}
