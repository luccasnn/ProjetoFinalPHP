<?php
// view/servico/editar.php
?>

<h2>Editar Serviço</h2>
<form method="POST">
    <label>Título:</label><input type="text" name="titulo" value="<?= $servico['titulo'] ?>" required><br>
    <label>Descrição:</label><textarea name="descricao" required><?= $servico['descricao'] ?></textarea><br>
    <label>Ícone:</label><input type="text" name="icone" value="<?= $servico['icone'] ?>"><br>
    <label>Ativo:</label>
    <select name="ativo">
        <option value="1" <?= $servico['ativo'] ? 'selected' : '' ?>>Sim</option>
        <option value="0" <?= !$servico['ativo'] ? 'selected' : '' ?>>Não</option>
    </select><br>
    <button type="submit">Atualizar</button>
</form>

<p><a href="index.php" class="btn">← Voltar</a></p>