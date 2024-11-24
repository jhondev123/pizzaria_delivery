<?php

namespace Jhonattan\PizzariaDelivery\Core\Http;

class ResponseFactory
{
    public static function response($status,$headers = [], $data = []): \Nyholm\Psr7\Response
    {
        return new \Nyholm\Psr7\Response($status, $headers, json_encode($data, JSON_THROW_ON_ERROR));
    }
}