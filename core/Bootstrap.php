<?php

namespace Jhonattan\PizzariaDelivery\Core;
use Dotenv\Dotenv;
use Jhonattan\PizzariaDelivery\Core\Routes\Routes;
class Bootstrap
{
    public static function init()
    {
        // starting environment variables
        $dotenv = Dotenv::createImmutable(__DIR__.'/../');
        $dotenv->load();


        // starting routes
        Routes::init();


    }
}