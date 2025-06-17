<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Usuário e senha presetados
$usuarioAdmin = 'admin';
$senhaAdmin = '123456';

// Se já está logado, mostra o painel
if (isset($_SESSION['admin_logado']) && $_SESSION['admin_logado'] === true) {
    echo "<h1>Painel Admin</h1>";
    echo "<p>Bem-vindo, Admin!</p>";
    echo '<a href="admin.php?logout=1">Sair</a>';
    
    // Aqui você pode colocar os links para CRUDs, tabelas, etc.
    echo '<ul>
            <li><a href="usuarios.php">Gerenciar Usuários</a></li>
            <li><a href="servicos.php">Gerenciar Serviços</a></li>
          </ul>';

    exit;
}

// Se clicar em sair, destrói a sessão
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: admin.php');
    exit;
}

// Se o formulário foi enviado, verifica login
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'] ?? '';
    $senha = $_POST['senha'] ?? '';

    if ($usuario === $usuarioAdmin && $senha === $senhaAdmin) {
        $_SESSION['admin_logado'] = true;
        header('Location: admin.php');
        exit;
    } else {
        $erro = "Usuário ou senha inválidos.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Admin</title>
</head>
<body>
    <h1>Login do Painel Admin</h1>
    <?php if (!empty($erro)) echo "<p style='color:red;'>$erro</p>"; ?>
    <form method="post" action="admin.php">
        <label>Usuário: <input type="text" name="usuario" required></label><br><br>
        <label>Senha: <input type="password" name="senha" required></label><br><br>
        <button type="submit">Entrar</button>
        
    </form>
</body>
</html>
