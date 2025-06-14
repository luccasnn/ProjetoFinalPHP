<?php
// view/servico/novo.php
?>

<h2>Novo Serviço</h2>
<form method="POST">
    <label>Título:</label><input type="text" name="titulo" required><br>
    <label>Descrição:</label><textarea name="descricao" required></textarea><br>
    <label>Ícone:</label><input type="text" name="icone"><br>
    <label>Ativo:</label>
    <select name="ativo">
        <option value="1">Sim</option>
        <option value="0">Não</option>
    </select><br>
    <button type="submit">Salvar</button>
</form>

<p><a href="index.php" class="btn">← Voltar</a></p>