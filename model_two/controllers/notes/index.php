<?php

$db = App::container()->resolve(Core\Database::class);

$errors = [];

$notes = $db->query("SELECT * FROM notes WHERE user_id = 2")->get();
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(! Validator::string($_POST['body'], 1 , 1000)){
        $errors['body'] = "The body should no more 1000 characters.";
    }
    if(empty($errors)){
        $db->query("INSERT INTO notes( body , user_id) VALUES ( :body, :user_id)" , [
            'body' => $_POST['body'],
            'user_id' => 2
        ]);
    }
}
view("notes/index.view.php" , [
    "heading" => "My Notes",
    "notes" => $notes
]); 