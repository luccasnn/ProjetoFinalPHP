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
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Painel Admin</title>
    <link rel="stylesheet" href="/ProPulse/ProPulse/public/assets/style.css?v=1.0.0" />
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f6fa;
            color: #2f3640;
            margin: 0;
            padding: 0 20px;
        }
        h1 {
            margin-top: 40px;
            font-weight: 700;
            font-size: 2.5rem;
            text-align: center;
            color: #273c75;
        }
        p.logout {
            text-align: right;
            margin-top: 10px;
            margin-bottom: 40px;
        }
        p.logout a {
            color: #e84118;
            text-decoration: none;
            font-weight: 600;
            border: 1px solid #e84118;
            padding: 6px 12px;
            border-radius: 4px;
            transition: background-color 0.3s, color 0.3s;
        }
        p.logout a:hover {
            background-color: #e84118;
            color: #fff;
        }
        ul.admin-links {
            max-width: 500px;
            margin: 0 auto 60px;
            padding: 0;
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
        ul.admin-links li a {
            display: block;
            background-color: #40739e;
            color: #f5f6fa;
            padding: 15px 20px;
            border-radius: 8px;
            font-weight: 700;
            font-size: 1.2rem;
            text-align: center;
            text-decoration: none;
            box-shadow: 0 4px 8px rgb(64 115 158 / 0.3);
            transition: background-color 0.3s ease;
        }
        ul.admin-links li a:hover {
            background-color: #273c75;
            box-shadow: 0 6px 12px rgb(39 60 117 / 0.5);
        }
    </style>
</head>
<body>

<?php require_once __DIR__ . '/../header.php'; ?>

<h1>Bem-vindo ao Painel Admin</h1>

<p class="logout"><a href="admin-logout.php" title="Sair do Painel Administrativo">Sair</a></p>

<ul class="admin-links">
    <li><a href="?url=admin/usuarios">Gerenciar Usuários</a></li>
    <li><a href="?url=admin/servicos">Gerenciar Serviços</a></li>
    <li><a href="?url=admin/agendamentos">Gerenciar Agendamentos</a></li>
</ul>

<?php require_once __DIR__ . '/../footer.php'; ?>

</body>
</html>
