<?php

namespace Jhonattan\PizzariaDelivery\Core\Http;

use Nyholm\Psr7\Response;

class ResponseManager
{
    public static function response(Response $res): void
    {
        header('Content-Type: application/json');
        http_response_code($res->getStatusCode());
        echo $res->getBody();
    }

    public static function redirect(string $url): void
    {
        header("Location: $url");
    }
}