<?php
$route = $_GET['url'] ?? 'home';

$file = "../pages/{$route}.html";

if (file_exists($file)) {
    include $file;
} else {
    http_response_code(404);
    echo "Page not found!";
}
