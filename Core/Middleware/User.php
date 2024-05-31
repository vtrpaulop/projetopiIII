<?php

namespace Core\Middleware;

class User
{
    protected static string $funcao = 'user';
    protected static array $permissoes = ['user'];

    public static function resolve($usuario): bool
    {
        $permissoes_middleware = $usuario::getPermissoes();
        $index_middleware = array_search(static::$funcao, $permissoes_middleware);
        $usuario = $index_middleware || $index_middleware === 0 ? $permissoes_middleware[$index_middleware] : false;
        return $usuario;
    }

    public static function getPermissoes()
    {
        return static::$permissoes;
    }
}