<?php
namespace Tests\Modules\Product\Entities;

use App\Modules\Product\Entities\Product;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    function testCanBeInstantiated(){
        $this->assertInstanceOf(Product::class, new Product());
    }
}