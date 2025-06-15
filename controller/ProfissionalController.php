<?php
// controller/ProfissionalController.php

// require_once __DIR__ . '/../model/Profissional.php';

// class ProfissionalController {

//     public static function index() {
//         $profissionais = (new Profissional())->listar();
//         require __DIR__ . '/../view/profissional/listar.php';
//     }

//    public static function novo() {
//     if (!isset($_SESSION['usuario'])) {
//         header("Location: ?url=login");
//         exit;
//     }

//     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//         $usuario_id = $_SESSION['usuario']['id'];
//         $nome = $_POST['nome'];
//         $email = $_POST['email'];
//         $telefone = $_POST['telefone'];
//         $especialidade = $_POST['especialidade'];
//         $descricao = $_POST['descricao'];
//         $cidade = $_POST['cidade'];

//         $pdo = new PDO("mysql:host=localhost;dbname=banco-prova", "root", "");
//         $stmt = $pdo->prepare("INSERT INTO profissionais (usuario_id, nome, email, telefone, especialidade, descricao, cidade) 
//                                VALUES (?, ?, ?, ?, ?, ?, ?)");
//         $stmt->execute([$usuario_id, $nome, $email, $telefone, $especialidade, $descricao, $cidade]);

//         $_SESSION['profissional_id'] = $pdo->lastInsertId();

//         header("Location: ?url=servicos-admin/novo");
//         exit;
//     } else {
//         require __DIR__ . '/../view/profissional/novo.php';
//     }
//     }

//     public static function editar() {
//         $id = $_GET['id'] ?? null;
//         $model = new Profissional();

//         if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//             $model->atualizar($id, $_POST);
//             header("Location: ?url=profissionais");
//             exit;
//         }

//         $profissional = $model->buscar($id);
//         require __DIR__ . '/../view/profissional/editar.php';
//     }

//     public static function excluir() {
//         $id = $_GET['id'] ?? null;
//         if ($id) {
//             (new Profissional())->excluir($id);
//         }
//         header("Location: ?url=profissionais");
//         exit;
//     }
// }

require_once __DIR__ . '/../config/banco.php';
require_once __DIR__ . '/../model/Profissional.php';

class ProfissionalController {

    public static function index() {
        $profissionais = (new Profissional())->listar();
        require __DIR__ . '/../view/profissional/listar.php';
    }

    public static function novo() {
        session_start();

        if (!isset($_SESSION['usuario'])) {
            header("Location: ?url=login");
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = $_POST['nome'] ?? '';
            $email = $_POST['email'] ?? '';
            $telefone = $_POST['telefone'] ?? '';
            $especialidade = $_POST['especialidade'] ?? '';
            $descricao = $_POST['descricao'] ?? '';
            $cidade = $_POST['cidade'] ?? '';

            // Conexão direta PDO (você pode ajustar host/db/usuario/senha)
            $pdo = new PDO("mysql:host=localhost;dbname=banco-prova;charset=utf8", "root", "");

            $sql = "INSERT INTO profissionais (nome, email, telefone, especialidade, descricao, cidade) 
                    VALUES (:nome, :email, :telefone, :especialidade, :descricao, :cidade)";
            $stmt = $pdo->prepare($sql);

            $sucesso = $stmt->execute([
                ':nome' => $nome,
                ':email' => $email,
                ':telefone' => $telefone,
                ':especialidade' => $especialidade,
                ':descricao' => $descricao,
                ':cidade' => $cidade
            ]);

            if ($sucesso) {
                $_SESSION['profissional_id'] = $pdo->lastInsertId();
                header("Location: ?url=servicos-admin/novo");
                exit;
            } else {
                $erro = "Erro ao cadastrar profissional.";
            }
        }

        require __DIR__ . '/../view/profissional/novo.php';
    }

    public static function editar() {
        session_start();
        $id = $_GET['id'] ?? null;

        if (!$id) {
            header("Location: ?url=profissionais");
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            (new Profissional())->atualizar($id, $_POST);
            header("Location: ?url=profissionais");
            exit;
        }

        $profissional = (new Profissional())->buscar($id);
        require __DIR__ . '/../view/profissional/editar.php';
    }

    public static function excluir() {
        $id = $_GET['id'] ?? null;

        if ($id) {
            (new Profissional())->excluir($id);
        }

        header("Location: ?url=profissionais");
        exit;
    }
}
?>