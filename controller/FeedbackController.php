<?php
// controller/FeedbackController.php

require_once __DIR__ . '/../model/Feedback.php';

class FeedbackController {

    public static function enviar() {
        if (!isset($_SESSION['usuario'])) {
            echo "<p>Você precisa estar logado para enviar feedback.</p>";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $descricao = $_POST['descricao'] ?? '';
            $imagem_nome = '';

            if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === 0) {
                $tmp = $_FILES['imagem']['tmp_name'];
                $nome_original = basename($_FILES['imagem']['name']);
                $ext = strtolower(pathinfo($nome_original, PATHINFO_EXTENSION));
                $permitidos = ['jpg', 'jpeg', 'png', 'gif'];
                if (in_array($ext, $permitidos)) {
                    $imagem_nome = uniqid('img_') . '.' . $ext;
                    move_uploaded_file($tmp, __DIR__ . '/../uploads/' . $imagem_nome);
                }
            }

            $usuario_id = $_SESSION['usuario']['id'];
            (new Feedback())->salvar($usuario_id, $descricao, $imagem_nome);
            echo "<p>Feedback enviado com sucesso!</p>";
        }

        require __DIR__ . '/../view/feedback/enviar.php';
    }

    public static function listar() {
        $lista = (new Feedback())->listar();
        foreach ($lista as $item) {
            echo "<p><strong>{$item['nome']}</strong>: {$item['descricao']}<br>";
            if ($item['imagem']) {
                echo "<img src='/uploads/{$item['imagem']}' width='200'></p>";
            }
        }
    }
}
?>
