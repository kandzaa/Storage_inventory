<?php
require_once './Models/OrdersModel.php';

class OrdersController
{
    public function orders()
    {
        if (Validator::Role() == false) { //only can use this if logged in
            header("Location: /login");
            exit();
        }
        require './view/orders.php';
        
    }
    
}



