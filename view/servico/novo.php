<?php
// view/servico/novo.php
?>

<!-- <h2>Novo Serviço</h2>
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

<p><a href="index.php" class="btn">← Voltar</a></p> -->
<?php session_start(); ?>
<?php if (!isset($_SESSION['usuario'])) {
    header("Location: ?url=login");
    exit;
} ?>

<h2>Novo Profissional</h2>

<?php if (!empty($erro)) : ?>
    <p style="color: red;"><?= htmlspecialchars($erro) ?></p>
<?php endif; ?>

<form method="POST" action="?url=seja-profissional">
    <label>Nome:</label>
    <input type="text" name="nome" value="<?= htmlspecialchars($_POST['nome'] ?? '') ?>" required><br>

    <label>Email:</label>
    <input type="email" name="email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" required><br>

    <label>Telefone:</label>
    <input type="text" name="telefone" value="<?= htmlspecialchars($_POST['telefone'] ?? '') ?>"><br>

    <label>Especialidade:</label>
    <input type="text" name="especialidade" value="<?= htmlspecialchars($_POST['especialidade'] ?? '') ?>"><br>

    <label>Descrição:</label>
    <textarea name="descricao"><?= htmlspecialchars($_POST['descricao'] ?? '') ?></textarea><br>

    <label>Cidade:</label>
    <input type="text" name="cidade" value="<?= htmlspecialchars($_POST['cidade'] ?? '') ?>"><br>

    <button type="submit">Salvar</button>
</form>

<p><a href="?url=home" class="btn">← Voltar</a></p>
