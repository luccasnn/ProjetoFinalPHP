<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Recuperar_senha</title>
    <link rel="stylesheet" href="public/assets/style.css">
</head>
<body>
<?php
// view/usuario/recuperar_senha.php
?>

<h2>Recuperar Senha</h2>
<form method="POST">
    <label>CPF:</label>
    <input type="text" name="cpf" required><br>
    <label>Data de Nascimento:</label>
    <input type="date" name="nascimento" required><br>
    <?php if (!empty($resetar)) { ?>
        <label>Nova Senha:</label>
        <input type="password" name="novaSenha" required><br>
    <?php } ?>
    <button type="submit">Enviar</button>
</form>
<?php if (!empty($erro)) echo "<p style='color:red;'>$erro</p>"; ?>

<p><a href="index.php" class="btn">← Voltar</a></p>
</body>
</html>