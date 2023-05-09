<?php

use Core\App;


$db = App::container()->resolve(Core\Database::class);
$currentUserId = 18;

$note = $db->query("SELECT * FROM notes WHERE id = :id" , [
    'id' => $_POST['id']
])->findOrFail();

authorize($note['user_id'] === $currentUserId);

$db->query("DELETE FROM notes WHERE id = :id", [
    'id' => $_POST['id']
]);
header("Location: /notes");
exit;
