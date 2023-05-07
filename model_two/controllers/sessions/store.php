<?php

$email = $_POST['email'];
$password = $_POST['password'];

$db = App::container()->resolve(Core\Database::class);

$errors =  [];
if(!Validator::email($email)){
    $errors['email'] = "Please enter a valid email address";
}
if(!Validator::string($password)){
    $errors['password'] = "Please provide a valid password";
}
if (! empty($errors)){
  return view("sessions/create.view.php", [
    "errors" => $errors,
  ]);
}
$user = $db->query("SELECT * FROM users WHERE email = :email", [
    "email" => $email,
  ])->find();


if (! $user){
    $errors['email'] = "No user with that email address exists";
    return view("sessions/create.view.php", [
        "errors" => $errors,
    ]);
}

if (password_verify($password, $user['password'])) {
    login([
        "email" => $email,
    ]);
    header("Location: /");
    exit();
}

return view("sessions/create.view.php", [
    "errors" => [
        "password" => "No matching user found for that email and password.",
    ],
]);
