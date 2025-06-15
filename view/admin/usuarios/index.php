<?php require __DIR__ . '/../../header.php'; ?>

<h1>Usuários cadastrados</h1>
<a href="?url=admin/usuarios-novo">Novo usuário</a>
<table border="1" cellpadding="5">
    <thead>
        <tr>
            <th>ID</th><th>Nome</th><th>Email</th><th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($usuarios as $usuario): ?>
        <tr>
            <td><?= htmlspecialchars($usuario['id']) ?></td>
            <td><?= htmlspecialchars($usuario['nome']) ?></td>
            <td><?= htmlspecialchars($usuario['email']) ?></td>
            <td>
                <a href="?url=admin/usuarios-editar&id=<?= $usuario['id'] ?>">Editar</a> |
                <a href="?url=admin/usuarios-excluir&id=<?= $usuario['id'] ?>" onclick="return confirm('Excluir usuário?')">Excluir</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require __DIR__ . '/../../footer.php'; ?>
