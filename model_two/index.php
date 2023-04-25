<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require "function.php";
// require "route.php";
require "Database.php";
$config = require"config.php";
$db = new Database($config['database']);

$name = $_GET['name'] ?? 1;;

$sql = "SELECT * FROM info WHERE name = ? ";

$post = $db->query($sql , [$name])->fetch();
echo "<pre>";
var_dump($post);
echo "</pre>";

