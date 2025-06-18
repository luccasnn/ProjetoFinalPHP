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
    public function listarTodos() {
        $stmt = $this->pdo->query("SELECT * FROM servicos");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
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
        if (!isset($_GET['id'])) {
            header("Location: ?url=admin-usuarios");
            exit;
        }

        $id = $_GET['id'];

        try {
            $pdo = new PDO("mysql:host=localhost;dbname=banco-prova;charset=utf8", "root", "");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Verifica se há agendamentos vinculados ao usuário
            $stmt = $pdo->prepare("SELECT COUNT(*) FROM agendamentos WHERE usuario_id = :id");
            $stmt->execute([':id' => $id]);
            $temAgendamentos = $stmt->fetchColumn();

            if ($temAgendamentos > 0) {
                echo "<p>Não é possível excluir o usuário. Existem agendamentos vinculados a ele.</p>";
                echo "<a href='?url=admin/usuarios'>Voltar</a>";
                exit;
            }

            // Se não houver agendamentos, realiza a exclusão
            $stmt = $pdo->prepare("DELETE FROM usuarios WHERE id = :id");
            $stmt->execute([':id' => $id]);

        } catch (PDOException $e) {
            die("Erro ao excluir usuário: " . $e->getMessage());
        }

        header("Location: ?url=admin-usuarios");
        exit;
    }
    public static function contratar() {
        $servicoModel = new Servico();
        $servicos = $servicoModel->listarTodos(); // Deve retornar também o campo 'icone'
        require_once __DIR__ . '/../view/servico/contratar.php';
    }

}
