<h2>Usuários Cadastrados</h2>
<?php require_once __DIR__ . '/../../header.php'; ?>
<a href="http://localhost/ProPulse/ProPulse/?url=home">← Voltar ao Início</a><br><br>
<a href="?url=admin-usuarios-novo">Cadastrar Novo Usuário</a><br><br>

<table border="1" cellpadding="5" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>CPF</th>
            <th>Nascimento</th>
            <th>Telefone</th>
            <th>Especialidade</th>
            <th>Cidade</th>
            <th>Profissional?</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($usuarios)): ?>
            <?php foreach ($usuarios as $usuario): ?>
                <tr>
                    <td><?= htmlspecialchars($usuario['id']) ?></td>
                    <td><?= htmlspecialchars($usuario['nome']) ?></td>
                    <td><?= htmlspecialchars($usuario['email']) ?></td>
                    <td><?= htmlspecialchars($usuario['cpf']) ?></td>
                    <td><?= htmlspecialchars($usuario['nascimento']) ?></td>
                    <td><?= htmlspecialchars($usuario['telefone']) ?></td>
                    <td><?= htmlspecialchars($usuario['especialidade']) ?></td>
                    <td><?= htmlspecialchars($usuario['cidade']) ?></td>
                    <td><?= $usuario['eh_profissional'] ? 'Sim' : 'Não' ?></td>
                    <td>
                        <a href="?url=admin-usuarios-editar&id=<?= $usuario['id'] ?>">Editar</a> | 
                        <a href="?url=admin-usuarios-excluir&id=<?= $usuario['id'] ?>" onclick="return confirm('Deseja excluir este usuário?')">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="10">Nenhum usuário encontrado.</td></tr>
        <?php endif; ?>
    </tbody>
</table>

<?php require_once __DIR__ . '/../../footer.php'; ?>