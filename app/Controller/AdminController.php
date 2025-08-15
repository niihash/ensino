<?php

namespace Plataforma\Ensino\app\Controller;

class AdminController
{

    public function __construct() {}

    public function login()
    {
        require_once(BASE_PATH . "/../app/View/login.view.php");
    }

    public function auth()
    {

        if (ADMIN_USER === $_POST['usuario'] && ADMIN_SENHA === $_POST['senha']) {
            $_SESSION['admin_logado'] = true;
            $_SESSION['usuario_logado'] = ADMIN_USER;
            unset($_SESSION['invalid_login']);
            header('Location: /dashboard');
            exit;
        } else {
            $_SESSION['invalid_login'] = true;
            header('Location: /');
            exit;
        }
    }

    public function dashboard()
    {
        require_once(BASE_PATH . "/../app/View/dashboard.view.php");
    }

    public function logout()
    {
        if (isset($_SESSION['admin_logado'])) {
            unset($_SESSION['admin_logado']);
            unset($_SESSION['user_logado']);
            header('Location: /');
            exit;
        }
    }
}
