<?php
namespace App\Modules\Product\UseCases;

use App\Modules\Product\Entities\Product;
use App\Modules\Product\Repositories\Interfaces\IProductRepository;

class InsertProductUseCase {

    private IProductRepository $productRepository;

    public function __construct(IProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function handle(Product $product){
        $product->validate();
        $this->productRepository->save($product);
    }
}