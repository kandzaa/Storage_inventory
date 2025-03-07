<?php

// require "Validator.php";
class DashboardController
{
    public function dashboard()
    {
        if (Validator::Role() == false) { //only can use this if logged in
            header("Location: /login");
            exit();
        }
        var_dump($_SESSION);
        include './view/dashboard.php';
    }
}
