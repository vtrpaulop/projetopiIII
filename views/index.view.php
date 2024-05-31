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
    <link rel="stylesheet" href="/public/assets/css/default.css" />
    <link rel="stylesheet" href="/public/assets/css/components.css" />
    <link rel="stylesheet" href="/public/assets/css/index.css" />
    <title>Carteira Vacinação</title>
</head>

<body>
    <nav class="c-nav">
        <div class="c-screen__width c-nav__section">
            <div>Logo</div>
            <ul class="c-nav__menu">
                <li><a class="c-nav__link c-link" href="/">Inicio</a></li>
                <li>
                    <a class="c-nav__link c-link" href="/sobre-nos">Sobre nós</a>
                </li>
                <li><a class="c-nav__link c-link" href="/contato">Contato</a></li>
            </ul>
            <ul class="c-nav__button">

                <?php if (Session::getUser()['logged']): ?>
                    <li>
                        <a href="/dashboard">
                            <button class="c-button__primary">Dashboard</button>
                        </a>
                    </li>
                    <li>
                        <a href="/logout">
                            <button class="c-button__secondary">Sair</button>
                        </a>
                    </li>
                <?php else: ?>
                    <li>
                        <a href="/cadastro">
                            <button class="c-button__primary">Fazer cadastro</button>
                        </a>
                    </li>
                    <li>
                        <a href="/login">
                            <button class="c-button__secondary">Entrar</button>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>

    <section class="c-header__section">
        <div class="c-screen__width">
            <div class="c-header">
                <div class="c-header__text">
                    <h1>Tenha controle da sua carteirinha de vacinação</h1>
                    <p>
                        Com a carteirinhaPlus você não perde nenhuma data para a vacinaç<a href="loginAdmin.php"
                            style="color: black">ã</a>o, além de você sempre ter um lugar para lembra-los!
                    </p>
                    <div class="c-header__buttons">
                        <ul class="c-nav__button">
                            <li>
                                <a href="/cadastro">
                                    <button class="c-button__primary">Fazer cadastro</button>
                                </a>
                            </li>
                            <li>
                                <a href="/login">
                                    <button class="c-button__secondary">Entrar</button>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="c-header__wrapper__image">
                    <img src="/public/assets/images/header_image.svg" alt="" class="c-header__image" />
                </div>
            </div>
        </div>
    </section>
</body>

</html>