<h2>Lista de Agendamentos</h2>

<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Usuário</th>
        <th>Serviço</th>
        <th>Data</th>
        <th>Hora</th>
    </tr>
    <?php foreach ($agendamentos as $ag): ?>
        <tr>
            <td><?= $ag['id'] ?></td>
            <td><?= htmlspecialchars($ag['usuario_nome']) ?></td>
            <td><?= htmlspecialchars($ag['servico_nome']) ?></td>
            <td><?= htmlspecialchars($ag['data']) ?></td>
            <td><?= htmlspecialchars($ag['hora']) ?></td>
        </tr>
    <?php endforeach; ?>
</table>
