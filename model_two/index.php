<?php
error_reporting(E_ALL);

ini_set('display_errors', '1');


require "function.php";

require "Database.php";

$config = require("config.php");

$db = new Database($config['database']);
$posts = $db->query("select * from info")->fetchAll();
dd($posts);


