<?php
/*  
$route = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$route = trim($route, '/') ?: 'home';
$route = basename($route);
*/
$route = $_GET['url'] ?? 'home';

$page = "../pages/{$route}.html";

$header = "../layouts/header.html";
$footer = "../layouts/footer.html";

if (file_exists($page)) {
    include $header;
    include $page;
    include $footer;
} else {
    http_response_code(404);
    echo "Page not found!";
}
