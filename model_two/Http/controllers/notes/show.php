<?php

use Core\App;

$db = App::container()->resolve(Core\Database::class);

$currentUserId = 18;

$note = $db->query("SELECT * FROM notes WHERE id = :id" , [
    'id' => $_GET['id']
])->findOrFail();

authorize($note['user_id'] === $currentUserId);

view("notes/show.view.php" , [
    "heading" => "Note",
    "note" => $note
]); 

