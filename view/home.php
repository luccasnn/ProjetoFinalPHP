<?php
// view/home.php
// Página pública inicial com botões e serviços
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>ProPulse - Página Inicial</title>
    <link rel="stylesheet" href="public/assets/style.css">
</head>
<body>
    <header>
        <h1>ProPulse</h1>
        <nav>
            <a href="?url=login">Entrar</a>
            <a href="?url=seja-profissional">Seja um Profissional</a>
            <a href="?url=servicos">Serviços</a>
            <a href="?url=sobre">Sobre Nós</a>
        </nav>
        <form action="?url=pesquisa" method="get">
            <input type="text" name="busca" placeholder="Buscar serviços...">
            <button type="submit">Buscar</button>
        </form>
    </header>
    <?php require_once __DIR__ . '/header.php'; ?>

    <main>
        <section>
            <h2>Serviços Oferecidos</h2>
            <div class="servicos">
                <div class="servico">
                    <img src="/public/assets/img/servicos/img-1.jpg" alt="Montagem de Móveis">
                    <p><a href="?url=ver-servico&tipo=montagem">Montagem de Móveis</a></p>
                </div>
                <div class="servico">
                    <img src="/public/assets/img/fornecedores/img-1.jpg" alt="Mudanças">
                    <p><a href="?url=ver-servico&tipo=mudanca">Mudanças</a></p>
                </div>
                <div class="servico">
                    <img src="/public/assets/img/fornecedores/img-2.jpg" alt="Pedreiro">
                    <p><a href="?url=ver-servico&tipo=pedreiro">Serviço de Pedreiro</a></p>
                </div>
                <div class="servico">
                    <img src="/public/assets/img/fornecedores/img-3.jpg" alt="Diaristas">
                    <p><a href="?url=ver-servico&tipo=diarista">Diaristas</a></p>
                </div>
            </div>
        </section>
    </main>
    <?php require_once __DIR__ . '/footer.php'; ?>
</body>
</html>
