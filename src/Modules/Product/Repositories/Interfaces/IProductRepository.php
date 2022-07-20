<?php

namespace App\Modules\Product\Repositories\Interfaces;

use App\Modules\Product\Entities\Product;

interface IProductRepository
{
    //public function findById(int $id);
    public function findAll(): array;
    public function save(Product $product): int;
    //public function update(Product $product);
    //public function delete(Product $product);
}
