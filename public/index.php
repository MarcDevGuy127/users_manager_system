<?php
// public/index.php - Front Controller

session_start(); // Inicia a sessão para mensagens de feedback

// Inclui o autoloader para carregar classes automaticamente
require_once __DIR__ . '/../app/Core/Autoloader.php';

use App\Controllers\ProdutoController; // Importa o Controller de Produto

// Obtém o caminho da requisição
$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$baseUrl = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME']));
$path = substr($requestUri, strlen($baseUrl));

// Remove barras extras e garante que começa com barra
$path = '/' . trim($path, '/');

// Mapeamento de rotas
switch ($path) {
    case '/produtos':
        (new ProdutoController())->index();
        break;

    case '/produtos/criar':
        (new ProdutoController())->create();
        break;

    case '/produtos/salvar':
        (new ProdutoController())->store();
        break;

    case '/produtos/atualizar':
        (new ProdutoController())->update();
        break;

    case '/produtos/excluir':
        (new ProdutoController())->delete();
        break;

    default:
        // Rota dinâmica: /produtos/editar/{id}
        if (preg_match('/^\/produtos\/editar\/(\d+)$/', $path, $matches)) {
            (new ProdutoController())->edit((int)$matches[1]);
        } else {
            header("HTTP/1.0 404 Not Found");
            echo "<h1>404 Not Found</h1>";
            echo "<p>A página que você está procurando não foi encontrada.</p>";
        }
        break;
}