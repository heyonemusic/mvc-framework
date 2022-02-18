<?php

// Вывод ошибок
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Дебаг ошибок
function debug($str)
{
    echo '<pre>';
    var_dump($str);
    echo '</pre>';
}

use application\core\Router;

// Автозагрузка классов
spl_autoload_register(function ($class) {
    $path = str_replace('\\', '/', $class . '.php');
    if (file_exists($path)) {
        require $path;
    }
});

// Старт сессии
session_start();

$router = new Router;
$router->run();
