<?php
$config = require"config.php";
$db = new Database($config['database']);
$heading = "Create Note";

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    
    $errors = [];
    if(strlen($_POST['body']) === 0){
        $errors['body'] = "The body is should be filled";
    }

    if(strlen($_POST['body']) > 500){
        $errors['body'] = "The body is too long more than 500 characters";
    }

    if(empty($errors)){
        $db->query("INSERT INTO notes( body , user_id) VALUES ( :body, :user_id)" , [
            'body' => $_POST['body'],
            'user_id' => 2
        ]);
    }

}
require "views/note-create.view.php"; 