<<<<<<< HEAD
<?php require_once __DIR__ . '/../header.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Seja um Profissional</title>
    <link rel="stylesheet" href="public/assets/style.css">
</head>
<body>
    <h2>Seja um Profissional</h2>

    <?php if (!empty($erro)) echo "<p style='color:red;'>$erro</p>"; ?>

    <form method="post">
        <label>Telefone:</label>
        <input type="text" name="telefone" required>

        <label>Especialidade:</label>
        <input type="text" name="especialidade" required>

        <label>Descrição:</label>
        <textarea name="descricao" required></textarea>

        <label>Cidade:</label>
        <input type="text" name="cidade" required>

        <button type="submit">Salvar</button>
    </form>

    <p><a href="?url=dashboard">← Voltar</a></p>
</body>
</html>

<?php require_once __DIR__ . '/../footer.php'; ?>
=======
<?php
// view/profissional/novo.php
?>

<h2>Novo Profissional</h2>
<form method="POST">
    <label>Nome:</label><input type="text" name="nome" required><br>
    <label>Email:</label><input type="email" name="email" required><br>
    <label>Telefone:</label><input type="text" name="telefone"><br>
    <label>Especialidade:</label><input type="text" name="especialidade"><br>
    <label>Descrição:</label><textarea name="descricao"></textarea><br>
    <label>Cidade:</label><input type="text" name="cidade"><br>
    <button type="submit">Salvar</button>
</form>

<p><a href="index.php" class="btn">← Voltar</a></p>
>>>>>>> b16894535eda5b3bf3035618149f06904d2ede14
