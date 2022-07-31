<?php

namespace App\Presentation\Controllers\Product;

use App\Modules\Product\Entities\Product;
use App\Modules\Product\Exceptions\ProductException;
use App\Modules\Product\Repositories\Interfaces\IProductRepository;
use App\Modules\Product\UseCases\InsertProductUseCase;
use App\Presentation\Controllers\Controller;
use Slim\Psr7\Request;
use Slim\Psr7\Response;
use Slim\Views\Twig;

class ProductController extends Controller
{
    private IProductRepository $productRepository;
    private InsertProductUseCase $insertProductUseCase;

    public function __construct(IProductRepository $productRepository, InsertProductUseCase $insertProductUseCase)
    {
        $this->productRepository = $productRepository;
        $this->insertProductUseCase = $insertProductUseCase;
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
        $product->price = (float) $formData['price'];

        try {
            $this->insertProductUseCase->handle($product);
            $routeParser = $this->getRouteParser($request);
            return $response
                ->withHeader('Location', $routeParser->urlFor('products'))
                ->withStatus(302);
        } catch (ProductException $e) {
            $view = Twig::fromRequest($request);
            $data = [
                'error' => $e->getMessage()
            ];
            return $view->render($response, 'Product/product.html', $data);
        }
    }
}
