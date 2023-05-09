<?php

namespace Core\Middleware;

use Exception;

class Middleware
{

    // Map middleware to key
    public const MAP = [
        'guest' => Guest::class,
        'auth'  => Auth::class,
    ];

    /**
     * Resolve middleware
     * @throws Exception
     */
    public static function resolve($key): void
    {
        if ( ! $key) {
            return;
        }

        $middleware = static::MAP[$key] ?? false;
        if ( ! $middleware) {
            throw new Exception('No middleware found for this route');
        }
        (new $middleware)->handle();
    }
}