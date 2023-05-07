<?php

function dd($value){
    echo "<pre>";
    var_dump('$_SERVER');
    echo "</pre>";
    die();
};

function urlIs($value){
    return $_SERVER['REQUEST_URI'] === $value;
}
function abort($code = 404) {
    http_response_code($code);
    require base_path("views/{$code}.php");
    die();
}

function authorize($condition , $status = Response::FORBIDDEN){
    if (! $condition){
        abort($status);
    }
}

function base_path($path) {
    return BASE_PATH . $path;
}

function view($path , $attributes = []){
    extract($attributes);
    require base_path('views/' . $path);
}

function login($user){
    $_SESSION['user'] = [
        "email" => $user['email'],
    ];
    session_regenerate_id(true);
}

function logout(){
    
    $_SESSION = [];
    session_destroy();
    $prams = session_get_cookie_params();
    setcookie("PHPSESSID", "", time() - 3600, "/" , $prams["domain"], $prams["secure"], $prams["httponly"]);

}

