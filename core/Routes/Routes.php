<?php

namespace Jhonattan\PizzariaDelivery\Core\Routes;

use Jhonattan\PizzariaDelivery\App\Http\Controllers\UserController;
use Jhonattan\PizzariaDelivery\Core\Router;
class Routes
{
    public static function init()
    {
        $router = new Router();

        $router->add('GET', '/', function (){
            echo "Hello World!";
        });

        $router->add('GET', '/user', [UserController::class, 'index']);
        $router->add('GET', '/user/{id}', [UserController::class, 'show']);

        $router->dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);

    }

}