<?php
require_once __DIR__ . '/../config/banco.php';

class Agendamento {
    private $pdo;

    public function __construct() {
        $this->pdo = new PDO("mysql:host=localhost;dbname=banco-prova;charset=utf8", "root", "");
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    // Listar agendamentos de um usuário
    public function listarPorUsuario($usuario_id) {
        $sql = "SELECT a.*, s.titulo AS servico_titulo 
                FROM agendamentos a
                JOIN servicos s ON a.servico_id = s.id
                WHERE a.usuario_id = ?
                ORDER BY a.data_agendamento, a.hora_agendamento";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$usuario_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Cadastrar novo agendamento
    public function cadastrar($usuario_id, $servico_id, $data, $hora) {
        $sql = "INSERT INTO agendamentos (usuario_id, servico_id, data_agendamento, hora_agendamento) VALUES (?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$usuario_id, $servico_id, $data, $hora]);
    }

    // Ver agendamento por ID (opcional)
    public function buscar($id) {
        $sql = "SELECT * FROM agendamentos WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function listarTodos() {
    $sql = "SELECT a.*, u.nome as usuario_nome 
            FROM agendamentos a 
            JOIN usuarios u ON a.usuario_id = u.id 
            JOIN servicos s ON a.servico_id = s.id";
    $stmt = $this->pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


}
?>
