<?php

namespace Core;

// Saber se o código de criação do banco de dados foi executado.
class Database
{
    public static $SCHEMA_CRIADO = false;
    public \PDO $pdo;

    function __construct(array $config)
    {
        $dsn = $config['database'] . ':' . 'host=' . $config['host'] . ';port=' . $config['porta'] . ';dbname=' . $config['nome_db'];
        $this->pdo = new \PDO($dsn, $config['usuario'], $config['senha']);
    }

    public function createSchema()
    {
        try {
            $this->createRoles();
            $this->createUser();

        } catch (\PDOException $ex) {

        }

        static::$SCHEMA_CRIADO = true;
    }

    private function createUser()
    {
        $query = "CREATE TABLE usuarios (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nome VARCHAR(255) NOT NULL,
        sobreNome VARCHAR(255) NOT NULL,
        rg VARCHAR(20) NOT NULL,
        cpf VARCHAR(20) NOT NULL,
        cartaoSus VARCHAR(20) NOT NULL,
        endereco VARCHAR(255) NOT NULL,
        bairro VARCHAR(255) NOT NULL,
        email VARCHAR(255) UNIQUE NOT NULL,
        senha VARCHAR(255) NOT NULL,
        funcao_fk BIGINT NOT NULL,
        FOREIGN KEY (funcao_fk) REFERENCES funcoes(id)
        );";

        $statement = $this->pdo->prepare($query);

        $statement->execute();
    }

    private function createRoles()
    {
        $sql = "CREATE TABLE funcoes (
        id BIGINT AUTO_INCREMENT PRIMARY KEY,
        nome VARCHAR(255) NOT NULL UNIQUE
        );";

        $statement = $this->pdo->prepare($sql);
        $statement->execute();

        $sql_roles = "INSERT INTO funcoes (nome) VALUES('user'), ('admin'), ('supervisor'), ('colaborador')";

        $statement = $this->pdo->prepare($sql_roles);
        $statement->execute();
    }
}