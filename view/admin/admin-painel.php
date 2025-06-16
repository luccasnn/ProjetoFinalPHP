<?php
session_start();
if (!isset($_SESSION['admin_logado']) || $_SESSION['admin_logado'] !== true) {
    header('Location: admin-login.php');
    exit;
}

// Aqui vai seu painel administrativo
?>

<!DOCTYPE html>
<html>
<head><title>Painel Admin</title></head>
<body>
<h1>Bem-vindo ao Painel Admin</h1>
<p><a href="admin-logout.php">Sair</a></p>

<!-- Links para CRUD usuários e serviços -->
<ul>
    <li><a href="?url=admin/usuarios">Gerenciar Usuários</a></li>
    <li><a href="?url=admin/servicos">Gerenciar Serviços</a></li>
</ul>
</body>
</html>
