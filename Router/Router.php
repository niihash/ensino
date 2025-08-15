<?php

namespace Plataforma\Ensino\Router;

use Plataforma\Ensino\Middleware\GuestMiddleware;
use Plataforma\Ensino\Middleware\HostMiddleware;
use Plataforma\Ensino\app\Controller\AdminController;

class Router
{

    private $routes = [];

    // Método para adicionar as rotas
    public function addRoute($method, $url, $handler, $middlewares = [])
    {
        $this->routes[] = [
            'method' => strtoupper($method),
            'url' => $url,
            'handler' => $handler,
            'middlewares' => $middlewares
        ];
    }

    public function get($url, $handler, $middlewares = [])
    {
        $this->addRoute('GET', $url, $handler, $middlewares);
    }

    public function post($url, $handler, $middlewares = [])
    {
        $this->addRoute('POST', $url, $handler, $middlewares);
    }

    public function patch($url, $handler, $middlewares = [])
    {
        $this->addRoute('PATCH', $url, $handler, $middlewares);
    }

    public function delete($url, $handler, $middlewares = [])
    {
        $this->addRoute('DELETE', $url, $handler, $middlewares);
    }

    // Método para resolver as requisições e aplicar os intermediadores
    public function resolve($method, $url)
    {
        $url = urldecode($url);
        foreach ($this->routes as $route) {
            // Verifica se método e url combinam com alguma registrada
            if ($method == $route['method'] && $this->isUrlEqual($url, $route['url'], $params)) {
                // Os intermediadores são aplicados aqui
                foreach ($route['middlewares'] as $middleware) {
                    // Instancia o intermediário
                    $middlewareInstance = new $middleware();
                    // Chama o método handle do intermediário
                    $middlewareInstance->handle();  
                }

                // Se não houver nada de errado com os intermediários
                // Chama a classe controller e sua função usando o @ como divisor  
                list($controller, $action) = explode('@', $route['handler']);
                // Instancia o controller
                $controller = new $controller();
                // Chama a classe, função e informa os parâmetros
                call_user_func_array([$controller, $action], $params);
                return;
            }
        }

        // Se nenhuma rota for encontrada
        header('Location: /projetoChar/');
        exit;
    }

    // Método para verificar se os urls combinam
    private function isUrlEqual($url, $route, &$params)
    {
        // Deleta barras no começo e no fim
        // Cria arrays utilizando a barra como separador
        $urlParts = explode('/', trim($url, '/'));
        $routeParts = explode('/', trim($route, '/'));

        if (count($urlParts) != count($routeParts)) {
            // Se o array for de tamanho diferente não combinam
            return false;
        }

        // Zera o array que captura parâmetros dinâmicos
        $params = [];
        for ($i = 0; $i < count($routeParts); $i++) {
            if (preg_match('/^{.*}$/', $routeParts[$i])) {
                $params[] = (int) trim(trim($urlParts[$i], '{'), '}');
                // Se encontrar um parâmetro, ele é adicionado ao array
            } else {
                if ($urlParts[$i] !== $routeParts[$i]) {
                    // Se as partes do url e do url do roteador forem diferentes, não combinam
                    return false;
                }
            }
        }
        // Os urls combinam
        return true;
    }
}
