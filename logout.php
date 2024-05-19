<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '.\autentica.php';

// Finaliza a sessão atual
\Core\Session::flush();

// Redireciona para o arquivo index.html
header('Location: /');
exit();