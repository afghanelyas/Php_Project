<?php

$db = App::container()->resolve(Core\Database::class);

$currentUserId = 12;

$note = $db->query("SELECT * FROM notes WHERE id = :id" , [
    'id' => $_GET['id']
])->findOrFail();

authorize($note['user_id'] === $currentUserId);

view("notes/edit.view.php" , [
    "heading" => "Edit Note",
    "errors" => [],
    "note" => $note
]); 