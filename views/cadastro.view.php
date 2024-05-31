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
                <div class="c-login__left"></div>
                <div class="c-login__right">
                    <h1 class="c-login__title">Criar uma conta</h1>
                    <form action="cadastro.php" method="post" class="c-form">
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
                        <div class="c-buttons">
                            <input type="submit" value="Cadastrar" class="c-button__primary" />
                            <a href="/">
                                <div class="c-button__secondary">Voltar</div>
                            </a>
                        </div>
                    </form>
                    <a href="/">
                    </a>
                </div>
            </div>
        </div>
    </section>
</body>

</html>