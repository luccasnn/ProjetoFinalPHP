<?php
// view/feedback/enviar.php
?>

<h2>Enviar Feedback de Serviço Pronto</h2>
<form method="POST" enctype="multipart/form-data">
    <label>Descrição:</label><br>
    <textarea name="descricao" required></textarea><br><br>
    <label>Imagem do serviço:</label><br>
    <input type="file" name="imagem" accept="image/*" required><br><br>
    <button type="submit">Enviar Feedback</button>
</form>

<p><a href="index.php" class="btn">← Voltar</a></p>