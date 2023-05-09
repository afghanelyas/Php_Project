<?php

use Core\Database;
use Core\App;
use Core\Validator;

try {
    $db = App::container()->resolve(Database::class);
} catch (Exception $e) {
    echo $e->getMessage();
    exit;
}

$errors = [];
if ( ! Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = "The body should no more 1000 characters.";
}

if ( ! empty($errors)) {
    view("notes/create.view.php", [
        "heading" => "Create Note",
        "errors"  => $errors
    ]);
    die();
}


$db->query("INSERT INTO notes( body , user_id) VALUES ( :body, :user_id)", [
    'body'    => $_POST['body'],
    'user_id' => 18
]);
header('Location: /notes');
exit;
