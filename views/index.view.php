<?php

use Core\Session;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://rsms.me/" />
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    <link rel="stylesheet" href="<?= assets("/css/default.css") ?>" />
    <link rel="stylesheet" href="<?= assets("/css/components.css") ?>" />
    <link rel="stylesheet" href="<?= assets("/css/index.css") ?>" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Carteira Vacinação</title>
</head>

<body>
    <nav class="c-nav">
        <div class="c-screen__width c-nav__section">
            <ul class="c-nav__menu">
                <li><a class="c-nav__link c-link" href="">Inicio</a></li>
                <li>
                    <a class="c-nav__link c-link" href="sobre-nos">Sobre nós</a>
                </li>
                <li><a class="c-nav__link c-link" href="contato">Contato</a></li>
            </ul>
            <ul class="c-nav__button">

                <?php if (\Core\Session::getUser()['logged']): ?>
                    <li>
                        <a href="dashboard">
                            <button class="c-button__primary">Dashboard</button>
                        </a>
                    </li>
                    <li>
                        <a href="logout">
                            <button class="c-button__secondary">Sair</button>
                        </a>
                    </li>
                <?php else: ?>
                    <li>
                        <a href="cadastro">
                            <button class="c-button__primary">Fazer cadastro</button>
                        </a>
                    </li>
                    <li>
                        <a href="login">
                            <button class="c-button__secondary">Entrar</button>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>

    <section class="c-header__section">
        <div class="c-screen__width">
            <div class="c-header__text">
                <h1 class="display-1 c-header__title">Tenha controle total sobre sua carteirinha de vacinação</h1>
                <p>
                    Nosso aplicativo de carteira de vacinação digital é a maneira mais fácil e conveniente de acompanhar suas vacinas. É gratuito, fácil de usar e seguro. Comece a usar hoje mesmo e tenha a tranquilidade de saber que suas vacinas estão sempre atualizadas. </p>
                <div class="c-header__buttons">
                    <ul class="c-nav__button">
                        <li>
                            <a href="cadastro">
                                <button class="c-button__primary">Fazer cadastro</button>
                            </a>
                        </li>
                        <li>
                            <a href="login">
                                <button class="c-button__secondary">Entrar</button>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="c-header__background">
                <div class="c-background"></div>
            </div>
        </div>
    </section>

    <section class="c-section__component c-section__about">
        <div class="c-screen__width">
            <div class="c-component">
                <div class="c-component__description">
                    <h2 class="display-2 c-component__title">Sua carteirinha, agora Digital</h2>
                    <p class="c-component__text">Acompanhe sempre as vacinas em que você já tomou e nunca mais se preocupe com perder a sua carteirinha. As suas informações são guardadas em nuvem para que você consiga acessa-las de onde você quiser e a qualquer momento.</p>
                    <div class="c-component__cards">
                        <div class="c-component__card">
                            <i class="fa-solid fa-hospital-user c-card__icon"></i>
                            <h3 class="display-3 c-card__title">Próximas vacinas</h3>
                            <p class="c-card__text">Saiba das próximas vacinas direto do app</p>
                        </div>
                        <div class="c-component__card">
                            <i class="fa-solid fa-hospital-user c-card__icon"></i>
                            <h3 class="display-3 c-card__title">Vacinas tomadas</h3>
                            <p class="c-card__text">Acompanhe as vacinas já tomadas</p>
                        </div>
                    </div>
                </div>
                <div class="c-component__image">
                    <img src="<?= assets("/images/about-us.png") ?>" alt="">
                </div>
            </div>
        </div>
    </section>

    <section class="c-section__component c-section__date">
        <div class="c-screen__width">
            <div class="c-component c-date">
                <div class="c-component__description">
                    <h2 class="display-2 c-component__title">Nunca mais perca as datas de suas vacinas</h2>
                    <p class="c-component__text">Nunca mais perca das datas de suas próximas vacinas. O profissional de saúde controla as datas das próximas vacinas para que você não precise se preocupar mais.</p>
                </div>
                <div class="c-component__image">
                    <img src="<?= assets("/images/date.png") ?>" alt="">
                </div>
            </div>
        </div>
    </section>

    <section class="c-section__board">
        <div class="c-screen__width">
            <div class="c-board">
                <div class="c-board__description">
                    <h2 class="display-2 c-board__title">
                        Projeto que soluciona dores da comunidade
                    </h2>
                    <p class="c-board__text">
                        Este é um projeto conceito feito para a matéria Projeto Integrador III, aonde os alunos da UNIVESP tem que fazer pesquisas e projetos para ajudar, compreender e possivelmente solucionar problemas em que a nossa comunidade enfrenta.
                    </p>

                    <p class="c-board__github">
                        Caso queira saber mais sobre o projeto e seus idealizadores, acesse o nosso <a href="https://github.com/vtrpaulop/projetopiIII">GitHub</a>.
                    </p>
                </div>

                <img src="<?= assets("/images/univesp-logo.png") ?>" alt="Univesp Logo" class="c-board__image">
            </div>
        </div>
    </section>

</body>

</html>