<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['admin_logado']) || $_SESSION['admin_logado'] !== true) {
    header('Location: admin-login.php');
    exit;
}

// Aqui vai seu painel administrativo
?>

<!DOCTYPE html>
<html>
<head>
    <title>Painel Admin</title>
    <link rel="stylesheet" href="/ProPulse/ProPulse/public/assets/style.css?v=1.0.0" />
</head>
<body>

<?php require_once __DIR__ . '/../header.php'; ?>

<h1>Bem-vindo ao Painel Admin</h1>
<p><a href="admin-logout.php">Sair</a></p>

<!-- Links para CRUD usuários e serviços -->
<ul class="admin-links">
    <li><a href="?url=admin/usuarios">Gerenciar Usuários</a></li>
    <li><a href="?url=admin/servicos">Gerenciar Serviços</a></li>
    <li><a href="?url=admin/agendamentos">Gerenciar Agendamentos</a></li>
</ul>

<?php require_once __DIR__ . '/../footer.php'; ?>

</body>
</html>
