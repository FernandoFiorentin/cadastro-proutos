<?php

use App\Routes\Router;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();
$app->addErrorMiddleware(true, true, true);

$router = new Router($app);
$router->registerRoutes();

$app->run();