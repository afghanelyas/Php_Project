<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

const BASE_PATH = __DIR__.'/../';
require BASE_PATH  . "Core/function.php";

spl_autoload_register(function ($class){
   require base_path("Core/{$class}.php");
    
});
$router = new  Router();
$routes = require base_path('routes.php');
$uri  = parse_url( $_SERVER['REQUEST_URI'])['path'];

$method = isset($_POST['_method']) ? $_POST['_method'] : $_SERVER['REQUEST_METHOD'];
$router->route($uri , $method);