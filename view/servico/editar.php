<?php
// view/servico/editar.php
?>
<?php require_once __DIR__ . '/../header.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <title>Editar Serviço</title>
    <style>
        form { max-width: 500px; margin: 30px auto; display: flex; flex-direction: column; gap: 10px; }
        label { font-weight: bold; }
        input[type="text"], textarea { width: 100%; padding: 8px; }
        input[type="checkbox"] { margin-left: 0; }
        button { width: 100px; padding: 8px; background: #007bff; color: white; border: none; border-radius: 3px; cursor: pointer; }
        button:hover { background: #0056b3; }
        a { margin-top: 10px; display: inline-block; text-decoration: none; color: #007bff; }
    </style>
</head>
<body>
    <h1 style="text-align:center;">Editar Serviço</h1>
    <form method="post" action="">
        <label for="titulo">Título:</label>
        <input type="text" id="titulo" name="titulo" required value="<?= htmlspecialchars($servico['titulo']) ?>" />

        <label for="descricao">Descrição:</label>
        <textarea id="descricao" name="descricao" rows="4"><?= htmlspecialchars($servico['descricao']) ?></textarea>

        <label for="icone">Ícone (nome ou URL):</label>
        <input type="text" id="icone" name="icone" value="<?= htmlspecialchars($servico['icone']) ?>" />

        <label>
            <input type="checkbox" name="ativo" <?= $servico['ativo'] ? 'checked' : '' ?> />
            Ativo
        </label>

        <button type="submit">Atualizar</button>
    </form>
    <p style="text-align:center;"><a href="?url=home">Voltar ao Menu</a></p>
</body>
<?php require_once __DIR__ . '/../footer.php'; ?>
</html>
