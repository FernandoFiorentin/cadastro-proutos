<?php

use App\UI\Home\Controllers\HomeController;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();
$app->addErrorMiddleware(true, true, true);

$app->get('/', [HomeController::class, 'home']);

$app->run();