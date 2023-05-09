<?php

use Core\App;
use Core\Database;

try {
    $db = App::container()->resolve(Database::class);
} catch (Exception $e) {
    echo $e->getMessage();
    exit;
}

$currentUserId = 18;

$note = $db->query("SELECT * FROM notes WHERE id = :id", [
    'id' => $_POST['id']
])->findOrFail();

authorize($note['user_id'] === $currentUserId);

$db->query("DELETE FROM notes WHERE id = :id", [
    'id' => $_POST['id']
]);
header("Location: /notes");
exit;
