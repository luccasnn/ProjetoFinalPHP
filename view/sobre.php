<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Sobre o ProPulse</title>
    <link rel="stylesheet" href="/ProjetoFinalPHP/public/assets/style.css"> <!-- opcional -->
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background: #e2f3f7;
        }

        .sobre-container {
            max-width: 800px;
            margin: 60px auto;
            background: #fff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .sobre-container img {
            max-width: 180px;
            margin-bottom: 25px;
        }

        .sobre-container h2 {
            font-size: 30px;
            margin-bottom: 20px;
            color: #333;
        }

        .sobre-container p {
            font-size: 17px;
            color: #555;
            text-align: justify;
            line-height: 1.7;
        }

        .btn-voltar {
            display: inline-block;
            margin-top: 30px;
            padding: 10px 25px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .btn-voltar:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="sobre-container">
    <!-- Altere a extensão da imagem se necessário -->
    <img src="/ProjetoFinalPHP/public/assets/img/LogoProPulse/Logo.png" alt="Logo do ProPulse">

    <h2>Sobre o ProPulse</h2>

    <p>
        O <strong>ProPulse</strong> é uma plataforma desenvolvida para aproximar clientes e profissionais por meio de uma experiência simples, eficiente e intuitiva.
    </p>

    <p>
        Este projeto nasceu como trabalho final de uma disciplina acadêmica de desenvolvimento web com PHP, aplicando conceitos como orientação a objetos, padrão MVC e integração com bancos de dados MySQL.
    </p>

    <p>
        Nosso propósito é oferecer uma solução funcional, responsiva e didática, tanto para fins educacionais quanto para simular o funcionamento de um sistema real de intermediação de serviços.
    </p>

    <a href="/ProjetoFinalPHP/index.php" class="btn-voltar">Voltar à Página Inicial</a>
</div>

</body>
</html>
