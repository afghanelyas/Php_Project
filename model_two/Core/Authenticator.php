<?php

namespace Core;

class Authenticator
{

    /**
     * Attempt to log in the user
     */
    public function attempt($email, $password): bool
    {
        $user = App::container()->resolve(Database::class)
            ->query("SELECT * FROM users WHERE email = :email", ["email" => $email])
            ->find();

        if ($user) {
            if (password_verify($password, $user['password'])) {

                $this->login(["email" => $email]);

                return true;
            }
        }

        return false;
    }

    /**
     * Login the user and generate the session
     */
    public function login($user): void
    {
        $_SESSION['user'] = [
            "email" => $user['email'],
        ];

        session_regenerate_id(true);
    }

    /**
     * Logout user
     */
    public function logout(): void
    {
        Session::distory();
    }
}