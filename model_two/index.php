<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');


require "function.php";

// require "router.php";

// connect to the database

$dns = "mysql:host=localhost;port=3306;dbname=myapp;user=elyas;password=123@Kabul@!@#;charset=utf8";

$pdo = new PDO($dns);


$statement = $pdo->prepare("SELECT * FROM info");

$statement->execute();


$result = $statement->fetchAll(PDO::FETCH_ASSOC);

foreach ($result as $row){

    echo "<li>" . $row['name'] . "</li>";

}