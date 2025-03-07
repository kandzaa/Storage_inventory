<?php

class InventoryController
{
    public function inventory()
    {
        if (Validator::Role() == false) { //only can use this if logged in
            header("Location: /login");
            exit();
        }
        require './view/inventory.php';
        
    }

   
}



