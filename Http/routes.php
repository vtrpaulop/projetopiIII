<?php

use Core\Middleware\Guest;
use Core\Middleware\User;
use Core\Middleware\Colaborador;
use Core\Middleware\Supervisor;

require_once base_path('/config.php');
$subpath = $config['subdiretorio'];

// Home
$route->add("{$subpath}/", controller('/index.php'));
$route->add("{$subpath}/playground", controller('/playground.php'));
$route->add("{$subpath}/sobre-nos", controller('/sobre-nos.php'));
$route->add("{$subpath}/cadastro", controller('/cadastro.php'), Guest::class);
$route->add("{$subpath}/login", controller('/login.php'), Guest::class);

// Usuario
$route->add("{$subpath}/dashboard", controller('/dashboard.php'), User::class);
$route->add("{$subpath}/usuario", controller('/usuario.php'), User::class);
$route->add("{$subpath}/usuario-senha", controller('/usuario-senha.php'), User::class);
$route->add("{$subpath}/carteirinha", controller('/usuario-carteirinha.php'), User::class);
$route->add("{$subpath}/logout", controller('/logout.php'), User::class);

// Usuarios
$route->add("{$subpath}/usuarios", controller('/usuarios.php'), Colaborador::class);
$route->add("{$subpath}/usuarios-editar", controller('/usuarios-editar.php'), Colaborador::class);
$route->add("{$subpath}/usuarios-info", controller('/usuarios-info.php'), Colaborador::class);
$route->add("{$subpath}/usuarios-atrelar-vacina", controller('/usuarios-atrelar-vacina.php'), Colaborador::class);

// Vacinas
$route->add("{$subpath}/vacinas", controller('/vacinas.php'), User::class);
$route->add("{$subpath}/vacinas-cadastro", controller('/vacinas-cadastro.php'), Supervisor::class);
$route->add("{$subpath}/vacinas-editar", controller('/vacinas-editar.php'), Supervisor::class);
