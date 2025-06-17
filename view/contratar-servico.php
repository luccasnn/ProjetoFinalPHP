<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <title>Contratar Serviço</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 600px; margin: 40px auto; }
        label { display: block; margin-top: 15px; }
        input, textarea, select { width: 100%; padding: 8px; margin-top: 5px; }
        button { margin-top: 20px; padding: 10px 15px; background-color: #007bff; color: white; border: none; cursor: pointer; }
        button:hover { background-color: #0056b3; }
    </style>
</head>
<body>

<h1>Contratar Serviço</h1>

<form method="POST" action="?url=contratar-servico-enviar">
    <label for="nome">Seu nome:</label>
    <input type="text" id="nome" name="nome" required>

    <label for="email">Seu e-mail:</label>
    <input type="email" id="email" name="email" required>

    <label for="servico">Serviço desejado:</label>
    <select id="servico" name="servico" required>
        <option value="">-- Escolha um serviço --</option>
        <?php
        require_once __DIR__ . '/../model/Servico.php';
        $servicos = (new Servico())->listarAtivos();
        foreach ($servicos as $servico) {
            echo '<option value="' . htmlspecialchars($servico['id']) . '">' . htmlspecialchars($servico['titulo']) . '</option>';
        }
        ?>
    </select>

    <label for="detalhes">Detalhes adicionais:</label>
    <textarea id="detalhes" name="detalhes" rows="4" placeholder="Informe mais detalhes sobre o que deseja"></textarea>

    <button type="submit">Enviar pedido</button>
    <a href="/ProjetoFinalPHP/index.php" style="
    display: inline-block;
    padding: 10px 20px;
    background-color:blue;
    color: white;
    font-weight: bold;
    text-decoration: none;
    border-radius: 5px;
    border: none;
    box-shadow: 2px 2px 5px rgba(0,0,0,0.2);
    transition: background-color 0.3s;
" onmouseover="this.style.backgroundColor='#218838'" onmouseout="this.style.backgroundColor='#28a745'">
    Voltar ao Início
</a>


</form>

</body>
</html>
