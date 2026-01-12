<?php
spl_autoload_register(function ($class) {
    // Namespace base da aplicação
    $prefix = 'App\\';

    // Diretório base da aplicação
    $base_dir = __DIR__ . '/../';

    // Verifica se a classe usa o namespace base
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }

    // Nome relativo da classe
    $relative_class = substr($class, $len);

    // Converte namespace em caminho de diretório
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    // Inclui o arquivo se existir
    if (file_exists($file)) {
        require_once $file;
    }
});