<?php

use Core\App;
use Core\Database;

try {
    $db = App::container()->resolve(Database::class);
} catch (Exception $e) {
    echo $e->getMessage();
    exit;
}

$errors = [];


$notes = $db->query("SELECT * FROM notes WHERE user_id = 18")->get();

view("notes/index.view.php", [
    "heading" => "My Notes",
    "notes"   => $notes
]); 