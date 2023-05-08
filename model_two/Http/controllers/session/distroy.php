<?php



(new Authenticator)->logout();

// redirect to the home page
header('Location: /');

exit();