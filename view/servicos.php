<!DOCTYPE html>
<html lang="pt-br">
<?php require_once __DIR__ . '/header.php'; ?>
    
<head>
    <meta charset="UTF-8">
    <title>Servicos</title>
    <link rel="stylesheet" href="public/assets/style.css">
</head>
<body>
<?php
// view/servicos.php
?>

<h2>Serviços Disponíveis</h2>
<p>Veja a lista de serviços disponíveis e clique para mais detalhes (se estiver logado).</p>
<ul>
    <li><a href="?url=ver-servico&tipo=montagem">Montagem de Móveis</a></li>
    <li><a href="?url=ver-servico&tipo=mudanca">Mudanças</a></li>
    <li><a href="?url=ver-servico&tipo=pedreiro">Pedreiro</a></li>
    <li><a href="?url=ver-servico&tipo=diarista">Diarista</a></li>
</ul>

<?php require_once __DIR__ . '/footer.php'; ?>
</body>
</html>


