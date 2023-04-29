<?php
require "Validator.php";
$config = require"config.php";
$db = new Database($config['database']);
$heading = "Create Note";

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    
    $errors = [];
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
require "views/note-create.view.php"; 