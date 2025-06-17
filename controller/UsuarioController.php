<?php
// controller/UsuarioController.php
require_once __DIR__ . '/../model/Usuario.php';

class UsuarioController {


    // public static function login() {
    //     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //         $email = $_POST['email'] ?? '';
    //         $senha = $_POST['senha'] ?? '';
    //         $usuario = (new Usuario())->autenticar($email, $senha);
    //         if ($usuario) {
    //             $_SESSION['usuario'] = $usuario;
    //             setcookie("usuario_logado", $usuario['nome'], time() + 3600, "/");
    //             header("Location: index.php");
    //             exit;
    //         } else {
    //             $erro = "Usuário ou senha inválidos.";
    //             require __DIR__ . '/../view/usuario/login.php';
    //         }
    //     } else {
    //         require __DIR__ . '/../view/usuario/login.php';
    //     }
    // }
    /////////////////////////////////
    // public static function novo() {
    //     if (session_status() === PHP_SESSION_NONE) {
    //         session_start();
    //     }

    //     if (!isset($_SESSION['usuario'])) {
    //         header("Location: ?url=login");
    //         exit;
    //     }

    //     $erro = '';

    //     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //         $telefone = $_POST['telefone'] ?? '';
    //         $especialidade = $_POST['especialidade'] ?? '';
    //         $descricao = $_POST['descricao'] ?? '';
    //         $cidade = $_POST['cidade'] ?? '';
    //         $usuarioId = $_SESSION['usuario']['id'];

    //         // Validação simples (pode ser melhorada)
    //         if (empty($telefone) || empty($especialidade) || empty($descricao) || empty($cidade)) {
    //             $erro = "Por favor, preencha todos os campos.";
    //         } else {
    //             try {
    //                 $pdo = new PDO("mysql:host=localhost;dbname=banco-prova;charset=utf8", "root", "");
    //                 $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //                 $sql = "UPDATE usuarios 
    //                         SET telefone = :telefone, 
    //                             especialidade = :especialidade, 
    //                             descricao = :descricao, 
    //                             cidade = :cidade, 
    //                             eh_profissional = 1 
    //                         WHERE id = :id";

    //                 $stmt = $pdo->prepare($sql);
    //                 $stmt->execute([
    //                     ':telefone' => $telefone,
    //                     ':especialidade' => $especialidade,
    //                     ':descricao' => $descricao,
    //                     ':cidade' => $cidade,
    //                     ':id' => $usuarioId
    //                 ]);

    //                 if ($stmt->rowCount() > 0) {
    //                     $_SESSION['usuario']['eh_profissional'] = 1;
    //                     header("Location: ?url=dashboard");
    //                     exit;
    //                 } else {
    //                     $erro = "Nenhuma alteração foi feita no banco.";
    //                 }

    //             } catch (PDOException $e) {
    //                 $erro = "Erro no banco de dados: " . $e->getMessage();
    //             }
    //         }
    //     }

