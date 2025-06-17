<h2>Editar Usuário</h2>

<form method="POST">
    <label>Nome:</label><br>
    <input type="text" name="nome" value="<?= htmlspecialchars($usuario['nome']) ?>" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" value="<?= htmlspecialchars($usuario['email']) ?>" required><br><br>

    <button type="submit">Salvar Alterações</button>
</form>

<br>
<a href="?url=admin-usuarios">← Voltar à lista de usuários</a>
