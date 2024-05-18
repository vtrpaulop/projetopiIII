<?php

namespace Core;

class Session
{
    public function setUser(string $id, string $nome, string $funcao)
    {
        $_SESSION['user'] = [
            'id' => $id,
            'nome' => $nome,
            'funcao' => $funcao
        ];
    }

    public static function flush()
    {
        $_SESSION = [];
    }

    public function destroy()
    {
        static::flush();

        session_destroy();

        $params = session_get_cookie_params();
        setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
    }
}