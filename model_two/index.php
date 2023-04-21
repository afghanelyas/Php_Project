<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require "function.php";
// require "route.php";
require "Database.php";
$config = require"config.php";
$db = new Database($config['database']);
$post = $db->query("select * from info")->fetchAll();
echo "<pre>";
var_dump($post);
echo "</pre>";

