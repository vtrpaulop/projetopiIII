<?php

use Core\Administrador;
use Core\Guest;
use Core\User;
use Core\Colaborador;
use Core\Supervisor;

$route->add('/', './index.html');
$route->add('/cadastro', './cadastro.php', Guest::class);
$route->add('/login', './login.php', Guest::class);
$route->add('/logout', './logout.php', User::class);
$route->add('/dashboard', './dashboard.php', User::class);

// Dashboard
$route->add('/usuarios', './usuarios.php', Colaborador::class);
$route->add('/usuarios-editar', './usuarios-editar.php', Colaborador::class);
$route->add('/vacinas-cadastro', './vacinas-cadastro.php', Supervisor::class);
$route->add('/vacinas', './vacinas.php', User::class);
$route->add('/vacinas-editar', './vacinas-editar.php', Supervisor::class);
$route->add('/usuarios-info', '/usuarios-info.php', Colaborador::class);