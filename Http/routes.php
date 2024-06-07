<?php

use Core\Middleware\Guest;
use Core\Middleware\User;
use Core\Middleware\Colaborador;
use Core\Middleware\Supervisor;

// Home
$route->add('/', controller('/index.php'));
$route->add('/playground', controller('/playground.php'));
$route->add('/sobre-nos', controller('/sobre-nos.php'));
$route->add('/cadastro', controller('/cadastro.php'), Guest::class);
$route->add('/login', controller('/login.php'), Guest::class);

// Usuario
$route->add('/dashboard', controller('/dashboard.php'), User::class);
$route->add('/usuario', controller('/usuario.php'), User::class);
$route->add('/usuario-senha', controller('/usuario-senha.php'), User::class);
$route->add('/carteirinha', controller('/usuario-carteirinha.php'), User::class);
$route->add('/logout', controller('/logout.php'), User::class);

// Usuarios
$route->add('/usuarios', controller('/usuarios.php'), Colaborador::class);
$route->add('/usuarios-editar', controller('/usuarios-editar.php'), Colaborador::class);
$route->add('/usuarios-info', controller('/usuarios-info.php'), Colaborador::class);
$route->add('/usuarios-atrelar-vacina', controller('/usuarios-atrelar-vacina.php'), Colaborador::class);

// Vacinas
$route->add('/vacinas', controller('/vacinas.php'), User::class);
$route->add('/vacinas-cadastro', controller('/vacinas-cadastro.php'), Supervisor::class);
$route->add('/vacinas-editar', controller('/vacinas-editar.php'), Supervisor::class);
