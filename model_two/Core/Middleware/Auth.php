<?php

namespace Core\Middleware;

class Auth
{

    /**
     * Check if user is logged in
     */
    public function handle(): void
    {
        if ( ! $_SESSION['user'] ?? false) {
            header("Location: /");
            exit;
        }
    }
}