<?php

namespace App\UI\Home\Controllers;

use Slim\Psr7\Request;
use Slim\Psr7\Response;

class HomeController
{

    public function home(Request $request, Response $response, $args)
    {
        $response->getBody()->write("Welcome to homepage");
        return $response;
    }
}
