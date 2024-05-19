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

        $array_key = array_search($funcao_usuario, $keys) ?? null;
        $value_exist = $array_key === 0 ? $keys[$array_key] : false;

        if (!$value_exist) {
            throw new \Exception("No matching Middleware found for the keys");
        }
    }
}