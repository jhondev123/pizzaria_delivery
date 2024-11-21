<?php

namespace Jhonattan\PizzariaDelivery\Core;
use Dotenv\Dotenv;
use Jhonattan\PizzariaDelivery\Core\Routes\Routes;
class Bootstrap
{
    public static function initEnvironment()
    {
        // starting environment variables
        $dotenv = Dotenv::createImmutable(__DIR__.'/../');
        $dotenv->load();
    }
    public static function init()
    {
        self::initEnvironment();

        // starting routes
        Routes::init();


    }
}