<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Verifica se o administrador está logado
if (!isset($_SESSION['admin_logado']) || $_SESSION['admin_logado'] !== true) {
    header('Location: ?url=admin-login');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Painel Administrativo - ProPulse</title>
    <link rel="stylesheet" href="/ProPulse/ProPulse/public/assets/style.css?v=1.0.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .admin-container {
            max-width: 800px;
            margin: auto;
        }

        .admin-links {
            list-style: none;
            padding: 0;
        }

        .admin-links li {
            margin: 10px 0;
        }

        .admin-links a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }

        .admin-links a:hover {
            text-decoration: underline;
        }

        .logout-link {
            float: right;
        }
    </style>
</head>
<body>

<?php require_once __DIR__ . '/../header.php'; ?>

<div class="admin-container">
    <h1>Painel Administrativo</h1>
    <p>Bem-vindo, administrador!</p>
    <p><a class="logout-link" href="?url=admin-logout">Sair</a></p>

    <h2>Gerenciamento</h2>
    <ul class="admin-links">
        <li><a href="?url=admin/usuarios">👤 Gerenciar Usuários</a></li>
        <li><a href="?url=admin/servicos">🛠️ Gerenciar Serviços</a></li>
        <li><a href="?url=admin/agendamentos">📅 Gerenciar Agendamentos</a></li>
    </ul>
</div>

<?php require_once __DIR__ . '/../footer.php'; ?>

</body>
</html>
