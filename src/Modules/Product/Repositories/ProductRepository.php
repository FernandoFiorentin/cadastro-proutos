<?php

namespace App\Modules\Product\Repositories;

use App\DB\DB;
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
}
