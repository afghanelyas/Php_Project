<?php

use Core\App;

$db = App::container()->resolve(Core\Database::class);

$errors = [];


$notes = $db->query("SELECT * FROM notes WHERE user_id = 18")->get();

view("notes/index.view.php" , [
    "heading" => "My Notes",
    "notes" => $notes
]); 