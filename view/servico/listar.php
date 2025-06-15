<?php
// view/servico/listar.php
?>

<h2>Serviços Cadastrados</h2>
<p><a href="?url=servicos-admin/novo">Novo Serviço</a></p>
<table border="1" cellpadding="5">
    <tr>
        <th>Título</th><th>Descrição</th><th>Ícone</th><th>Ativo</th><th>Ações</th>
    </tr>
    <?php foreach ($servicos as $s): ?>
    <tr>
        <td><?= $s['titulo'] ?></td>
        <td><?= $s['descricao'] ?></td>
        <td><?= $s['icone'] ?></td>
        <td><?= $s['ativo'] ? 'Sim' : 'Não' ?></td>
        <td>
            <a href="?url=servicos-admin/editar&id=<?= $s['id'] ?>">Editar</a> |
            <a href="?url=servicos-admin/excluir&id=<?= $s['id'] ?>" onclick="return confirm('Excluir serviço?')">Excluir</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<p><a href="index.php" class="btn">← Voltar</a></p>