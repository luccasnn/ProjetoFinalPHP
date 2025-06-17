<?php
if (session_status() === PHP_SESSION_NONE) session_start();
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>

<h2>Recuperar Senha</h2>
<form method="POST">
    <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">

    <?php if (empty($resetar)): ?>
        <label>CPF:</label>
        <input type="text" name="cpf" required><br>

        <label>Data de Nascimento:</label>
        <input type="date" name="nascimento" required><br>

        <button type="submit">Verificar</button>

    <?php else: ?>
        <label>Nova Senha:</label>
        <input type="password" name="novaSenha" required><br>
        <button type="submit">Redefinir Senha</button>
    <?php endif; ?>

    <?php if (!empty($erro)) echo "<p style='color:red;'>$erro</p>"; ?>
</form>

<p><a href="?url=login">← Voltar para Login</a></p>
