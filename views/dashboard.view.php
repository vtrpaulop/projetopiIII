<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/assets/css/default.css">
    <link rel="stylesheet" href="/public/assets/css/components.css">
    <link rel="stylesheet" href="/public/assets/css/dashboard.css">
    <title>Dashboard</title>
</head>

<body>
    <?php partial('/dashboard-menu') ?>

    <section class="c-section">
        <div class="c-section__title">
            <h1>Seja bem-vindo, <span class="u-color__red"><?php echo $nome_completo ?></span>!</h1>
        </div>

        <div class="c-blocos">

            <div class="c-bloco">
                <h2 class="c-bloco__title">Proximas vacinas</h2>
                <?php if ($vacinas_marcadas): ?>
                    <?php foreach ($vacinas_marcadas as $vacina): ?>
                        <?php if ($vacina['nome'] === $ultima_vacina_marcada['nome']): ?>
                            <div class="c-vacina c-vacina__first">
                                <span class="c-vacina__status"></span>
                                <p class="c-vacina__nome"><?= $vacina['nome'] ?></p>
                                <p class="c-vacina__data"><?= formatDate($vacina['data_vacina']) ?></p>
                            </div>
                            <?php continue; ?>
                        <?php endif; ?>
                        <div class="c-vacina">
                            <span class="c-vacina__status"></span>
                            <p class="c-vacina__nome"><?= $vacina['nome'] ?></p>
                            <p class="c-vacina__data"><?= formatDate($vacina['data_vacina']) ?></p>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="c-vacina__nome">Nenhuma vacina marcada.</p>
                <?php endif; ?>
                <a href="/carteirinha#vacinas-marcada"><button class="c-bloco__button">Ver meu calendário
                        completo</button></a>
            </div>

            <div class="c-bloco">
                <h2 class="c-bloco__title">Últimas vacinas tomadas</h2>
                <?php if ($vacinas_tomadas): ?>
                    <?php foreach ($vacinas_tomadas as $vacina): ?>
                        <?php if ($vacina['nome'] === $ultima_vacina_tomada['nome']): ?>
                            <div class="c-vacina c-vacina__first">
                                <span class="c-vacina__status"></span>
                                <p class="c-vacina__nome"><?= $vacina['nome'] ?></p>
                                <p class="c-vacina__data"><?= formatDate($vacina['data_vacina']) ?></p>
                            </div>
                            <?php continue; ?>
                        <?php endif; ?>

                        <div class="c-vacina">
                            <span class="c-vacina__status"></span>
                            <p class="c-vacina__nome"><?= $vacina['nome'] ?></p>
                            <p class="c-vacina__data"><?= formatDate($vacina['data_vacina']) ?></p>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="c-vacina__nome">Nenhuma vacina registrada por enquanto.</p>
                <?php endif; ?>
                <a href="/carteirinha#vacinas-tomadas"><button class="c-bloco__button">Ver carteirinha
                        completa</button></a>
            </div>
            <a href="http://www.ccms.saude.gov.br/revolta/pdf/M7.pdf">
                <div class="c-banner">
                    <div class="c-banner__image">
                        <img src="/public/assets/images/image_vacina.png" alt="">
                    </div>
                    <div class="c-banner__info">
                        <h2 class="c-banner__title">Conheça a história da vacinação</h2>
                        <p class="c-banner__description">Acompanhe uma linha do tempo aonde irá te mostrar os marcos
                            mais
                            importantes da nossa conquista
                            por esse direito!
                        </p>
                    </div>
                </div>
            </a>
        </div>
    </section>

</body>

</html>