<?php
// model/Feedback.php
// Model para envio de imagem de feedback

require_once __DIR__ . '/../config/banco.php';

class Feedback {
    private $pdo;

    public function __construct() {
        $this->pdo = new PDO("mysql:host=localhost;dbname=banco-prova", "root", "");
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function salvar($usuario_id, $descricao, $imagem_nome) {
        $sql = "INSERT INTO feedbacks (usuario_id, descricao, imagem) VALUES (?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$usuario_id, $descricao, $imagem_nome]);
    }

    public function listar() {
        $sql = "SELECT f.*, u.nome FROM feedbacks f JOIN usuarios u ON f.usuario_id = u.id ORDER BY f.data_envio DESC";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
