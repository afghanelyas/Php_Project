<?php
$heading = "Create Note";
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    var_dump("you are trying to create a new note");
}
require "views/note-create.view.php"; 