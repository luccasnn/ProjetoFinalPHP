<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="public/assets/style.css">
</head>
<body>
<?php
// view/usuario/login.php
?>

<h2>Login</h2>
<form method="POST">
    <label>Email:</label>
    <input type="email" name="email" required><br>
    <label>Senha:</label>
    <input type="password" name="senha" required><br>
    <button type="submit">Entrar</button>
</form>
<p><a href="?url=cadastro">Cadastrar-se</a> | <a href="?url=recuperar">Esqueci minha senha</a></p>
<?php if (!empty($erro)) echo "<p style='color:red;'>$erro</p>"; ?>

<p><a href="index.php" class="btn">← Voltar</a></p>
</body>
</html>