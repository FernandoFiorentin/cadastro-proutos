<?php
namespace App\UI\Controllers\Product;

use App\Modules\Product\Repositories\Interfaces\IProductRepository;
use App\Modules\Product\Repositories\ProductRepository;
use Slim\Psr7\Request;
use Slim\Psr7\Response;
use Slim\Views\Twig;

class ProductController
{
    private IProductRepository $productRepository;

    public function __construct(IProductRepository $productRepository = null)
    {
        if($productRepository){
            $this->productRepository = $productRepository;
        }else{
            $this->productRepository = new ProductRepository();
        }
    }

    public function listProducts(Request $request, Response $response, $args)
    {
        $view = Twig::fromRequest($request);
        $products = $this->productRepository->findAll();
        $data = ['products' => $products];
        return $view->render($response, 'Product/product.html', $data);
    }
}
