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

// Permite URLs com hífen: substitui '-' por '/'
//$url = str_replace('-', '/', $url);

$url = explode("/", $url);

$pagina = $url[0];
$subpagina = $url[1] ?? null;

switch ($pagina) {
    case 'home':
        require __DIR__ . '/view/home.php';
        break;

        case 'sobre':
    require __DIR__ . '/view/sobre.php';
    break;

    case 'servicos':
        if ($subpagina === null) {
            require __DIR__ . '/view/servicos.php';
        } else {
            switch ($subpagina) {
                case 'novo':
                    ServicoController::novo();
                    break;
                case 'editar':
                    ServicoController::editar();
                    break;
                case 'excluir':
                    ServicoController::excluir();
                    break;
                case 'admin':  // <--- Adicione esta linha
                    ServicoController::index();
                    break;
                default:
                    http_response_code(404);
                    echo "<h1>Erro 404 - Página não encontrada</h1>";
                    break;
            }
        }
        break;
    
    case 'contratar-servico-enviar':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Aqui você pode salvar o pedido no banco, enviar email, etc.
            // Por enquanto, só vamos mostrar uma mensagem simples.

            $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
            $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
            $servicoId = filter_input(INPUT_POST, 'servico', FILTER_VALIDATE_INT);
            $detalhes = filter_input(INPUT_POST, 'detalhes', FILTER_SANITIZE_STRING);

            if ($nome && $email && $servicoId) {
                // TODO: Salvar no banco ou enviar email
                echo "<h1>Pedido enviado com sucesso!</h1>";
                echo "<p>Obrigado, $nome. Entraremos em contato em breve pelo e-mail $email.</p>";
                echo "<a href='?url=home'>Voltar para a página inicial</a>";
            } else {
                echo "<h1>Erro: Dados inválidos.</h1>";
                echo "<a href='?url=contratar-servico'>Voltar para o formulário</a>";
            }
        } else {
            http_response_code(405);
            echo "<h1>Método não permitido</h1>";
        }
        break;

    case 'contratar-servico':
        if ($subpagina === null) {
            require __DIR__ . '/view/contratar-servico.php';
        } else {
            http_response_code(404);
            echo "<h1>Erro 404 - Página não encontrada</h1>";
        }
        break;
    case 'contratar':
        if ($subpagina === 'servico') {
            require __DIR__ . '/view/contratar-servico.php';
        } else {
            http_response_code(404);
            echo "<h1>Erro 404 - Página não encontrada</h1>";
        }
        break;

    case 'servicos-admin':
        if ($subpagina === null) {
            ServicoController::index();
        } else {
            switch ($subpagina) {
                case 'novo':
                    ServicoController::novo();
                    break;
                case 'editar':
                    ServicoController::editar();
                    break;
                case 'excluir':
                    ServicoController::excluir();
                    break;
                default:
                    http_response_code(404);
                    echo "<h1>Erro 404 - Página não encontrada</h1>";
                    break;
            }
        }
        break;

    case 'profissional':
        if ($subpagina === 'novo') {
            UsuarioController::novo();
        } else {
            echo "<h1>Erro 404 - Página não encontrada</h1>";
        }
        break;
    case 'admin':
        $subpagina = $url[1] ?? null;

        switch ($subpagina) {
            case 'servicos':
                // Lista os serviços cadastrados
                ServicoController::index();
                break;
            case 'servicos-novo':
                // Formulário e ação para criar novo serviço
                ServicoController::novo();
                break;
            case 'servicos-editar':
                // Editar serviço
                ServicoController::editar();
                break;
            case 'servicos-excluir':
                // Excluir serviço
                ServicoController::excluir();
                break;
            default:
                echo "<h1>Painel Admin</h1>";
                echo "<p>Selecione uma opção.</p>";
                break;
        }
        break;
    case 'admin':
        $subpagina = $url[1] ?? null;

        switch ($subpagina) {
            // Serviços admin
            case 'servicos':
                ServicoController::index();
                break;
            case 'servicos-novo':
                ServicoController::novo();
                break;
            case 'servicos-editar':
                ServicoController::editar();
                break;
            case 'servicos-excluir':
                ServicoController::excluir();
                break;

            // Usuários admin
            case 'usuarios':
                UsuarioController::index();
                break;
            case 'usuarios-novo':
                UsuarioController::novo();
                break;
            case 'usuarios-editar':
                UsuarioController::editar();
                break;
            case 'usuarios-excluir':
                UsuarioController::excluir();
                break;

            default:
                http_response_code(404);
                echo "<h1>Erro 404 - Página não encontrada</h1>";
                break;
        }
        break;
    case 'usuarios-admin':
        if ($subpagina === null) {
            UsuarioController::index();
        } else {
            switch ($subpagina) {
                case 'novo':
                    UsuarioController::novo();
                    break;
                case 'editar':
                    UsuarioController::editar();
                    break;
                case 'excluir':
                    UsuarioController::excluir();
                    break;
                default:
                    http_response_code(404);
                    echo "<h1>Erro 404 - Página não encontrada</h1>";
                    break;
            }
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

    case 'feedback':
        if ($subpagina === 'enviar') {
            FeedbackController::enviar();
        } else {
            http_response_code(404);
            echo "<h1>Erro 404 - Página não encontrada</h1>";
        }
        break;

    default:
        http_response_code(404);
        echo "<h1>Erro 404 - Página não encontrada</h1>";
        echo "<p>A página que você tentou acessar não existe.</p>";
        echo "<a href='?url=home'>Voltar para a página inicial</a>";
        break;
}