    //     require __DIR__ . '/../view/professional/novo.php';
    // }
    public static function novo() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['usuario'])) {
            header("Location: ?url=login");
            exit;
        }

        $erro = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $telefone = $_POST['telefone'] ?? '';
            $especialidade = $_POST['especialidade'] ?? '';
            $descricao = $_POST['descricao'] ?? '';
            $cidade = $_POST['cidade'] ?? '';
            $usuarioId = $_SESSION['usuario']['id'];

            if (empty($telefone) || empty($especialidade) || empty($descricao) || empty($cidade)) {
                $erro = "Por favor, preencha todos os campos.";
            } else {
                try {
                    $pdo = new PDO("mysql:host=localhost;dbname=banco-prova;charset=utf8", "root", "");
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    $sql = "UPDATE usuarios 
                            SET telefone = :telefone, 
                                especialidade = :especialidade, 
                                descricao = :descricao, 
                                cidade = :cidade, 
                                eh_profissional = 1 
                            WHERE id = :id";

                    $stmt = $pdo->prepare($sql);
                    $stmt->execute([
                        ':telefone' => $telefone,
                        ':especialidade' => $especialidade,
                        ':descricao' => $descricao,
                        ':cidade' => $cidade,
                        ':id' => $usuarioId
                    ]);

                    if ($stmt->rowCount() > 0) {
                        $_SESSION['usuario']['eh_profissional'] = 1;
                        header("Location: ?url=dashboard");
                        exit;
                    } else {
                        $erro = "Nenhuma alteração foi feita.";
                    }

                } catch (PDOException $e) {
                    $erro = "Erro no banco: " . $e->getMessage();
                }
            }
        }

    require __DIR__ . '/../view/profissional/novo.php';
    }
    public static function excluir() {
        if (!isset($_GET['id'])) {
            header("Location: ?url=admin-usuarios");
            exit;
        }

        $id = $_GET['id'];

        try {
            $pdo = new PDO("mysql:host=localhost;dbname=banco-prova;charset=utf8", "root", "");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $pdo->prepare("DELETE FROM usuarios WHERE id = :id");
            $stmt->execute([':id' => $id]);

        } catch (PDOException $e) {
            die("Erro ao excluir usuário: " . $e->getMessage());
        }

        header("Location: ?url=admin-usuarios");
        exit;
    }
    public static function editar() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['usuario'])) {
            header("Location: ?url=login");
            exit;
        }

        if (!isset($_GET['id'])) {
            echo "ID do usuário não fornecido.";
            exit;
        }

        $id = $_GET['id'];

        try {
            $pdo = new PDO("mysql:host=localhost;dbname=banco-prova;charset=utf8", "root", "");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $nome = $_POST['nome'] ?? '';
                $email = $_POST['email'] ?? '';

                $stmt = $pdo->prepare("UPDATE usuarios SET nome = :nome, email = :email WHERE id = :id");
                $stmt->execute([
                    ':nome' => $nome,
                    ':email' => $email,
                    ':id' => $id
                ]);

                header("Location: ?url=admin-usuarios");
                exit;
            }

            $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE id = :id");
            $stmt->execute([':id' => $id]);
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$usuario) {
                echo "Usuário não encontrado.";
                exit;
            }

            require __DIR__ . '/../view/admin/usuarios/editar.php';

        } catch (PDOException $e) {
            echo "Erro no banco: " . $e->getMessage();
        }
    }


    public static function index() {
        try {
            $pdo = new PDO("mysql:host=localhost;dbname=banco-prova;charset=utf8", "root", "");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $pdo->query("SELECT * FROM usuarios");
            $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

            require __DIR__ . '/../view/admin/usuarios/index.php';

        } catch (PDOException $e) {
            die("Erro na conexão com o banco: " . $e->getMessage());
        }
    }


    public static function login() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
                die("Erro de segurança CSRF detectado.");
            }

            $email = $_POST['email'] ?? '';
            $senha = $_POST['senha'] ?? '';
            $usuario = (new Usuario())->autenticar($email, $senha);
                
            if ($usuario) {
                require_once __DIR__ . '/../helpers/helpers.php';
                $_SESSION['usuario'] = $usuario;
                $_SESSION['usuario']['eh_profissional'] = usuarioEhProfissional($email);

                setcookie("usuario_logado", $usuario['nome'], time() + 3600, "/");

                header("Location: index.php");
                exit;
            } else {
                $erro = "Usuário ou senha inválidos.";
                require __DIR__ . '/../view/usuario/login.php';
            }
        } else {
            // Gera token CSRF para o formulário de login
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
            $erro = '';
            require __DIR__ . '/../view/usuario/login.php';
        }
    }

    public static function cadastro() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
                die("Erro de segurança CSRF detectado.");
            }

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
            // Gera token CSRF para o formulário de cadastro
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
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
