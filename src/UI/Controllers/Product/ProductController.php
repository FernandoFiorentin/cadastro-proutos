<?php

namespace App\UI\Controllers\Product;

use App\Modules\Product\Entities\Product;
use App\Modules\Product\Repositories\Interfaces\IProductRepository;
use Slim\Psr7\Request;
use Slim\Psr7\Response;
use Slim\Routing\RouteContext;
use Slim\Views\Twig;

class ProductController
{
    private IProductRepository $productRepository;

    public function __construct(IProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function listProducts(Request $request, Response $response)
    {
        $view = Twig::fromRequest($request);
        $products = $this->productRepository->findAll();
        $data = ['products' => $products];
        return $view->render($response, 'Product/product-list.html', $data);
    }

    public function createProduct(Request $request, Response $response)
    {
        if ($request->getMethod() == 'GET') {
            $view = Twig::fromRequest($request);
            return $view->render($response, 'Product/product.html');
        }

        if ($request->getMethod() == 'POST') {
            return $this->saveProduct($request, $response);
        }
    }

    private function saveProduct(Request $request, Response $response)
    {
        $formData = $request->getParsedBody();

        $product = new Product();
        $product->name = $formData['name'];
        $product->price = $formData['price'];

        $this->productRepository->save($product);
        $routeContext = RouteContext::fromRequest($request);
        $routeParser = $routeContext->getRouteParser();
        return $response
            ->withHeader('Location', $routeParser->urlFor('products'))
            ->withStatus(302);
    }
}
