<?php

namespace Core;

class Session
{
    public static function setUser(string $id, string $nome, string $sobrenome, string $funcao, bool $logged = true)
    {
        $_SESSION['user'] = [
            'logged' => $logged,
            'id' => $id,
            'nome' => $nome,
            'sobrenome' => $sobrenome,
            'funcao' => $funcao
        ];
    }

    public static function getUser()
    {
        return $_SESSION['user'] ?? null;
    }

    public static function setMiddleware(string|null $middleware)
    {
        if (!isset($middleware)) {
            return;
        }

        $_SESSION['middleware'] = $middleware;
    }

    public static function getMiddleware()
    {
        return $_SESSION['middleware'];
    }

    public static function setTemp(string $key, string|array $value)
    {
        $_SESSION['__temp'][$key] = $value;
    }

    public static function getTemp(string $key)
    {
        return $_SESSION['__temp'][$key] ?? null;
    }

    public static function flushTemp()
    {
        unset($_SESSION['__temp']);
    }

    public static function flush()
    {
        $_SESSION = [];
    }

    public static function destroy()
    {
        static::flush();

        session_destroy();

        $params = session_get_cookie_params();
        setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
    }
}