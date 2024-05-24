<?php

namespace Core;

class Colaborador extends User
{
    #[\Override]
    protected static string $funcao = 'colaborador';
    #[\Override]
    protected static array $permissoes = ['user', 'colaborador'];
}