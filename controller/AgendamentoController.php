<?php
require_once __DIR__ . '/../model/Usuario.php';
require_once __DIR__ . '/../model/Servico.php';
require_once __DIR__ . '/../model/Agendamento.php';

class AgendamentoController {

    public static function index() {
        $model = new Agendamento();
        $agendamentos = $model->listarTodos();  // usar método do model que já está correto
        $viewPath = __DIR__ . '/../view/admin/agendamentos/index.php';
        if (file_exists($viewPath)) {
            require $viewPath;
        } else {
            echo "<h1>Erro: arquivo de visualização não encontrado.</h1>";
        }
    }

    public static function listarServicos() {
        $servicoModel = new Servico();
        $servicos = $servicoModel->listarAtivos();

        $viewPath = __DIR__ . '/../view/agendamento/selecionar_servico.php';
        if (file_exists($viewPath)) {
            require $viewPath;
        } else {
            echo "<h1>Erro: arquivo de visualização não encontrado.</h1>";
        }
    }

    // Removido método listarTodosComDetalhes daqui porque não deve estar no controller, e sim no model

    public static function formularioAgendamento($servico_id) {
        $servicoModel = new Servico();
        $servico = $servicoModel->buscar($servico_id);
        if (!$servico) {
            http_response_code(404);
            echo "<h1>Serviço não encontrado.</h1>";
            exit;
        }

        $viewPath = __DIR__ . '/../view/agendamento/formulario.php';
        if (file_exists($viewPath)) {
            require $viewPath;
        } else {
            echo "<h1>Erro: arquivo de visualização não encontrado.</h1>";
        }
    }

    public static function salvarAgendamento() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            if (!isset($_SESSION['usuario'])) {
                header("Location: ?url=login");
                exit;
            }

            $usuario_id = $_SESSION['usuario']['id'];
            $servico_id = filter_input(INPUT_POST, 'servico_id', FILTER_VALIDATE_INT);
            $data = filter_input(INPUT_POST, 'data', FILTER_SANITIZE_STRING);
            $hora = filter_input(INPUT_POST, 'hora', FILTER_SANITIZE_STRING);

            if (!$servico_id || !$data || !$hora) {
                echo "<h1>Dados inválidos.</h1>";
                exit;
            }

            $agendamentoModel = new Agendamento();
            $sucesso = $agendamentoModel->cadastrar($usuario_id, $servico_id, $data, $hora);

            if ($sucesso) {
                echo "<h1>Agendamento realizado com sucesso!</h1>";
                echo "<a href='?url=meus-agendamentos'>Ver meus agendamentos</a>";
            } else {
                echo "<h1>Erro ao realizar agendamento.</h1>";
            }
        } else {
            http_response_code(405);
            echo "<h1>Método não permitido.</h1>";
        }
    }
    public static function listarTodos() {
        $conn = Banco::getConn(); // retorna objeto mysqli

        $resultado = $conn->query("SELECT * FROM agendamentos ORDER BY data_agendamento DESC, hora_agendamento DESC");
        if (!$resultado) {
            die("Erro na consulta: " . $conn->error);
        }

        $agendamentos = [];
        while ($row = $resultado->fetch_assoc()) {
            $agendamentos[] = $row;
        }
        return $agendamentos;
    }



    public static function listarAgendamentosUsuario() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION['usuario'])) {
            header("Location: ?url=login");
            exit;
        }
        $usuario_id = $_SESSION['usuario']['id'];
        $agendamentoModel = new Agendamento();
        $agendamentos = $agendamentoModel->listarPorUsuario($usuario_id);

        $viewPath = __DIR__ . '/../view/agendamento/listar.php';
        if (file_exists($viewPath)) {
            require $viewPath;
        } else {
            echo "<h1>Erro: arquivo de visualização não encontrado.</h1>";
        }
    }
    public static function editar() {
        $usuarioModel = new Usuario();
        $usuarios = $usuarioModel->listarTodos();
        $servicoModel = new Servico();
        $servicos = $servicoModel->listarTodos();   
        if (!isset($_GET['id'])) {
            header("Location: ?url=admin/agendamentos");
            exit;
        }

        $id = $_GET['id'];
        $agendamentoModel = new Agendamento();
        $agendamento = $agendamentoModel->buscar($id);

        if (!$agendamento) {
            header("Location: ?url=admin/agendamentos&erro=agendamento_nao_encontrado");
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario_id = $_POST['usuario_id'] ?? '';
            $servico_id = $_POST['servico_id'] ?? '';
            $data_agendamento = $_POST['data_agendamento'] ?? '';
            $hora_agendamento = $_POST['hora_agendamento'] ?? '';
            $status = $_POST['status'] ?? '';

            try {
                $pdo = new PDO("mysql:host=localhost;dbname=banco-prova;charset=utf8", "root", "");
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $stmt = $pdo->prepare("UPDATE agendamentos 
                    SET usuario_id = :usuario_id, servico_id = :servico_id, 
                        data_agendamento = :data, hora_agendamento = :hora, status = :status 
                    WHERE id = :id");

                $stmt->execute([
                    ':usuario_id' => $usuario_id,
                    ':servico_id' => $servico_id,
                    ':data' => $data_agendamento,
                    ':hora' => $hora_agendamento,
                    ':status' => $status,
                    ':id' => $id
                ]);

                header("Location: ?url=admin/agendamentos&sucesso=editado");
                exit;

            } catch (PDOException $e) {
                die("Erro ao atualizar agendamento: " . $e->getMessage());
            }
        }

        require __DIR__ . '/../view/admin/agendamentos/editar.php';
    }


    public static function excluir() {
        if (!isset($_GET['id']) && !isset($_POST['id'])) {
            header("Location: ?url=admin-agendamentos");
            exit;
        }

        try {
            $pdo = new PDO("mysql:host=localhost;dbname=banco-prova;charset=utf8", "root", "");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $id = $_POST['id'];

                $stmt = $pdo->prepare("DELETE FROM agendamentos WHERE id = :id");
                $stmt->execute([':id' => $id]);

                header("Location: ?url=admin-agendamentos");
                exit;
            } else {
                $id = $_GET['id'];

                $stmt = $pdo->prepare("SELECT * FROM agendamentos WHERE id = :id");
                $stmt->execute([':id' => $id]);
                $agendamento = $stmt->fetch(PDO::FETCH_ASSOC);

                if (!$agendamento) {
                    die("Agendamento não encontrado.");
                }

                require __DIR__ . '/../view/admin/agendamentos/excluir.php';
            }

        } catch (PDOException $e) {
            die("Erro ao excluir agendamento: " . $e->getMessage());
        }
    }






    
    
}
?>
