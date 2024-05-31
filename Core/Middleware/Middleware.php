<?php

namespace Core\Middleware;

class Middleware
{
    protected const MAP = [
        'guest' => Guest::class,
        'user' => User::class,
        'colaborador' => Colaborador::class,
        'supervisor' => Supervisor::class,
        'admin' => Administrador::class
    ];

    public static function resolve($middleware)
    {
        if (!isset($middleware)) {
            return;
        }

        $funcao_usuario = \Core\Session::getUser()['funcao'] ?? null;
        $funcao = static::MAP[$funcao_usuario] ?? null;

        if (!isset($funcao)) {
            throw new \Exception("No matching Middleware found for the key {$funcao_usuario}");
        }

        if (!$middleware::resolve($funcao)) {
            throw new \Exception("This user is not allowed to access this area");
        }
    }

    public static function authorized($middleware)
    {

        $funcao_usuario = \Core\Session::getUser()['funcao'] ?? null;
        $funcao = static::MAP[$funcao_usuario] ?? null;

        if (!isset($funcao)) {
            throw new \Exception("No matching Middleware found for the key {$funcao_usuario}");
        }

        return $middleware::resolve($funcao);
    }
}