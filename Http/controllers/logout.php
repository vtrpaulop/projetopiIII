<?php

// Finaliza a sessão atual
\Core\Session::destroy();

// Redireciona para o arquivo index.html
redirect('/');