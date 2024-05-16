<?php

/*
 * Informações sobre a conexão com o Banco de Dados, altera-las para se conectar
 * à ele.
 * database - Nome do aplicativo de Banco de Dados. O padrão é o MySQL.
 * host - Link para o Banco de Dados, geralmente localhost quando o 
 * banco de dados está hospedado na própria máquina.
 * porta - A porta aonde o Banco de Dados se encontra, o padrão é 3306.
 * usuario - Nome de usuário de acesso do seu Banco de Dados.
 * senha - Senha de acesso do seu Banco de Dados.
 * nome_db - Nome do Schema (Banco de Dados) criado para o projeto.
 */

return $config = [
    'database' => 'mysql',
    'host' => 'localhost',
    'porta' => '3306',
    'usuario' => 'root',
    'senha' => '',
    'nome_db' => 'projetopi',
];