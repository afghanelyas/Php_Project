<?php

require_once('BaseMigration.php');

class CreateNotesTable extends BaseMigration
{

    public function up(): void
    {
        $this->pdo->exec("
            CREATE TABLE `notes` (
                `id` INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                `title` VARCHAR(255) NOT NULL,
                `body` VARCHAR(255) NOT NULL,
                `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
        ");
    }

    public function down(): self
    {
        $this->pdo->exec("DROP TABLE IF EXISTS `notes`");

        return $this;
    }
}

