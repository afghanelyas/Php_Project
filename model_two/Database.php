
<?php

// Connect to the database, and execute the a query.

class Database {
    
    public $connection;

    public function __construct() {

        
        $dns = "mysql:host=localhost;port=3306;dbname=myapp;user=elyas;password=123@Kabul@!@#;charset=utf8";
        
        $this->connection = new PDO($dns);

    }

    public function query($query) {


        
        
        $statement = $this->connection->prepare($query);
        
        $statement->execute();
        
        
        return $statement;

    }

}