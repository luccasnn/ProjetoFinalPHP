<?php if (!empty($erro)): ?>
    <div style="color: red;"><?php echo htmlspecialchars($erro); ?></div>
<?php endif; ?>

<?php if ($resetar): ?>
    <!-- Form para nova senha -->
    <form method="POST">
        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
        <label>Nova Senha:</label>
        <input type="password" name="novaSenha" required minlength="4">
        <button type="submit">Redefinir senha</button>
    </form>
<?php else: ?>
    <!-- Form para CPF + nascimento -->
    <form method="POST">
        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
        <label>CPF:</label>
        <input type="text" name="cpf" required>
        <label>Data de Nascimento:</label>
        <input type="date" name="nascimento" required>
        <button type="submit">Verificar</button>
    </form>
<?php endif; ?>
