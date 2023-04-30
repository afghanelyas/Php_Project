<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

const BASE_PATH = __DIR__.'/../';
require BASE_PATH ."function.php";

spl_autoload_register(function ($class){
    require base_path($class . ".php");
});
require base_path("router.php");

