<?php
return [
    'database' => [
        'name' => 'cursophp',
        'username' => 'userCurso',
        'password' => 'php',
        'connection' => 'mysql:host=localhost',
        'options' => [
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_PERSISTENT => true
        ]
    ],
    'logs' => [
        'filename' => 'curso.log',
        'level' => \Monolog\Logger::WARNING
    ],
    'routes' => [
        'filename' => 'routes.php'
    ],
    'project' => [
        'namespace' => 'kosmo'
    ],
    'security' => [
        'roles' => [
        'ROLE_ADMIN' => 3,
        'ROLE_USER' => 2,
        'ROLE_ANONYMOUS' => 1
        ]
    ]
];
