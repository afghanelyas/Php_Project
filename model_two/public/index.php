<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');


session_start();

const BASE_PATH = __DIR__.'/../';
require BASE_PATH  . "Core/function.php";
require base_path("bootstrap.php");

spl_autoload_register(function ($class){
   require base_path("Core/$class.php");
});
$router = new  Router();
$routes = require base_path('routes.php');
$uri  = parse_url( $_SERVER['REQUEST_URI'])['path'];

$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];
$router->route($uri , $method);

Session::unflash();