<?php
// view/profissional/listar.php
?>

<h2>Profissionais Cadastrados</h2>
<p><a href="?url=profissionais/novo">Novo Profissional</a></p>
<table border="1" cellpadding="5">
    <tr>
        <th>Nome</th><th>Email</th><th>Telefone</th><th>Especialidade</th><th>Cidade</th><th>Ações</th>
    </tr>
    <?php foreach ($profissionais as $p): ?>
    <tr>
        <td><?= $p['nome'] ?></td>
        <td><?= $p['email'] ?></td>
        <td><?= $p['telefone'] ?></td>
        <td><?= $p['especialidade'] ?></td>
        <td><?= $p['cidade'] ?></td>
        <td>
            <a href="?url=profissionais/editar&id=<?= $p['id'] ?>">Editar</a> | 
            <a href="?url=profissionais/excluir&id=<?= $p['id'] ?>" onclick="return confirm('Excluir?')">Excluir</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<p><a href="index.php" class="btn">← Voltar</a></p>