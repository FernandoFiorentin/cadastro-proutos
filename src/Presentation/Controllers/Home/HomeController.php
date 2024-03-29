<?php
namespace App\Presentation\Controllers\Home;

use Slim\Psr7\Request;
use Slim\Psr7\Response;
use Slim\Views\Twig;

class HomeController
{
    public function home(Request $request, Response $response)
    {
        $view = Twig::fromRequest($request);
        $data = ['pageName' => 'Homee!'];
        return $view->render($response, 'Home/home.html', $data);
    }
}
