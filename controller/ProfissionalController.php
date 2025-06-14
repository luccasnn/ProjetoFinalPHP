<?php
// controller/ProfissionalController.php

require_once __DIR__ . '/../model/Profissional.php';

class ProfissionalController {

    public static function index() {
        $profissionais = (new Profissional())->listar();
        require __DIR__ . '/../view/profissional/listar.php';
    }

    public static function novo() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dados = $_POST;
            (new Profissional())->cadastrar($dados);
            header("Location: ?url=profissionais");
            exit;
        }
        require __DIR__ . '/../view/profissional/novo.php';
    }

    public static function editar() {
        $id = $_GET['id'] ?? null;
        $model = new Profissional();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $model->atualizar($id, $_POST);
            header("Location: ?url=profissionais");
            exit;
        }
        $profissional = $model->buscar($id);
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
