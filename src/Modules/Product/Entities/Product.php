<?php
namespace App\Modules\Product\Entities;

use App\Modules\Product\Exceptions\ProductException;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

class Product {
    public int $id;
    public string $name;
    public float $price;

    public function __construct(int $id = 0, string $name = "", float $price = 0)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
    }

    public function validate(){
        if(empty($this->name)){
            throw new ProductException("Nome do produto não pode ser vazio");
        }

        if($this->price <= 0){
            throw new ProductException("O preço deve ser maior o que zero");
        }
    }
}