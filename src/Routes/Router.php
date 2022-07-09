<?php

namespace App\Routes;

use App\UI\Home\Controllers\HomeController;
use App\UI\Product\Controllers\ProductController;
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
    }


}