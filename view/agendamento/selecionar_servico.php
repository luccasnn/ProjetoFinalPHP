<h2>Escolha um serviço</h2>
<?php require_once __DIR__ . '/../header.php'; ?> 
<?php foreach ($servicos as $servico): ?>
    <a href="?url=agendamento/formulario/<?= $servico['id'] ?>" style="display: flex; align-items: center; border: 1px solid #ccc; margin: 10px 0; padding: 10px; border-radius: 8px; text-decoration: none; color: inherit;">
        <?php if (!empty($servico['icone'])): ?>
            <img 
                src="<?= htmlspecialchars($servico['icone']) ?>" 
                alt="Ícone do serviço <?= htmlspecialchars($servico['titulo']) ?>" 
                style="width: 50px; height: 50px; margin-right: 15px; object-fit: contain;"
                loading="lazy"
            >
        <?php endif; ?>
        <div>
            <strong><?= htmlspecialchars($servico['titulo']) ?></strong>
        </div>
    </a>
<?php endforeach; ?>

<?php require_once __DIR__ . '/../footer.php'; ?>