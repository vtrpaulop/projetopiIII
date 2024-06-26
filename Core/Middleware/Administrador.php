<?php

namespace Core\Middleware;

class Administrador extends User
{
    #[\Override]
    protected static string $funcao = 'admin';
    #[\Override]
    protected static array $permissoes = ['user', 'admin', 'colaborador', 'supervisor'];
}