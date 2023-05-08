<?php

require base_path("Http/Forms/LoginForm.php");
require base_path("Core/Authenticator.php");
require base_path("Core/Session.php");

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();

if($form->validate($email , $password)){
    if((new Authenticator)->attemp($email, $password)) {
        redirect("/");
    }   
    $form->error("password", "No matching user found for that email and password.");
} 

Session::flash("errors", $form->errors());

return redirect("/login");





