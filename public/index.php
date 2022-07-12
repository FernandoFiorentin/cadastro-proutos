<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Routes\Router;
use Slim\Factory\AppFactory;
use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;

$app = AppFactory::create();

$twig = Twig::create(__DIR__ . '/../src/UI\Templates', ['chace' => false]);
$app->add(TwigMiddleware::create($app, $twig));

$app->addErrorMiddleware(true, true, true);

$router = new Router($app);
$router->registerRoutes();

$app->run();