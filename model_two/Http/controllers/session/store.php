<?php

require base_path("Http/Forms/LoginForm.php");
require base_path("Core/Authenticator.php");
require base_path("Core/Session.php");

$form = LoginForm::validate($attributes = [  
    'email' => $_POST['email'],
    'password' => $_POST['password']

]);

$signedIn = (new Authenticator)->attemp(
    $attributes['email'] , $attributes['password']
);
    
if(!$signedIn) {
    $form->error(
        "email", "No matching user found for that email and password."
        )->throw();
}   
redirect("/");



