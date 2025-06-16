<?php
class AdminController {
    public static function loginForm() {
        require __DIR__ . '/../view/admin/admin-login.php';
    }

    public static function processarLogin() {
        $email = $_POST['email'] ?? '';
        $senha = $_POST['senha'] ?? '';

        // Login fixo (pode adaptar para banco de dados)
        if ($email === 'admin@admin.com' && $senha === '123') {
            session_start();
            $_SESSION['admin_logado'] = true;
            header('Location: ?url=admin-painel');
            exit;
        } else {
            echo "<p>Email ou senha inválidos.</p>";
            echo "<a href='?url=admin-login'>Voltar</a>";
        }
    }

    public static function painel() {
        session_start();
        if (!isset($_SESSION['admin_logado']) || $_SESSION['admin_logado'] !== true) {
            header('Location: ?url=admin-login');
            exit;
        }

        require __DIR__ . '/../view/admin/admin-painel.php';
    }

    public static function logout() {
        session_start();
        session_destroy();
        header('Location: ?url=home');
        exit;
    }
}
