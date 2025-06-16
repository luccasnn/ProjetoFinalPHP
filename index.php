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
require_once __DIR__ . '/controller/AgendamentoController.php'; // Certifique-se de incluir se usar

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
                case 'admin':  // Se precisar deste caso, mantenha
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

    case 'painel':
        require __DIR__ . '/view/admin/admin-painel.php';
        break;

    case 'admin-login':
    require_once 'controller/AdminController.php';
    AdminController::loginForm();
    break;

    case 'admin-login-processar':
        require_once 'controller/AdminController.php';
        AdminController::processarLogin();
        break;

    case 'admin-logout':
        require_once 'controller/AdminController.php';
        AdminController::logout();
        break;

    case 'painel':
        require_once 'controller/AdminController.php';
        AdminController::painel();
        break;

    case 'admin-servicos':
        ServicoController::index();
        break;

    case 'admin-usuarios':
        UsuarioController::index();
        break;

    case 'admin-agendamentos':
        AgendamentoController::listarTodos();
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
        // Proteção da área admin:
        if (!isset($_SESSION['admin_logado']) || $_SESSION['admin_logado'] !== true) {
            header('Location: admin-login.php');
            exit;
            
        }

        $subpagina = $url[1] ?? null;

        switch ($subpagina) {
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
                echo "<h1>Painel Admin</h1>";
                echo "<p>Selecione uma opção.</p>";
                break;
            case 'agendamentos':
                AgendamentoController::index(); // ou listarAdmin() conforme sua implementação
                break;
            case 'agendamentos-novo':
                AgendamentoController::novo();
                break;
            case 'agendamentos-editar':
                AgendamentoController::editar();
                break;
            case 'agendamentos-excluir':
                AgendamentoController::excluir();
                break;
        }
        break;

    case 'agendamento':
        $subpagina = $url[1] ?? null;
        $param = $url[2] ?? null;

        switch ($subpagina) {
            case null:
            case 'servicos':
                AgendamentoController::listarServicos();
                break;

            case 'formulario':
                if ($param) {
                    AgendamentoController::formularioAgendamento($param);
                } else {
                    http_response_code(404);
                    echo "<h1>Erro 404 - Serviço não especificado</h1>";
                }
                break;

            case 'salvar':
                AgendamentoController::salvarAgendamento();
                break;

            default:
                http_response_code(404);
                echo "<h1>Erro 404 - Página não encontrada</h1>";
                break;
        }
        break;

    case 'meus-agendamentos':
        AgendamentoController::listarAgendamentosUsuario();
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
