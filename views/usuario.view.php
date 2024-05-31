<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/public/assets/css/default.css" />
    <link rel="stylesheet" href="/public/assets/css/components.css" />
    <link rel="stylesheet" href="/public/assets/css/dashboard.css" />
    <link rel="stylesheet" href="/public/assets/css/usuarios-info.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Dashboard - Suas Informações</title>
</head>

<body>

    <?php partial('/dashboard-menu') ?>
    <?php partial('/notification') ?>

    <section class="c-section">
        <div class="c-blocos">
            <div class="c-bloco__large">
                <h1 class="c-bloco__large__title">Suas Informações</h1>

                <div class="c-info">
                    <h2 class="c-info__title">Nome completo</h2>
                    <p class="c-info__description"><?= "{$usuario->nome()} {$usuario->sobreNome()}" ?></p>
                </div>

                <div class="c-info">
                    <h2 class="c-info__title">CPF</h2>
                    <p class="c-info__description"><?= $usuario->cpf() ?></p>
                </div>

                <div class="c-info">
                    <h2 class="c-info__title">RG</h2>
                    <p class="c-info__description"><?= $usuario->rg() ?></p>
                </div>

                <div class="c-info">
                    <h2 class="c-info__title">Cartão SUS</h2>
                    <p class="c-info__description"><?= $usuario->cartaoSus() ?></p>
                </div>

                <div class="c-info">
                    <h2 class="c-info__title">Data de nascimento</h2>
                    <p class="c-info__description"><?= formatDate($usuario->dataNascimento()) ?></p>
                </div>

                <div class="c-info">
                    <h2 class="c-info__title">Telefone</h2>
                    <p class="c-info__description"><?= $usuario->telefone() ?></p>
                </div>

                <div class="c-info">
                    <h2 class="c-info__title">Endereço</h2>
                    <p class="c-info__description"><?= "{$usuario->endereco()} - {$usuario->bairro()}" ?></p>
                </div>

                <div class="c-info">
                    <h2 class="c-info__title">Email</h2>
                    <p class="c-info__description"><?= $usuario->email() ?></p>
                </div>

                <div class="c-info">
                    <h2 class="c-info__title">Senha</h2>
                    <a href="/usuario-senha?id=<?= $usuario->id() ?>" class="c-info__description c-password">Editar
                        senha</a>
                </div>

            </div>
    </section>
    <script src="./public/assets/js/main.js"></script>
</body>

</html>