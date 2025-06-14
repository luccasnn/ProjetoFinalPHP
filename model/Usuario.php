<?php
// model/Usuario.php
// Classe de modelo para usuários com PDO

require_once __DIR__ . '/../config/banco.php';

class Usuario {
    private $pdo;

    public function __construct() {
        $this->pdo = new PDO("mysql:host=localhost;dbname=banco-prova", "root", "");
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    // Cadastra novo usuário
    public function cadastrar($nome, $email, $senha, $cpf, $nascimento) {
        $hash = password_hash($senha, PASSWORD_DEFAULT);
        $sql = "INSERT INTO usuarios (nome, email, senha, cpf, nascimento) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$nome, $email, $hash, $cpf, $nascimento]);
    }

    // Verifica login
    public function autenticar($email, $senha) {
        $sql = "SELECT * FROM usuarios WHERE email = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$email]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($usuario && password_verify($senha, $usuario['senha'])) {
            return $usuario;
        }
        return false;
    }

    // Recupera usuário com CPF e nascimento
    public function recuperarSenha($cpf, $nascimento) {
        $sql = "SELECT * FROM usuarios WHERE cpf = ? AND nascimento = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$cpf, $nascimento]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Atualiza a senha
    public function atualizarSenha($id, $novaSenha) {
        $hash = password_hash($novaSenha, PASSWORD_DEFAULT);
        $sql = "UPDATE usuarios SET senha = ? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$hash, $id]);
    }
}
?>
