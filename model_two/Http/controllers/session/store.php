<?php

require base_path("Http/Forms/LoginForm.php");

$db = App::container()->resolve(Core\Database::class);

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();
if(! $form->validate($email , $password)){
    return view("session/create.view.php", [
        "errors" => $form->errors(),
    ]);     
}

$user = $db->query("SELECT * FROM users WHERE email = :email", [
    "email" => $email,
  ])->find();


if ($user){
    if (password_verify($password, $user['password'])) {
        login([
            "email" => $email,
        ]);
        header("Location: /");
        exit();
    }
}
return view("session/create.view.php", [
    "errors" => [
        "password" => "No matching user found for that email and password.",
    ],
]);
