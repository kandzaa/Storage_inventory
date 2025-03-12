<?php

// require "Validator.php";
class AdminController
{
    public function show()
    {
        if (Validator::Role('ADMIN') == false) {
            header("Location: /login");
            exit();
        }
        include './view/admin.php';
    }
}
