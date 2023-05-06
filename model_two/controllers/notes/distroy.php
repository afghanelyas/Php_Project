<?php

$db = App::container()->resolve(Core\Database::class);
$currentUserId = 12;

$note = $db->query("SELECT * FROM notes WHERE id = :id" , [
    'id' => $_POST['id']
])->findOrFail();

authorize($note['user_id'] === $currentUserId);

$db->query("DELETE FROM notes WHERE id = :id", [
    'id' => $_POST['id']
]);
header("Location: /notes");
exit;
