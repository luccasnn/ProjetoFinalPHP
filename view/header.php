<?php
if (!defined('BASE_URL')) {
    define('BASE_URL', '/ProPulse/ProPulse/');
}

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>ProPulse</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>public/assets/style.css">
</head>
<body>
    <header>
        <h1>ProPulse</h1>
        <nav>
            <ul>
                <li><a href="<?= BASE_URL ?>?url=home">Início</a></li>
                <li><a href="<?= BASE_URL ?>?url=sobre">Sobre</a></li>
                <li><a href="<?= BASE_URL ?>?url=agendamento">Contratar um Serviço</a></li>
                <li><a href="<?= BASE_URL ?>?url=meus-agendamentos">Meus Agendamentos</a></li>

                <?php if (isset($_SESSION['admin_logado']) && $_SESSION['admin_logado'] === true): ?>
                    <li><a href="<?= BASE_URL ?>?url=painel">Painel Admin</a></li>
                    <li><a href="<?= BASE_URL ?>?url=admin-logout">Sair Admin</a></li>
                <?php else: ?>
                    <li><a href="<?= BASE_URL ?>?url=admin-login">Área Admin</a></li>
                <?php endif; ?>

                <?php if (isset($_SESSION['usuario'])): ?>
                    <li><strong>Olá, <?= htmlspecialchars($_SESSION['usuario']['nome']) ?></strong></li>

                    <?php if (!empty($_SESSION['usuario']['eh_profissional'])): ?>
                        <li><a href="<?= BASE_URL ?>?url=servicos/novo">Adicionar Serviço</a></li>
                    <?php else: ?>
                        <li><a href="<?= BASE_URL ?>?url=profissional/novo">Seja um Profissional</a></li>
                    <?php endif; ?>

                    <li><a href="<?= BASE_URL ?>?url=logout">Sair</a></li>
                <?php else: ?>
                    <li><a href="<?= BASE_URL ?>?url=login">Entrar</a></li>
                    <li><a href="<?= BASE_URL ?>?url=cadastro">Cadastrar</a></li>
                <?php endif; ?>
            </ul>
        </nav>

        <hr>
    </header>
