<?php

namespace App\Config;

use App\Modules\Product\Repositories\Interfaces\IProductRepository;
use App\Modules\Product\Repositories\ProductRepository;

class Dependencies
{
    /**
     * Map how to resolve dependencies
     * @return array
     */
    public static function getDefinitions(): array
    {
        return [
            IProductRepository::class => \DI\create(ProductRepository::class),
        ];
    }
}
