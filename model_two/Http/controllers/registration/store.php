<?php

use Core\App;

$email = $_POST['email'];
$password = $_POST['password'];

//validate the form input
$errors =  [];
if(!Validator::email($email)){
    $errors['email'] = "Please enter a valid email address";
}
if(!Validator::string($password , 7, 255)){
    $errors['password'] = "Please provide a password of at least seven characters";
}
if (! empty($errors)){
  return view("registration/create.view.php", [
    "errors" => $errors,
  ]);
}
$db = App::container()->resolve(Core\Database::class);
$user = $db->query("SELECT * FROM users WHERE email = :email", [
  "email" => $email,
])->find();

// if yes, redirect to a login page.
if($user){
    // then someone with the same email already exists and has an account
    // if yes, redirect to a login page.
    header("Location: /");
    exit();
}else{
    // if not, save one to the database, and then log the user in, and redirect back to the home page.
    $db->query("INSERT INTO users ( email, password) VALUES ( :email, :password)", [

        "email" => $email,
        "password" => password_hash($password, PASSWORD_BCRYPT),
    ]);

    // mark that the user has logged in by setting a session variable
   login($user);
    
    header("Location: /");
    exit();
}