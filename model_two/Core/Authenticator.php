<?php

namespace Core;

class Authenticator{

    public function attemp($email , $password){

        $user = App::container()->resolve(Core\Database::class)->query("SELECT * FROM users WHERE email = :email", [
            "email" => $email,
        ])->find();

        if ($user){
            if (password_verify($password, $user['password'])) {
                $this->login([
                    "email" => $email,
                ]);
                return true;
            }
        }
        return false;
    }

    public function login($user){
        $_SESSION['user'] = [
            "email" => $user['email'],
        ];
        session_regenerate_id(true);
    }
    
    public function logout(){

        Session::distory();
    
    }
}