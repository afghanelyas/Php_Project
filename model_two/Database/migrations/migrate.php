<?php

use Core\Database;

require_once('CreateNotesTable.php');
require_once('CreateCardsTable.php');
$config = require_once(__DIR__ . '/../../config.php');
require_once(__DIR__ . '/../../Core/Database.php');

$pdo = new Database($config['database']);

$migrations = [
    new CreateNotesTable($pdo->connection),
    new CreateCardsTable($pdo->connection),
];

foreach ($migrations as $migration) {
    $migration->migrate();
}