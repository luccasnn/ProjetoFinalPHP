<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>ProPulse</title>
    <link rel="stylesheet" href="public/assets/style.css"> 
</head>
<body>
    <header>
        <h1>ProPulse</h1>
        <nav>
            <ul>
                <li><a href="index.php?url=home">Início</a></li>
                <li><a href="index.php?url=servicos">Serviços</a></li>
                <li><a href="index.php?url=sobre">Sobre</a></li>
                <li><a href="index.php?url=contratar-servico">Contratar um Serviço</a></li>

                <?php if (isset($_SESSION['usuario'])): ?>
                    <li><strong>Olá, <?= htmlspecialchars($_SESSION['usuario']['nome']) ?></strong></li>
                    <li><a href="index.php?url=dashboard">Painel</a></li>

                    <?php if (!empty($_SESSION['usuario']['eh_profissional'])): ?>
                        <li><a href="index.php?url=servicos/novo">Adicionar Serviço</a></li>
                    <?php else: ?>
                        <li><a href="index.php?url=profissional/novo">Seja um Profissional</a></li>
                    <?php endif; ?>

                    <li><a href="index.php?url=logout">Sair</a></li>
                <?php else: ?>
                    <li><a href="index.php?url=login">Entrar</a></li>
                    <li><a href="index.php?url=cadastro">Cadastrar</a></li>
                <?php endif; ?>
            </ul>
        </nav>
        <hr>
    </header>
