<!DOCTYPE html>
<html lang="pt-br">
<head>
<?php require_once __DIR__ . '/header.php'; ?>
    <meta charset="UTF-8">
    <title>Serviço</title>
    <link rel="stylesheet" href="public/assets/style.css">
</head>
<body>
    <main>
        <?php
        $tipo = $_GET['tipo'] ?? '';
        $servicos = [
            'montagem' => 'Montagem de Móveis',
            'mudanca' => 'Serviço de Mudanças',
            'pedreiro' => 'Serviço de Pedreiro',
            'diarista' => 'Diaristas'
        ];
        if (!isset($_SESSION['usuario'])) { header("Location: ?url=login"); exit; } elseif (isset($servicos[$tipo])) {
            echo "<h2>" . htmlspecialchars($servicos[$tipo]) . "</h2>";
            echo "<p>Aqui você verá os profissionais disponíveis para esse tipo de serviço.</p>";
        } else {
            echo "<p class='alert error'>Serviço não encontrado.</p>";
        }
        ?>
    </main>
<?php require_once __DIR__ . '/footer.php'; ?>
</body>
</html>
