<?php
// index.php - Roteador principal do ProPulse

if (!isset($_SESSION)) {
    session_start();
}

$url = $_GET['url'] ?? 'home';
$url = explode("/", $url);
$pagina = $url[0];

// Controladores
require_once __DIR__ . '/config/banco.php';
require_once __DIR__ . '/controller/UsuarioController.php';
require_once __DIR__ . '/controller/ProfissionalController.php';
require_once __DIR__ . '/controller/FeedbackController.php';
require_once __DIR__ . '/controller/ServicoController.php';

// Roteamento
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

    case 'seja-profissional':
        require __DIR__ . '/view/seja_profissional.php';
        break;

    case 'ver-servico':
        require __DIR__ . '/view/ver_servico.php';
        break;

    case 'dashboard':
        require __DIR__ . '/view/dashboard.php';
        break;
        require __DIR__ . '/view/ver_servico.php';
        break;
        UsuarioController::logout();
        break;

    case 'profissionais':
        ProfissionalController::index();
        break;

    case 'profissionais/novo':
        ProfissionalController::novo();
        break;

    case 'profissionais/editar':
        ProfissionalController::editar();
        break;

    case 'profissionais/excluir':
        ProfissionalController::excluir();
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
        FeedbackController::enviar();
        break;
        ProfissionalController::excluir();
        break;

    default:
        echo "<h1>Erro 404 - Página não encontrada</h1>";
}
?>
