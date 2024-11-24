<?php

namespace Jhonattan\PizzariaDelivery\Core\Routes;

use Jhonattan\PizzariaDelivery\App\Http\Controllers\UserController;
use Jhonattan\PizzariaDelivery\Core\Http\Request;
use Jhonattan\PizzariaDelivery\Core\Router;

class Routes
{
    public static function init()
    {
        $router = new Router();

        $router->add('GET', '/', function (){
            echo "Hello World!";
        });

        $router->add('GET', '/users', [UserController::class, 'index']);
        $router->add('GET', '/users/{id}', [UserController::class, 'show']);
        $router->add('POST', '/users', [UserController::class, 'store']);
        $request = new Request();

        $router->dispatch($request);

    }

}