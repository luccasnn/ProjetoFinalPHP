<?php
require_once __DIR__ . '/../model/Servico.php';

class ServicoController {

    public static function index() {
        $servicos = (new Servico())->listar();
        require __DIR__ . '/../view/servico/listar.php';
    }

    public static function novo() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dados = $_POST;
            (new Servico())->cadastrar($dados);
            header("Location: ?url=servicos");
            exit;
        }
        require __DIR__ . '/../view/servico/novo.php';
    }

    public static function editar() {
        $id = isset($_GET['id']) ? intval($_GET['id']) : null;
        $model = new Servico();

        if (!$id) {
            header("Location: ?url=servicos");
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $model->atualizar($id, $_POST);
            header("Location: ?url=servicos");
            exit;
        }

        $servico = $model->buscar($id);
        if (!$servico) {
            header("Location: ?url=servicos");
            exit;
        }
        require __DIR__ . '/../view/servico/editar.php';
    }

    public static function excluir() {
        $id = isset($_GET['id']) ? intval($_GET['id']) : null;
        if ($id) {
            (new Servico())->excluir($id);
        }
        header("Location: ?url=servicos");
        exit;
    }

}
