<?php
// Saber se o código de criação do banco de dados foi executado.

class Database
{
    public static $SCHEMA_CRIADO = false;
    public PDO $pdo;

    function __construct(array $config)
    {
        $dsn = $config['database'] . ':' . 'host=' . $config['host'] . ';port=' . $config['porta'] . ';dbname=' . $config['nome_db'];
        $this->pdo = new PDO($dsn, $config['usuario'], $config['senha']);
    }

    public function createSchema()
    {
        $this->createUser();

        static::$SCHEMA_CRIADO = true;
    }

    private function createUser()
    {
        $query = "CREATE TABLE Usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    senha VARCHAR(255) NOT NULL
    );";

        $statement = $this->pdo->prepare($query);

        $statement->execute();
    }
}