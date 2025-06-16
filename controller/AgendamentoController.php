<?php
require_once __DIR__ . '/../model/Agendamento.php';
require_once __DIR__ . '/../model/Servico.php';

class AgendamentoController {
    public static function listarServicos() {
        $servicoModel = new Servico();
        $servicos = $servicoModel->listarAtivos();

        // Verifique se o arquivo existe antes de incluir
        $viewPath = __DIR__ . '/../view/agendamento/selecionar_servico.php';
        if (file_exists($viewPath)) {
            require $viewPath;
        } else {
            echo "<h1>Erro: arquivo de visualização não encontrado.</h1>";
        }
    }

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
}
?>
