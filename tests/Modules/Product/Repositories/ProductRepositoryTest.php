<?php
namespace Tests\Modules\Product\Repositories;

use App\Modules\Product\Repositories\Interfaces\IProductRepository;
use App\Modules\Product\Repositories\ProductRepository;
use PHPUnit\Framework\TestCase;

class ProductRepositoryTest extends TestCase
{
    function testCanBeInstantiatedAndExtendsCorrectInterface(){
        $this->assertInstanceOf(IProductRepository::class, new ProductRepository());
    }
}