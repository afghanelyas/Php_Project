<?php

require base_path("Http/Forms/LoginForm.php");
require base_path("Core/Authenticator.php");
require base_path("Core/Session.php");

$email = $_POST['email'];
$password = $_POST['password'];


LogingForm::validate($email , $password);

if((new Authenticator)->attemp($email, $password)) {
    redirect("/");
}   
    $form->error("password", "No matching user found for that email and password.");


Session::flash("errors", $form->errors());
Session::flash("old" , [
    'email' => $_POST['email']
]);

return redirect("/login");





