<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require "function.php";
require "Database.php";
require "Response.php";
require "router.php";
$config = require"config.php";
$db = new Database($config['database']);

