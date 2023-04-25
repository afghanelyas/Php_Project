<?php
// connect to the database, and execute a query

class Database {
    public $connection;
    public function __construct($config , $username = 'elyas', $password = "123@Kabul@!@#"){
      
        $dsn = 'mysql:' . http_build_query($config , '' , ';');
        $this->connection = new PDO($dsn , $username , $password , [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
    }
    public function query($query , $prams=[]){
        $statment = $this->connection->prepare($query);
        $statment->execute($prams);
        return $statment;
    }
}