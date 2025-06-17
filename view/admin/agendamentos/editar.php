<h2>Editar Agendamento #<?= htmlspecialchars($agendamento['id'] ?? '') ?></h2>

<form method="post">
    <label>Data:<br>
        <input type="date" name="data_agendamento" value="<?= htmlspecialchars($agendamento['data_agendamento'] ?? '') ?>" required>
    </label><br><br>

    <label>Hora:<br>
        <input type="time" name="hora_agendamento" value="<?= htmlspecialchars($agendamento['hora_agendamento'] ?? '') ?>" required>
    </label><br><br>

    <button type="submit">Salvar</button>
    <a href="?url=admin/agendamentos">Cancelar</a>
</form>
