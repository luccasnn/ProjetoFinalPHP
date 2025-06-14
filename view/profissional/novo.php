<?php
// view/profissional/novo.php
?>

<h2>Novo Profissional</h2>
<form method="POST">
    <label>Nome:</label><input type="text" name="nome" required><br>
    <label>Email:</label><input type="email" name="email" required><br>
    <label>Telefone:</label><input type="text" name="telefone"><br>
    <label>Especialidade:</label><input type="text" name="especialidade"><br>
    <label>Descrição:</label><textarea name="descricao"></textarea><br>
    <label>Cidade:</label><input type="text" name="cidade"><br>
    <button type="submit">Salvar</button>
</form>

<p><a href="index.php" class="btn">← Voltar</a></p>