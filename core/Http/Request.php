<?php

namespace Jhonattan\PizzariaDelivery\Core\Http;

class Request
{
    private string $method;
    private string $uri;
    private array $queryParams;
    private array $body;

    public function __construct()
    {
        $this->method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
        $this->uri = strtok($_SERVER['REQUEST_URI'] ?? '/', '?');
        $this->queryParams = $_GET;
        $this->body = $this->parseBody();
    }

    private function parseBody(): array
    {
        $contentType = $_SERVER['CONTENT_TYPE'] ?? '';

        // Verifica JSON
        if (str_contains($contentType, 'application/json')) {
            $input = file_get_contents('php://input');
            return json_decode($input, true) ?? [];
        }

        // Verifica application/x-www-form-urlencoded
        if (str_contains($contentType, 'application/x-www-form-urlencoded')) {
            return $_POST;
        }

        return [];
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function getUri(): string
    {
        return $this->uri;
    }

    public function getQueryParams(): array
    {
        return $this->queryParams;
    }

    public function getBody(): array
    {
        return $this->body;
    }
}