<?php require_once __DIR__ . '/../header.php'; ?>

<h1>
    <?php if (!empty($servico['icone'])): ?>
        <img src="<?= htmlspecialchars($servico['icone']) ?>" alt="Ícone do serviço" style="max-height: 40px; vertical-align: middle; margin-right: 10px;">
    <?php endif; ?>
    Agendar serviço: <?= htmlspecialchars($servico['titulo']) ?>
</h1>

<form method="POST" action="?url=agendamento/salvar">
    <input type="hidden" name="servico_id" value="<?= $servico['id'] ?>">
    <label>Data:
        <input type="date" name="data" required min="<?= date('Y-m-d') ?>">
    </label><br><br>
    <label>Hora:
        <input type="time" name="hora" required>
    </label><br><br>
    <button type="submit">Agendar</button>
</form>

<?php require_once __DIR__ . '/../footer.php'; ?>
