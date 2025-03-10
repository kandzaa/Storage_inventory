<?php

// require "Validator.php";
class AdminController
{
    public function show()
    {
        if (Validator::Role('ADMIN') == false) { //only can use this if logged in
            header("Location: /login");
            exit();
        }
        include './view/admin.php';
    }
}
