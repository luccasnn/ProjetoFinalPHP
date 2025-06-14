<?php
// model/Profissional.php
// Classe para CRUD de profissionais usando PDO

require_once __DIR__ . '/../config/banco.php';

class Profissional {
    private $pdo;

    public function __construct() {
        $this->pdo = new PDO("mysql:host=localhost;dbname=banco-prova", "root", "");
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function listar() {
        $stmt = $this->pdo->query("SELECT * FROM profissionais ORDER BY nome");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscar($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM profissionais WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function cadastrar($dados) {
        $sql = "INSERT INTO profissionais (nome, email, telefone, especialidade, descricao, cidade) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            $dados['nome'], $dados['email'], $dados['telefone'],
            $dados['especialidade'], $dados['descricao'], $dados['cidade']
        ]);
    }

    public function atualizar($id, $dados) {
        $sql = "UPDATE profissionais SET nome=?, email=?, telefone=?, especialidade=?, descricao=?, cidade=? WHERE id=?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            $dados['nome'], $dados['email'], $dados['telefone'],
            $dados['especialidade'], $dados['descricao'], $dados['cidade'], $id
        ]);
    }

    public function excluir($id) {
        $stmt = $this->pdo->prepare("DELETE FROM profissionais WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>
