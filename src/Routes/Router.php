<?php

namespace App\Routes;

use App\Presentation\Controllers\Home\HomeController;
use App\Presentation\Controllers\Product\ProductController;

use Slim\App;

class Router{

    private App $app;

    public function __construct(App $app)
    {
        $this->app = $app;
    }

    public function registerRoutes(){
        $this->app->get('/', [HomeController::class, 'home'])->setName('home');
        $this->app->get('/products', [ProductController::class, 'listProducts'])->setName('products');
        $this->app->map(['GET', 'POST'], '/products/create', [ProductController::class, 'createProduct'])->setName('createProduct');
    }


}