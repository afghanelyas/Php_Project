<?php

namespace Core;

class App
{

    protected static Container $container;

    public static function setContainer($container): void
    {
        static::$container = $container;
    }

    public static function container(): Container
    {
        return static::$container;
    }

    public static function resolve($key): mixed
    {
        return static::container()->resolover($key);
    }
}