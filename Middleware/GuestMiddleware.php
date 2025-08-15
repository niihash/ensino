<?php

namespace Plataforma\Ensino\Middleware;

class GuestMiddleware {
    public function handle() {
        if (isset($_SESSION['admin_logado'])) {
            // Se logado, redirecionar para dashboard
            header('Location: /dashboard');
            exit;
        }
    }
}