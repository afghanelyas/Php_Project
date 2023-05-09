<?php

use Core\App;
use Core\Database;

try {
    $db = App::container()->resolve(Database::class);
} catch (\Exception $e) {
    echo $e->getMessage();
    exit;
}

$currentUserId = 18;

$note = $db->query("SELECT * FROM notes WHERE id = :id", [
    'id' => $_GET['id']
])->findOrFail();

authorize($note['user_id'] === $currentUserId);

view("notes/edit.view.php", [
    "heading" => "Edit Note",
    "errors"  => [],
    "note"    => $note
]); 