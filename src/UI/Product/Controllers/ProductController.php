<?php
namespace App\UI\Product\Controllers;

use Slim\Psr7\Request;
use Slim\Psr7\Response;
use Slim\Views\Twig;

class ProductController
{
    public function listProducts(Request $request, Response $response, $args)
    {
        $view = Twig::fromRequest($request);
        $data = ['pageName' => 'Products!'];
        return $view->render($response, 'Product/product.html', $data);
    }
}
