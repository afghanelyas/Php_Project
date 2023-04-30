<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

const BASE_PATH = __DIR__.'/../';
require BASE_PATH ."Core/function.php";

spl_autoload_register(function ($class){
    $class = str_replace('\\', '/', $class); 
    require base_path("{$class}.php");
});
require base_path("Core/router.php");

