<?php
namespace App\Modules\Product\Entities;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

class Product {
    public $id;
    public $name;
    public $price;

    public function __construct(int $id = 0, string $name, float $price)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
    }
}