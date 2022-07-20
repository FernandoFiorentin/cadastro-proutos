<?php

namespace App\Modules\Product\Repositories;

use App\DB\DB;
use App\Modules\Product\Entities\Product;
use App\Modules\Product\Repositories\Interfaces\IProductRepository;

class ProductRepository implements IProductRepository
{
    public function findAll(): array
    {
        $qb = DB::getQueryBuilder();
        $products = $qb->table("products")
            ->select()
            ->get();
        return $products;
    }

    public function save(Product $product): int
    {
        $data = [
            'name' => $product->name,
            'price' => $product->price
        ];

        $qb = DB::getQueryBuilder();
        return $qb->table('products')
            ->insert($data)
            ->execute();
    }
}
