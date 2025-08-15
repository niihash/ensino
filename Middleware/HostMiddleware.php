<?php

namespace Plataforma\Ensino\Middleware;

class HostMiddleware {
    public function handle() {
        if (!isset($_SESSION['admin_logado'])) {
            // Se não está logado, redireciona para página de login
            header('Location: /');
            exit;
        }
    }
}