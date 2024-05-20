<nav class="c-menu">
    <div class="c-menu__user">
        <img class="c-menu__user__image" src="/assets/images/default__user.png" alt="">
        <p class="c-menu__user__name">
            <?php echo \Core\Session::getUser()['nome'] . ' ' . \Core\Session::getUser()['sobrenome'] ?>
        </p>
    </div>
    <div class="c-menu__links">
        <a href="/dashboard"><button class="c-menu__link">Início</button></a>
        <a href="/carteirinha"><button class="c-menu__link">Carteirinha</button></a>
        <a href="/vacinas-cadastro"><button class="c-menu__link">Cadastrar vacina</button></a>
        <a href="/listar-usuarios"><button class="c-menu__link">Usuários</button></a>
        <a href="/vacinas-adolescente"><button class="c-menu__link">Vacinas Adolescentes</button></a>
        <a href="/vacinas-infantil"><button class="c-menu__link">Vacinas Infantil</button></a>
        <a href="/logout"><button class="c-menu__link">Sair</button></a>
    </div>
</nav>