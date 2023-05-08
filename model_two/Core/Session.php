<?php

class Session{

    public static function has($key){

        return (bool) static::get($key);
    }

    public static function put($key , $value){

        $_SESSION[$key] = $value;

    }
    public static function get($key , $default = null){
       
        return $_SESSION['_flash'][$key] ?? $_SESSION[$key] ?? $default;
    }

    public static function flash($key , $value){

        $_SESSION['_flash'][$key] = $value;

    }

    public static function unflash($key){
    
            unset($_SESSION['_flash']);
    
        }
    
    public static function flush(){
        
            $_SESSION = [];

        }

    public static function distory(){
        $_SESSION = [];
        session_destroy();
        $prams = session_get_cookie_params();
        setcookie("PHPSESSID", "", time() - 3600, "/" , $prams["domain"], $prams["secure"], $prams["httponly"]);
    }

    
}