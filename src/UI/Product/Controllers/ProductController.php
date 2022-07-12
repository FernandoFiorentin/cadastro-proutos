<?php
namespace App\UI\Product\Controllers;

use App\Modules\Product\Entities\Product;
use Slim\Psr7\Request;
use Slim\Psr7\Response;
use Slim\Views\Twig;

class ProductController
{
    public function listProducts(Request $request, Response $response, $args)
    {
        $view = Twig::fromRequest($request);
        $products = [];
        $products[] = new Product(1, "My product", 30);
        $products[] = new Product(2, "My product 2", 40);
        $data = ['products' => $products];
        return $view->render($response, 'Product/product.html', $data);
    }
}
