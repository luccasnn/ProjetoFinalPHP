<h1>Meus Agendamentos</h1>

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
<?php endif; ?>
