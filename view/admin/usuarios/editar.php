<h2>Editar Usuário</h2>
<?php require_once __DIR__ . '/../../header.php'; ?>

<form method="POST">
    
    <label>Nome:</label><br>
    <input type="text" name="nome" value="<?= htmlspecialchars($usuario['nome']) ?>" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" value="<?= htmlspecialchars($usuario['email']) ?>" required><br><br>

    <label>CPF:</label><br>
    <input type="text" name="cpf" value="<?= htmlspecialchars($usuario['cpf']) ?>" required><br><br>

    <label>Data de Nascimento:</label><br>
    <input type="date" name="nascimento" value="<?= htmlspecialchars($usuario['nascimento']) ?>" required><br><br>

    <label>É Profissional? </label><br>
    <select name="eh_profissional" required>
        <option value="0" <?= $usuario['eh_profissional'] == 0 ? 'selected' : '' ?>>Não</option>
        <option value="1" <?= $usuario['eh_profissional'] == 1 ? 'selected' : '' ?>>Sim</option>
    </select><br><br>

    <label>Telefone:</label><br>
    <input type="text" name="telefone" value="<?= htmlspecialchars($usuario['telefone']) ?>"><br><br>

    <label>Especialidade:</label><br>
    <input type="text" name="especialidade" value="<?= htmlspecialchars($usuario['especialidade']) ?>"><br><br>

    <label>Descrição:</label><br>
    <textarea name="descricao" rows="4" cols="50"><?= htmlspecialchars($usuario['descricao']) ?></textarea><br><br>

    <label>Cidade:</label><br>
    <input type="text" name="cidade" value="<?= htmlspecialchars($usuario['cidade']) ?>"><br><br>

    <button type="submit">Salvar Alterações</button>
</form>

<br>
<a href="?url=admin-usuarios">← Voltar à lista de usuários</a>

<?php require_once __DIR__ . '/../../footer.php'; ?>