<?php
require base_path("Validator.php");
$config = require base_path("config.php");
$db = new Database($config['database']);

$errors = [];
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $validator = new Validator();
    if(! $validator::string($_POST['body'], 1 , 400)){
        $errors['body'] = "The body should no more 400 characters.";
    }
    if(empty($errors)){
        $db->query("INSERT INTO notes( body , user_id) VALUES ( :body, :user_id)" , [
            'body' => $_POST['body'],
            'user_id' => 2
        ]);
    }

}
view("/notes/create.view.php" , [
    "heading" => "Create Note",
    "errors" => $errors
]); 