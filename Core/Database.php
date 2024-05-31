<?php

namespace Core;

// Saber se o código de criação do banco de dados foi executado.
class Database
{
    public static $SCHEMA_CRIADO = false;
    public \PDO $pdo;
    private \PDOStatement $statement;

    function __construct(array $config)
    {
        $dsn = $config['database'] . ':' . 'host=' . $config['host'] . ';port=' . $config['porta'] . ';dbname=' . $config['nome_db'];
        $this->pdo = new \PDO($dsn, $config['usuario'], $config['senha'], [\PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC, \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION]);
    }

    public function query(string $sql, array $params = null)
    {
        $this->statement = $this->pdo->prepare($sql);
        $this->statement->execute($params);
        return $this;
    }

    public function find()
    {
        return $this->statement->fetch();
    }

    public function findAll()
    {
        return $this->statement->fetchAll();
    }

    public function createSchema()
    {
        /* Le o arquivo vacinas.sql como uma string
         * Referencia: https://www.php.net/manual/en/function.file-get-contents.php
         */
        $sql_file = file_get_contents(base_path('/Migrations/tabelas.sql'));

        /* Tira qualquer tabulação, caso houver 
         * Referencia: https://www.php.net/manual/en/function.trim.php
         */
        $sqls_file = trim($sql_file, "\t");

        /* Particiona a string em um array, usando o ; como delimitaçao
         * Referencia: https://www.php.net/manual/en/function.explode.php
         */
        $sqls = explode(';', $sql_file);

        /* Retira qualquer string vazia do array 
         * https://www.php.net/manual/en/function.array-filter.php
         */
        $sqls = array_filter($sqls, fn($v) => !empty ($v));

        /* Itera sobre o array e vai executando cada sql */
        try {
            foreach ($sqls as $sql) {
                $this->pdo->query($sql);
            }
        } catch (\PDOException $ex) {

        }

        static::$SCHEMA_CRIADO = true;
    }
}