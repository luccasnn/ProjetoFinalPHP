<?php require_once __DIR__ . '/../../header.php'; ?>
<h2>Agendamentos</h2>

<a href="?index.php?url=agendamento">Novo Agendamento</a><br><br>

<table border="1" cellpadding="5" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Usuário</th>
            <th>Serviço</th>
            <th>Data</th>
            <th>Hora</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($agendamentos)): ?>
            <?php foreach ($agendamentos as $agendamento): ?>
                <tr>
                    <td><?= htmlspecialchars($agendamento['id']) ?></td>
                    <td><?= htmlspecialchars($agendamento['usuario_nome']) ?></td>
                    <td><?= htmlspecialchars($agendamento['servico_id']) ?></td> <!-- Aqui mostra apenas o ID do serviço -->
                    <td><?= htmlspecialchars($agendamento['data_agendamento']) ?></td>
                    <td><?= htmlspecialchars($agendamento['hora_agendamento']) ?></td>
                    <td>
                        <a href="?url=admin-agendamentos-editar&id=<?= $agendamento['id'] ?>">Editar</a> |
                        <a href="?url=admin-agendamentos-excluir&id=<?= $agendamento['id'] ?>" onclick="return confirm('Deseja excluir este agendamento?')">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="6">Nenhum agendamento encontrado.</td></tr>
        <?php endif; ?>
    </tbody>
    <?php require_once __DIR__ . '/../../footer.php'; ?>
</table>
