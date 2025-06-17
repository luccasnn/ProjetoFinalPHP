<?php
// view/servico/listar.php
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <title>Lista de Serviços</title>
    <style>
        table { border-collapse: collapse; width: 80%; margin: 20px auto; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background-color: #eee; }
        a.button { padding: 5px 10px; background: #007bff; color: white; text-decoration: none; border-radius: 3px; }
        a.button:hover { background: #0056b3; }
        .center { text-align: center; margin: 20px; }
    </style>
</head>
<body>
    <?php require_once __DIR__ . '/../header.php'; ?> 
    <h1 class="center">Serviços Cadastrados</h1>

    <p class="center"><a href="?url=servicos/novo" class="button">Novo Serviço</a></p>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Descrição</th>
                <th>Ícone</th>
                <th>Ativo</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($servicos): ?>
                <?php foreach ($servicos as $servico): ?>
                    <tr>
                        <td><?= htmlspecialchars($servico['id']) ?></td>
                        <td><?= htmlspecialchars($servico['titulo']) ?></td>
                        <td><?= nl2br(htmlspecialchars($servico['descricao'])) ?></td>
                        <td><?= htmlspecialchars($servico['icone']) ?></td>
                        <td><?= $servico['ativo'] ? 'Sim' : 'Não' ?></td>
                        <td>
                            <a href="?url=servicos/editar&id=<?= $servico['id'] ?>" class="button">Editar</a>
                            <a href="?url=servicos/excluir&id=<?= $servico['id'] ?>" class="button" onclick="return confirm('Deseja realmente excluir este serviço?')">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="6" style="text-align:center;">Nenhum serviço cadastrado.</td></tr>
            <?php endif; ?>
            <?php require_once __DIR__ . '/../footer.php'; ?>
        </tbody>
    </table>
</body>
</html>

