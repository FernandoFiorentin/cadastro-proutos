<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Config\Dependencies;
use App\Routes\Router;
use DI\Bridge\Slim\Bridge;
use DI\ContainerBuilder;
use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;

$containerBuilder = new ContainerBuilder();
$containerBuilder->addDefinitions(Dependencies::getDefinitions());
$container = $containerBuilder->build();

$app = Bridge::create($container);

$twig = Twig::create(__DIR__ . '/../src/Presentation\Templates', ['chace' => false]);
$app->add(TwigMiddleware::create($app, $twig));

$app->addErrorMiddleware(true, true, true);

$router = new Router($app);
$router->registerRoutes();

$app->run();