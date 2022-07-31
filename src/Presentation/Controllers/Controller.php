<?php
namespace App\Presentation\Controllers;

use Slim\Interfaces\RouteParserInterface;
use Slim\Psr7\Request;
use Slim\Routing\RouteContext;

class Controller {

    protected function getRouteParser(Request $request): RouteParserInterface{
        $routeContext = RouteContext::fromRequest($request);
        return $routeContext->getRouteParser();
    }
}