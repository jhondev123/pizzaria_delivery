<?php

namespace Jhonattan\PizzariaDelivery\App\Http\Controllers;

use Jhonattan\PizzariaDelivery\Core\LogManager;
use Monolog\Logger;

abstract class Controller
{
    protected static Logger $logger;

    public function __construct()
    {
        self::$logger = LogManager::getLogger();
    }
}