<?php

namespace application\core;

class Router
{

    protected $routes = []; // Маршрут
    protected $params = []; // Параметры маршрута

    public function __construct()
    {
        $arr = require 'application/config/routes.php'; // Подключение массива с маршрутами
        // Разбиваем маршруты на ключ => значение
        foreach ($arr as $key => $value) {
            $this->add($key, $value);
        }
    }

    // Добавление маршрута
    public function add($route, $params)
    {
        $route = '#^' . $route . '$#'; // Добавление символов для preg_match
        // Установка ключа маршрута для переменной $routes и установка значения параметров маршрута
        $this->routes[$route] = $params;
    }

    // Проверка маршрута
    public function match()
    {
        // Получаем адрес страницы
        $url = trim($_SERVER['REQUEST_URI'], '/');
        // Перебор маршрутов
        foreach ($this->routes as $route => $params) {
            // Проверка маршрута на соответствие регулярному выражению
            if (preg_match($route, $url, $matches)) {
                $this->params = $params;
                return true;
            }
        }
        return false;
    }

    // Запуск маршрута
    public function run()
    {
        if ($this->match()) {
            $controller = 'application\controllers\\' . ucfirst($this->params['controller']) . 'Controller.php';
            if (class_exists($controller)) {
                //
            } else {
                echo "Такой класс не найден " . $controller;
            }
        }
    }

}
