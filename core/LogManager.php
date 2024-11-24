<?php

namespace Jhonattan\PizzariaDelivery\Core;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class LogManager
{
    private static ?Logger $logger = null;

    public static function getLogger(): Logger
    {
        if (self::$logger === null) {
            self::$logger = new Logger('app');
            self::$logger->pushHandler(new StreamHandler(__DIR__ . '/../logs/app.jsonl'));
        }

        return self::$logger;
    }
}