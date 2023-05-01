<?php

use Core\Database;

require_once('CardTableSeeder.php');
$config = require_once(__DIR__ . '/../../config.php');
require_once(__DIR__ . '/../../Core/Database.php');

$pdo = new Database($config['database']);

$seeders = [
    new CardTableSeeder($pdo->connection),
];

foreach ($seeders as $seeder) {
    $seeder->call();
}