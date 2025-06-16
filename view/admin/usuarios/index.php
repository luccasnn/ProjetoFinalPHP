<h2>Usuários Cadastrados</h2>

<a href="?url=admin-usuarios-novo">Cadastrar Novo Usuário</a><br><br>

<table border="1" cellpadding="5" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th><th>Nome</th><th>Email</th><th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($usuarios)): ?>
            <?php foreach ($usuarios as $usuario): ?>
                <tr>
                    <td><?= htmlspecialchars($usuario['id']) ?></td>
                    <td><?= htmlspecialchars($usuario['nome']) ?></td>
                    <td><?= htmlspecialchars($usuario['email']) ?></td>
                    <td>
                        <a href="?url=admin-usuarios-editar&id=<?= $usuario['id'] ?>">Editar</a> | 
                        <a href="?url=admin-usuarios-excluir&id=<?= $usuario['id'] ?>" onclick="return confirm('Deseja excluir este usuário?')">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="4">Nenhum usuário encontrado.</td></tr>
        <?php endif; ?>
    </tbody>
</table>