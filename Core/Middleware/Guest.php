<?php

namespace Core\Middleware;

class Guest extends User
{
    #[\Override]
    protected static string $funcao = 'guest';
    #[\Override]
    protected static array $permissoes = ['guest'];
}