<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');


require "function.php";

require "Database.php";

$db = new Database();

$posts = $db->query("select * from info")->fetchAll(PDO::FETCH_ASSOC);

dd($posts);

