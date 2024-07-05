<?php
use Core\Middleware\Middleware;

?>
<nav class="c-menu">
    <div class="c-menu__links">
        <a href="/dashboard"><button class="c-menu__link">Início</button></a>
        <a href="/carteirinha"><button class="c-menu__link">Carteirinha</button></a>
        <?php if (Middleware::authorized(\Core\Middleware\Supervisor::class)): ?>
            <a href="/vacinas-cadastro"><button class="c-menu__link">Cadastrar vacina</button></a>
        <?php endif; ?>
        <?php if (Middleware::authorized(\Core\Middleware\Administrador::class)): ?>
            <a href="/usuarios"><button class="c-menu__link">Usuários</button></a>
        <?php endif; ?>
        <a href="/vacinas"><button class="c-menu__link">Todas as vacinas</button></a>
        <a href="/usuario?id=<?= \Core\Session::getUser()['id'] ?>"><button class="c-menu__link">Perfil</button></a>

        <a href="/logout"><button class="c-menu__link">Sair</button></a>
    </div>
</nav>