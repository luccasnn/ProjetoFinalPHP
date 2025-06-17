<?php

// Inicia a sessão se ainda não estiver ativa
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Inicializa variável de erro
$erro = '';

// Verifica se o formulário foi enviado via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitiza as entradas
    $login = trim($_POST['login'] ?? '');
    $senha = trim($_POST['senha'] ?? '');

    // Usuário e senha fixos (ideal: usar hash)
    $usuarioAdmin = 'admin';
    $senhaAdmin = '123456';

    if ($login === $usuarioAdmin && $senha === $senhaAdmin) {
        $_SESSION['admin_logado'] = true;

        // Redireciona para o painel admin
        header('Location: /ProPulse/ProPulse/view/admin/admin-painel.php');

        exit;
    } else {
        $erro = 'Login ou senha incorretos.';
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    
    <meta charset="UTF-8">
    <title>Login Admin</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h2>Login do Administrador</h2>

    <?php if (!empty($erro)): ?>
        <div class="erro"><?= htmlspecialchars($erro, ENT_QUOTES, 'UTF-8') ?></div>
    <?php endif; ?>

    <form method="POST">
        <label for="login">Login:</label>
        <input type="text" name="login" id="login" required>

        <label for="senha">Senha:</label>
        <input type="password" name="senha" id="senha" required>

        <button type="submit">Entrar</button>
    </form>
    
    

</body>
</html>
