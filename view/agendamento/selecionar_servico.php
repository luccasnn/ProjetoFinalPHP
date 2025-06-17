<?php require_once __DIR__ . '/../header.php'; ?>
<h1>Selecione um serviço para agendar</h1>

<ul style="list-style: none; padding-left: 0;">
<?php foreach ($servicos as $servico): ?>
    <li style="margin-bottom: 15px;">
        <a href="?url=agendamento/formulario/<?= $servico['id'] ?>" style="display: flex; align-items: center; text-decoration: none; color: inherit;">
            <?php if (!empty($servico['icone'])): ?>
                <img 
                    src="<?= htmlspecialchars($servico['icone']) ?>" 
                    alt="Ícone do serviço <?= htmlspecialchars($servico['titulo']) ?>" 
                    style="max-height: 40px; max-width: 40px; margin-right: 12px; border-radius: 5px; object-fit: contain;"
                    onerror="this.onerror=null; this.src='https://via.placeholder.com/40?text=No+Img';" 
                >
            <?php else: ?>
                <div style="width: 40px; height: 40px; background: #ccc; margin-right: 12px; border-radius: 5px; display: flex; align-items: center; justify-content: center; color: #666; font-weight: bold;">
                    ?
                </div>
            <?php endif; ?>
            <span><?= htmlspecialchars($servico['titulo']) ?></span>
        </a>
    </li>
<?php endforeach; ?>
</ul>

<?php require_once __DIR__ . '/../footer.php'; ?>
