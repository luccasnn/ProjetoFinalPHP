<?php
// view/profissional/editar.php
?>

<h2>Editar Profissional</h2>
<form method="POST">
    <label>Nome:</label><input type="text" name="nome" value="<?= $profissional['nome'] ?>" required><br>
    <label>Email:</label><input type="email" name="email" value="<?= $profissional['email'] ?>" required><br>
    <label>Telefone:</label><input type="text" name="telefone" value="<?= $profissional['telefone'] ?>"><br>
    <label>Especialidade:</label><input type="text" name="especialidade" value="<?= $profissional['especialidade'] ?>"><br>
    <label>Descrição:</label><textarea name="descricao"><?= $profissional['descricao'] ?></textarea><br>
    <label>Cidade:</label><input type="text" name="cidade" value="<?= $profissional['cidade'] ?>"><br>
    <button type="submit">Atualizar</button>
</form>

<p><a href="index.php" class="btn">← Voltar</a></p>