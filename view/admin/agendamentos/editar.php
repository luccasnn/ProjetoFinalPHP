<h2>Editar Agendamento #<?= htmlspecialchars($agendamento['id'] ?? '') ?></h2>

<form method="post">
    
    <label>Data:<br>
        <input type="date" name="data_agendamento" value="<?= htmlspecialchars($agendamento['data_agendamento'] ?? '') ?>" required>
    </label><br><br>

    <label>Hora:<br>
        <input type="time" name="hora_agendamento" value="<?= htmlspecialchars($agendamento['hora_agendamento'] ?? '') ?>" required>
    </label><br><br>
    <label for="usuario_id">Usuário:</label>

    <select name="usuario_id" required>
    <?php foreach ($usuarios as $usuario): ?>
        <option value="<?= $usuario['id'] ?>" <?= ($usuario['id'] == $agendamento['usuario_id']) ? 'selected' : '' ?>>
        <?= htmlspecialchars($usuario['nome']) ?>
        </option>
    <?php endforeach; ?>
    </select>

    <label for="servico_id">Serviço:</label>
    <select name="servico_id" required>
    <?php foreach ($servicos as $servico): ?>
        <option value="<?= $servico['id'] ?>" <?= ($servico['id'] == $agendamento['servico_id']) ? 'selected' : '' ?>>
        <?= htmlspecialchars($servico['titulo']) ?>
        </option>
    <?php endforeach; ?>
    </select>


    <button type="submit">Salvar</button>
    <a href="?url=admin/agendamentos">Cancelar</a>
    
</form>

