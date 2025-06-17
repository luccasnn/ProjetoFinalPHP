<h2>Excluir Agendamento</h2>

<p>Tem certeza que deseja excluir este agendamento?</p>

<p><strong>Data:</strong> <?= htmlspecialchars($agendamento['data_agendamento'] ?? '') ?></p>
<p><strong>Hora:</strong> <?= htmlspecialchars($agendamento['hora_agendamento'] ?? '') ?></p>
<p><strong>Descrição:</strong> <?= htmlspecialchars($agendamento['descricao'] ?? '') ?></p>

<form method="POST">
    <input type="hidden" name="id" value="<?= htmlspecialchars($agendamento['id'] ?? '') ?>">
    <button type="submit">Confirmar Exclusão</button>
    <a href="?url=admin-agendamentos">Cancelar</a>
</form>
<?php require_once __DIR__ . '/../header.php'; ?>
<?php require_once __DIR__ . '/../footer.php'; ?>