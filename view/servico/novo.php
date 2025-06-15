<?php
// view/servico/novo.php
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <?php require_once __DIR__ . '/../header.php'; ?> 
    <title>Novo Serviço</title>
    <style>
        form { width: 400px; margin: 20px auto; }
        label { display: block; margin-top: 10px; }
        input[type="text"], textarea { width: 100%; padding: 6px; margin-top: 4px; }
        button { margin-top: 12px; padding: 8px 16px; }
    </style>
</head>
<body>
    <h1 style="text-align:center;">Cadastrar Novo Serviço</h1>

    <form action="?url=servicos/novo" method="POST">
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" id="titulo" required>

        <label for="descricao">Descrição:</label>
        <textarea name="descricao" id="descricao" rows="4" required></textarea>

        <label for="icone">Ícone:</label>
        <input type="text" name="icone" id="icone" placeholder="Ex: fa-user" required>

        <label for="ativo">Ativo:</label>
        <select name="ativo" id="ativo" required>
            <option value="1" selected>Sim</option>
            <option value="0">Não</option>
        </select>

        <button type="submit">Salvar</button>
    </form>
    <?php require_once __DIR__ . '/../footer.php'; ?>
</body>
</html>

