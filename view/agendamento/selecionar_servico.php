<h1>Selecione um serviço para agendar</h1>

<ul>
<?php foreach ($servicos as $servico): ?>
    <li>
        <a href="?url=agendamento/formulario/<?= $servico['id'] ?>">
            <?= htmlspecialchars($servico['titulo']) ?>
        </a>
    </li>
<?php endforeach; ?>
</ul>
