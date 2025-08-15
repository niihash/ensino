<?php

// autoload do composer
require_once(__DIR__ . '/../vendor/autoload.php');

use Plataforma\Ensino\Router\Router;

// Caminho base /var/www/html/public
define('BASE_PATH', __DIR__);

$env = parse_ini_file(BASE_PATH . '/../.env');

// constantes do banco de dados.
require_once(BASE_PATH . '/../config/config.php');

// Sessão iniciada
session_start();

// Recebe o caminho da requisição
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

// Recebe o método da requisição ( GET / POST / PATCH / DELETE )
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

// Instancia a Classe de Roteador
$router = new Router();

// Invoca o arquivo para adicionar as rotas existentes
require_once(BASE_PATH . '/../config/routes.php');

// Chama o método para solucionar o caminho requisitado e executar a solicitação
try {
    $router->resolve($method, $uri);
} catch (\Throwable $th) {
    print_r($th);
}
