<?php

$route->add('/', './index.html');
$route->add('/cadastro', './cadastro.php', ['anon']);
$route->add('/login', './login.php', ['anon']);
$route->add('/logout', './logout.php', ['user', 'admin', 'supervisor', 'colaborador']);
$route->add('/dashboard', './dashboard.php', ['user', 'admin', 'supervisor', 'colaborador']);

// Dashboard
$route->add('/listar-usuarios', './listarUsuarios.php', ['admin', 'supervisor', 'colaborador']);
$route->add('/vacinas-adolescente', './vacinasAdolescente.php', ['user', 'admin', 'supervisor', 'colaborador']);
$route->add('/vacinas-infantil', './vacinasInfantil.php', ['user', 'admin', 'supervisor', 'colaborador']);
$route->add('/vacinas', './vacinas.php', ['user', 'admin', 'supervisor', 'colaborador']);
$route->add('/vacinas-cadastro', './vacinas-cadastro.php', ['admin', 'supervisor']);
$route->add('/vacinas-editar', './vacinas-editar.php', ['admin', 'supervisor', 'colaborador']);