<?php

require base_path('Core/Validator.php');

$db = App::container()->resolve(Core\Database::class);

$errors = [];
if(! Validator::string($_POST['body'], 1 , 1000)){
    $errors['body'] = "The body should no more 1000 characters.";
}

if(! empty($errors)){
    view("notes/create.view.php" , [
        "heading" => "Create Note",
        "errors" => $errors
    ]); 
    die();
} 

if(empty($errors)){
    $db->query("INSERT INTO notes( body , user_id) VALUES ( :body, :user_id)" , [
        'body' => $_POST['body'],
        'user_id' => 12
    ]);
    header('Location: /notes');
    die();
}
