<?php

// Возвращаем массив с маршрутами
return [

    '' => [
        'controller' => 'main',
        'action' => 'index'
    ],

    'account/login' => [
        'controller' => 'account',
        'action' => 'login'
    ],

    'news/show' => [
        'controller' => 'news',
        'action' => 'show'
    ]

];