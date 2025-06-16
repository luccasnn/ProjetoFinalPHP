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
    public function listarTodos() {
        $sql = "SELECT * FROM agendamentos ORDER BY data_agendamento DESC, hora_agendamento DESC";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
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

    public static function excluir($id) {
        $agendamentoModel = new Agendamento();
        $agendamentoModel->excluir($id);
        header("Location: ?url=admin-agendamentos");
        exit;
    }
}
?>
