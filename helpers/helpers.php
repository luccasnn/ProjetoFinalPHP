<?php 
function usuarioEhProfissional(string $email): bool {
    $pdo = new PDO("mysql:host=localhost;dbname=banco-prova;charset=utf8", "root", "");
    $stmt = $pdo->prepare("SELECT eh_profissional FROM usuarios WHERE email = ?");
    $stmt->execute([$email]);
    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

    return $resultado && isset($resultado['eh_profissional']) && $resultado['eh_profissional'] == 1;
}