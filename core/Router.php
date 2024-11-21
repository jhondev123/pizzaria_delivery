<?php

namespace Jhonattan\PizzariaDelivery\Core;
class Router
{
    private array $routes = [];

    /**
     * Adiciona uma rota ao roteador.
     *
     * @param string $method Método HTTP (GET, POST, etc.)
     * @param string $path Caminho da rota (ex.: /users/{id})
     * @param callable|array $handler Função ou Controlador (ex.: ['Controller', 'method'])
     */
    public function add(string $method, string $path, callable|array $handler): void
    {
        $method = strtoupper($method);

        // Converte parâmetros dinâmicos ({param}) para regex
        $path = preg_replace('/\{([\w]+)\}/', '(?P<\1>[^/]+)', $path);
        $path = '#^' . $path . '$#'; // Define o padrão regex

        $this->routes[$method][$path] = $handler;
    }

    /**
     * Processa a rota atual.
     *
     * @param string $requestUri URI atual da requisição
     * @param string $requestMethod Método HTTP atual
     */
    public function dispatch(string $requestUri, string $requestMethod): void
    {
        $requestMethod = strtoupper($requestMethod);
        $requestUri = strtok($requestUri, '?'); // Remove parâmetros de query

        if (isset($this->routes[$requestMethod])) {
            foreach ($this->routes[$requestMethod] as $path => $handler) {
                if (preg_match($path, $requestUri, $matches)) {
                    // Filtra apenas os parâmetros nomeados
                    $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);

                    if (is_callable($handler)) {
                        // Chama o callback com os parâmetros
                        call_user_func($handler, ...$params);
                    } elseif (is_array($handler)) {
                        [$controller, $method] = $handler;
                        if (class_exists($controller) && method_exists($controller, $method)) {
                            // Instancia o controlador e chama o método com os parâmetros
                            (new $controller())->$method(...$params);
                        } else {
                            http_response_code(500);
                            echo "Erro: Controlador ou método não encontrado.";
                        }
                    }

                    return; // Encerra após encontrar a rota
                }
            }
        }

        // Rota não encontrada
        http_response_code(404);
        echo "404 - Rota não encontrada.";
    }
}
