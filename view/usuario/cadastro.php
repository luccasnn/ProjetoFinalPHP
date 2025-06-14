<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro</title>
    <link rel="stylesheet" href="public/assets/style.css">
</head>
<body>
<?php
// view/usuario/cadastro.php
?>

<h2>Cadastro de Usuário</h2>
<form method="POST">
    <label>Nome:</label>
    <input type="text" name="nome" required><br>
    <label>Email:</label>
    <input type="email" name="email" required><br>
    <label>Senha:</label>
    <input type="password" name="senha" required><br>
    <label>CPF:</label>
    <input type="text" name="cpf" required><br>
    <label>Data de Nascimento:</label>
    <input type="date" name="nascimento" required><br>
    <button type="submit">Cadastrar</button>
</form>

<p><a href="index.php" class="btn">← Voltar</a></p>
</body>
</html>