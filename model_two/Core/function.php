<?php


use Core\Response;
use Core\Session;

function dd($value): void
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    die();
}


function urlIs($value): bool
{
    return $_SERVER['REQUEST_URI'] === $value;
}

function abort($code = 404): void
{
    http_response_code($code);
    require base_path("views/{$code}.php");
    die();
}

function authorize($condition, $status = Response::FORBIDDEN): void
{
    if ( ! $condition) {
        abort($status);
    }
}

function base_path($path): string
{
    return BASE_PATH.$path;
}

function view($path, $attributes = []): void
{
    extract($attributes);
    require base_path('views/'.$path);
}

function redirect($path): int
{
    header("Location: {$path}");
    exit();
}

function old($key, $default = ''): mixed
{
    return Session::get('old')[$key] ?? $default;
}



