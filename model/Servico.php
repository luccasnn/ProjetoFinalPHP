<?php
// model/Servico.php
// Model para gerenciamento de serviços

require_once __DIR__ . '/../config/banco.php';

class Servico {
    private $pdo;

    public function __construct() {
        $this->pdo = new PDO("mysql:host=localhost;dbname=banco-prova", "root", "");
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    

    // public function listarTodos() {
    //     $stmt = $this->pdo->query("SELECT * FROM servicos"); // Ajuste o nome da tabela, se for diferente
    //     return $stmt->fetchAll(PDO::FETCH_ASSOC);
    // }

    public function listarTodos() {
        $sql = "SELECT id, titulo, icone FROM servicos";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function listar() {
        $stmt = $this->pdo->query("SELECT * FROM servicos ORDER BY titulo");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscar($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM servicos WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function cadastrar($dados) {
        $ativo = isset($dados['ativo']) && ($dados['ativo'] == 'on' || $dados['ativo'] == '1') ? 1 : 0;
        $sql = "INSERT INTO servicos (titulo, descricao, icone, ativo) VALUES (?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            $dados['titulo'], 
            $dados['descricao'] ?? null, 
            $dados['icone'] ?? null, 
            $ativo
        ]);
    }

    public function atualizar($id, $dados) {
        $ativo = isset($dados['ativo']) && ($dados['ativo'] == 'on' || $dados['ativo'] == '1') ? 1 : 0;
        $sql = "UPDATE servicos SET titulo=?, descricao=?, icone=?, ativo=? WHERE id=?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            $dados['titulo'], 
            $dados['descricao'] ?? null, 
            $dados['icone'] ?? null, 
            $ativo, 
            $id
        ]);
    }
    public function listarAtivos() {
        $stmt = $this->pdo->prepare("SELECT id, titulo FROM servicos WHERE ativo = 1");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }



    public function excluir($servicoId) {
    // Verificar se o serviço está em uso em agendamentos
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM agendamentos WHERE servico_id = ?");
        $stmt->execute([$servicoId]);

        if ($stmt->fetchColumn() > 0) {
            throw new Exception("Não é possível excluir este serviço, pois ele está associado a agendamentos.");
        }

        // Excluir se não estiver em uso
        $stmt = $this->pdo->prepare("DELETE FROM servicos WHERE id = ?");
        return $stmt->execute([$servicoId]);
    }
    public static function buscarTodos() {
        global $pdo;
        $stmt = $pdo->query("SELECT * FROM servicos");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function buscarPorId($id) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM servicos WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    
}
?>
