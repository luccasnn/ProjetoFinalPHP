<h1>Meus Agendamentos</h1>
<?php require_once __DIR__ . '/../header.php'; ?>

<p><a href="index.php?url=home" style="text-decoration:none; color: blue;">&larr; Voltar para o início</a></p>

<?php if (empty($agendamentos)): ?>
    <p>Você não possui agendamentos.</p>
<?php else: ?>
    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>Serviço</th>
                <th>Data</th>
                <th>Hora</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($agendamentos as $ag): ?>
                <tr>
                    <td><?= htmlspecialchars($ag['servico_titulo']) ?></td>
                    <td><?= htmlspecialchars($ag['data_agendamento']) ?></td>
                    <td><?= htmlspecialchars($ag['hora_agendamento']) ?></td>
                    <td><?= htmlspecialchars($ag['status']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php require_once __DIR__ . '/../footer.php'; ?>
<?php endif; ?>
