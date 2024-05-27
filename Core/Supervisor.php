<?php

namespace Core;

class Supervisor extends User
{
    #[\Override]
    protected static string $funcao = 'supervisor';
    #[\Override]
    protected static array $permissoes = ['user', 'colaborador', 'supervisor'];
}