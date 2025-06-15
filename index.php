<?php
if (!isset($_SESSION)) {
    session_start();
}

require_once __DIR__ . '/helpers/helpers.php'; // Função usuarioEhProfissional()

if (isset($_SESSION['usuario'])) {
    $_SESSION['usuario']['eh_profissional'] = usuarioEhProfissional($_SESSION['usuario']['email']);
}

// Controladores
require_once __DIR__ . '/config/banco.php';
require_once __DIR__ . '/controller/UsuarioController.php';
require_once __DIR__ . '/controller/FeedbackController.php';
require_once __DIR__ . '/controller/ServicoController.php';

// Roteamento
$url = $_GET['url'] ?? 'home';
$url = explode("/", $url);
$pagina = $url[0];

switch ($pagina) {
    case 'home':
        require __DIR__ . '/view/home.php';
        break;

    case 'servicos':
        require __DIR__ . '/view/servicos.php';
        break;

    case 'sobre':
        require __DIR__ . '/view/sobre.php';
        break;

    case 'profissional':
        if (isset($url[1]) && $url[1] === 'novo') {
            UsuarioController::novo();
        } else {
            echo "<h1>Erro 404 - Página não encontrada</h1>";
        }
        break;

    case 'login':
        UsuarioController::login();
        break;

    case 'cadastro':
        UsuarioController::cadastro();
        break;

    case 'recuperar':
        UsuarioController::recuperar();
        break;

    case 'logout':
        UsuarioController::logout();
        break;

    case 'ver-servico':
        require __DIR__ . '/view/ver_servico.php';
        break;

    case 'dashboard':
        require __DIR__ . '/view/dashboard.php';
        break;

    case 'feedback/enviar':
        FeedbackController::enviar();
        break;

    case 'servicos-admin':
        ServicoController::index();
        break;

    case 'servicos-admin/novo':
        ServicoController::novo();
        break;

    case 'servicos-admin/editar':
        ServicoController::editar();
        break;

    case 'servicos-admin/excluir':
        ServicoController::excluir();
        break;

    default:
        http_response_code(404);
        echo "<h1>Erro 404 - Página não encontrada</h1>";
        echo "<p>A página que você tentou acessar não existe.</p>";
        echo "<a href='?url=home'>Voltar para a página inicial</a>";
        break;
}
