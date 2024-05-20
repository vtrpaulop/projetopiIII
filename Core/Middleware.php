<?php

namespace Core;

class Middleware
{
    public static function resolve($keys)
    {
        if (!isset($keys)) {
            return;
        }

        $funcao_usuario = Session::getUser()['funcao'] ?? null;

        if ($keys[0] === 'anon' && empty($funcao_usuario)) {
            return;
        } elseif ($keys[0] === 'anon' && !empty($funcao_usuario)) {
            throw new \Exception("This user is not allowed to access this area.");
        }

        $array_key = array_search($funcao_usuario, $keys);
        $value = $keys[$array_key] ?? null;

        if (!$value) {
            throw new \Exception("No matching Middleware found for the keys");
        }
    }

    public static function authorized()
    {
        $user_funcao = Session::getUser()['funcao'];
        $funcoes_autorizadas = Session::getMiddleware();
        $user_index = array_search($user_funcao, $funcoes_autorizadas);
        $funcao = $funcoes_autorizadas[$user_index] ?? null;

        return isset($funcao);
    }
}