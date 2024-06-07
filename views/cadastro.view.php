<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/public/assets/css/default.css" />
    <link rel="stylesheet" href="/public/assets/css/components.css" />
    <link rel="stylesheet" href="/public/assets/css/cadastro.css" />
    <title>Cadastro</title>
</head>

<body>
    <section class="c-login">
        <div class="c-screen-width">
            <div class="c-login__section">
                <div class="c-login__left">
                    <h1 class="c-left__title display-2">Seja bem Vindo ao nosso Projeto Integrador!</h1>
                    <p class="c-left__description">Faça o cadastro e veja como funciona o nosso projeto.</p>
                    <p class="c-left__cadastro">Já tem uma conta?</p>
                    <a href="/login" class="c-left__link"><button
                            class="c-button__primary c-left__button">Entrar</button></a>

                </div>
                <div class="c-login__right">
                    <h2 class="c-login__title">Criar uma conta</h2>
                    <div class="c-form__progressbar">
                        <div class="c-form__progress c-progress-active"></div>
                        <div class="c-form__progress"></div>
                        <div class="c-form__progress"></div>
                    </div>
                    <form action="/cadastro" method="post" class="c-form">

                        <div class="c-form__box active">
                            <h3 class="diplay-3">Informações Pessoais</h3>
                            <div class="c-input__group">
                                <div class="c-info__input">
                                    <label for="nome">Nome</label>
                                    <input type="text" name="nome" id="nome" placeholder="Nome" class="c-input" />
                                </div>
                                <div class="c-info__input">
                                    <label for="sobreNome">Sobrenome</label>
                                    <input type="text" name="sobreNome" id="sobreNome" placeholder="Sobrenome"
                                        class="c-input" />
                                </div>
                            </div>
                            <div class="c-input__group">
                                <div class="c-info__input">
                                    <label for="rg">RG</label>
                                    <input type="text" name="rg" id="rg" placeholder="RG" class="c-input" />
                                </div>
                                <div class="c-info__input">
                                    <label for="cpf">CPF</label>
                                    <input type="text" name="cpf" id="cpf" placeholder="CPF" class="c-input" />
                                </div>
                            </div>

                            <div class="c-input__group">
                                <div class="c-info__input">
                                    <label for="dnascimento">Data Nascimento</label>
                                    <input type="date" name="dnascimento" id="dnascimento" placeholder="xx/xx/xxxx"
                                        class="c-input" />
                                </div>
                                <div class="c-info__input">
                                    <label for="telefone">Telefone</label>
                                    <input type="text" name="telefone" id="telefone" placeholder="(XX) X XXXX-XXXX"
                                        class="c-input" />
                                </div>
                            </div>
                            <div class="c-info__input">
                                <label for="cartaoSus">Cartão SUS</label>
                                <input type="text" name="cartaoSus" id="cartaoSus" placeholder="Cartão Sus"
                                    class="c-input" />
                            </div>
                        </div>

                        <div class="c-form__box">
                            <h3 class="display-3">Endereço</h3>
                            <div class="c-input__group">
                                <div class="c-info__input">
                                    <label for="endereco">Endereço</label>
                                    <input type="text" name="endereco" id="endereco" placeholder="Endereço"
                                        class="c-input" />
                                </div>
                                <div class="c-info__input">
                                    <label for="bairro">Bairro</label>
                                    <input type="text" name="bairro" id="bairro" placeholder="Bairro" class="c-input" />
                                </div>
                            </div>
                        </div>

                        <div class="c-form__box">
                            <h3 class="display-3">Conclusão</h3>
                            <div class="c-info__input">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" placeholder="E-mail" class="c-input" />
                            </div>
                            <div class="c-info__input">
                                <label for="senha">Senha</label>
                                <input type="password" name="senha" id="senha" placeholder="Senha" class="c-input" />
                            </div>
                            <div class="c-info__input">
                                <label for="senha__confirmar">Confirmar a senha</label>
                                <input type="password" name="senha__confirmar" id="senha__confirmar"
                                    placeholder="Confimar a senha" class="c-input" />
                            </div>
                        </div>

                        <div class="c-buttons">
                            <input type="button" value="Avançar" class="c-button__primary js-next">
                            <input type="submit" value="Cadastrar" class="c-button__primary js-submit hidden" />
                            <input type="button" value="Voltar" class="c-button__secondary js-previous hidden">
                        </div>
                    </form>
                    <a href="/">
                    </a>
                </div>
            </div>
        </div>
    </section>
    <script src="/public/assets/js/form-multi-step.js"></script>
</body>

</html>