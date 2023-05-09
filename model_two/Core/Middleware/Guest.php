<?php

namespace Core\Middleware;

class Guest
{

    /**
     * Check if the user is not logged in
     */
    public function handle(): void
    {
        if ($_SESSION['user'] ?? false) {
            header("Location: /");
            exit;
        }
    }
}