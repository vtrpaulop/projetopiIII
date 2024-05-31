<?php

namespace Core\Middleware;

class Colaborador extends User
{
    #[\Override]
    protected static string $funcao = 'colaborador';
    #[\Override]
    protected static array $permissoes = ['user', 'colaborador'];
}