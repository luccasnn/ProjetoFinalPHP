<?php
session_start();

$erro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = $_POST['login'] ?? '';
    $senha = $_POST['senha'] ?? '';

    // Usuário e senha fixos, por exemplo:
    $usuarioAdmin = 'admin';
    $senhaAdmin = '123456';  // ideal usar hash, mas aqui simples

    if ($login === $usuarioAdmin && $senha === $senhaAdmin) {
        $_SESSION['admin_logado'] = true;
        header('Location: admin-painel.php');
        exit;
    } else {
        $erro = 'Login ou senha incorretos.';
    }
}
?>

<!DOCTYPE html>
<html>
<head><title>Login Admin</title></head>
<body>
<h2>Login Admin</h2>
<?php if ($erro): ?>
<p style="color:red"><?= htmlspecialchars($erro) ?></p>
<?php endif; ?>
<form method="POST">
    Login: <input type="text" name="login" required><br>
    Senha: <input type="password" name="senha" required><br>
    <button type="submit">Entrar</button>
</form>
</body>
</html>
