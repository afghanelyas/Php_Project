<?php

namespace Core;

use PDO;
use PDOStatement;

class Database
{

    public PDO $connection;
    public PDOStatement $statement;

    public function __construct($config, $username = 'root', $password = "")
    {
        $dsn = 'mysql:'.http_build_query($config, '', ';');
        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
    }

    /**
     * Execute the statement
     */
    public function query($query, $prams = []): self
    {
        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($prams);

        return $this;
    }

    /**
     * Get all the results
     */
    public function get(): bool|array
    {
        return $this->statement->fetchAll();
    }

    /**
     * Get the first result
     */
    public function find(): bool|array
    {
        return $this->statement->fetch();
    }

    /**
     * Get the first result or throw an exception
     */
    public function findOrFail(): array
    {
        $result = $this->find();
        if ( ! $result) {
            abort();
        }

        return $result;
    }
}