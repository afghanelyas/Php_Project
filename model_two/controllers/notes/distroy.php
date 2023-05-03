<?php

$config = require base_path("config.php");
$db = new Database($config['database']);

// request for delect query
$currentUserId = 2;

$note = $db->query("SELECT * FROM notes WHERE id = :id" , [
    'id' => $_POST['id']
])->findOrFail();
authorize($note['user_id'] === $currentUserId);
$db->query("DELETE FROM notes WHERE id = :id", [
    'id' => $_POST['id']
]);
header("Location: /notes");
exit;
