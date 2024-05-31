<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/assets/css/default.css">
    <link rel="stylesheet" href="/public/assets/css/components.css">
    <link rel="stylesheet" href="/public/assets/css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Login</title>
</head>

<body>
    <?= partial('/notification') ?>
    <section class="c-login">
        <div class="c-screen-width">
            <div class="c-login__section">
                <div class="c-login__left"></div>
                <div class="c-login__right">
                    <h1 class="c-login__title">Entrar na conta</h1>
                    <form action="/login" method="post" class="c-form">
                        <div class="c-info__input">
                            <label for="cpf">Cpf</label>
                            <input type="text" name="cpf" id="cpf" placeholder="000.000.000-00" class="c-input"
                                required />
                        </div>
                        <div class="c-info__input">
                            <label for="senha">Senha</label>
                            <input type="password" name="senha" id="senha" placeholder="********" class="c-input"
                                required />
                            <a href="/reset-senha" class="c-link c-login__senha">Esqueci a senha</a>
                        </div>
                        <div class="c-buttons">
                            <input type="submit" value="Entrar" class="c-button__primary" />
                            <a href="/">
                                <div class="c-button__secondary">Voltar</div>
                            </a>
                        </div>
                    </form>
                    <?php if (isset($mensagem_erro)): ?>
                        <div class="c-login__erro">
                            <?php echo $mensagem_erro; ?>
                        </div>
                    <?php endif; ?>
                    <div class="c-login__cadastro">
                        <p>
                            Ainda não tem uma conta?
                            <a href="\cadastro" class="c-link">Cadastre-se</a>!
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
<script src="./public/assets/js/main.js"></script>

</html>