<?php

use Core\Administrador;
use Core\Guest;
use Core\User;
use Core\Colaborador;
use Core\Supervisor;

// Home
$route->add('/', './index.html');
$route->add('/sobre-nos', './sobre-nos.php');
$route->add('/cadastro', './cadastro.php', Guest::class);
$route->add('/login', './login.php', Guest::class);

// Usuario
$route->add('/dashboard', './dashboard.php', User::class);
$route->add('/usuario', './usuario.php', User::class);
$route->add('/usuario-senha', './usuario-senha.php', User::class);
$route->add('/carteirinha', './usuario-carteirinha.php', User::class);
$route->add('/logout', './logout.php', User::class);

// Usuarios
$route->add('/usuarios', './usuarios.php', Colaborador::class);
$route->add('/usuarios-editar', './usuarios-editar.php', Colaborador::class);
$route->add('/usuarios-info', './usuarios-info.php', Colaborador::class);
$route->add('/usuarios-atrelar-vacina', './usuarios-atrelar-vacina.php', Colaborador::class);

// Vacinas
$route->add('/vacinas', './vacinas.php', User::class);
$route->add('/vacinas-cadastro', './vacinas-cadastro.php', Supervisor::class);
$route->add('/vacinas-editar', './vacinas-editar.php', Supervisor::class);
