<?php

namespace Jhonattan\PizzariaDelivery\Core;

class Router
{
    private array $routes = [];

    public function add(string $method, string $path, callable|array $handler): void
    {
        $method = strtoupper($method);
        $path = preg_replace('/\{([\w]+)\}/', '(?P<\1>[^/]+)', $path);
        $path = '#^' . $path . '$#';

        $this->routes[$method][$path] = $handler;
    }

    public function dispatch(Request $request): void
    {
        $requestMethod = $request->getMethod();
        $requestUri = $request->getUri();

        if (isset($this->routes[$requestMethod])) {
            foreach ($this->routes[$requestMethod] as $path => $handler) {
                if (preg_match($path, $requestUri, $matches)) {
                    // Filtra apenas os parâmetros nomeados da rota
                    $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);

                    if (is_callable($handler)) {
                        // Passa o Request como primeiro argumento
                        call_user_func($handler, $request, ...array_values($params));
                    } elseif (is_array($handler)) {
                        [$controller, $method] = $handler;
                        if (class_exists($controller) && method_exists($controller, $method)) {
                            // Passa o Request como primeiro argumento
                            (new $controller())->$method($request, ...array_values($params));
                        } else {
                            http_response_code(500);
                            echo "Erro: Controlador ou método não encontrado.";
                        }
                    }

                    return;
                }
            }
        }

        http_response_code(404);
        echo "404 - Rota não encontrada.";
    }
}
