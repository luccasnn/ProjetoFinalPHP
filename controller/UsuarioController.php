<?php
// controller/UsuarioController.php
require_once __DIR__ . '/../model/Usuario.php';

class UsuarioController {


    public static function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $senha = $_POST['senha'] ?? '';
            $usuario = (new Usuario())->autenticar($email, $senha);
            if ($usuario) {
                $_SESSION['usuario'] = $usuario;
                setcookie("usuario_logado", $usuario['nome'], time() + 3600, "/");
                header("Location: index.php");
                exit;
            } else {
                $erro = "Usuário ou senha inválidos.";
                require __DIR__ . '/../view/usuario/login.php';
            }
        } else {
            require __DIR__ . '/../view/usuario/login.php';
        }
    }

    public static function cadastro() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = $_POST['nome'] ?? '';
            $email = $_POST['email'] ?? '';
            $senha = $_POST['senha'] ?? '';
            $cpf = $_POST['cpf'] ?? '';
            $nasc = $_POST['nascimento'] ?? '';
            $usuario = new Usuario();
            $usuario->cadastrar($nome, $email, $senha, $cpf, $nasc);
            header("Location: ?url=login");
            exit;
        } else {
            require __DIR__ . '/../view/usuario/cadastro.php';
        }
    }

    public static function recuperar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $cpf = $_POST['cpf'] ?? '';
            $nasc = $_POST['nascimento'] ?? '';
            $usuario = (new Usuario())->recuperarSenha($cpf, $nasc);
            if ($usuario) {
                $nova = $_POST['novaSenha'] ?? '';
                if (!empty($nova)) {
                    (new Usuario())->atualizarSenha($usuario['id'], $nova);
                    header("Location: ?url=login");
                    exit;
                } else {
                    $resetar = true;
                    require __DIR__ . '/../view/usuario/recuperar_senha.php';
                }
            } else {
                $erro = "Dados não encontrados.";
                require __DIR__ . '/../view/usuario/recuperar_senha.php';
            }
        } else {
            require __DIR__ . '/../view/usuario/recuperar_senha.php';
        }
    }

    public static function logout() {
        session_destroy();
        setcookie("usuario_logado", "", time() - 3600, "/");
        header("Location: ?url=home");
    }
}
?>
