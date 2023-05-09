<?php 

namespace Core\Middleware;

class Middleware{
    public const MAP = [
        'guest' =>  Guest::class,
        'auth' => Auth::class,
    ];

    public static function resolve($key){
        if(!$key){
            return;
        }

        $middleware = static::MAP[$key] ?? false;
        if(!$middleware){
            throw new Exception('No middleware found for this route');
        }   
        (new $middleware)->handle();
    }
}