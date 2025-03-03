<?php
require_once './DbConnect.class.php';
class DashboardController
{
    public function dashboard()
    {
        $db = new DbConnect();
        $sql = "SELECT * FROM inventory";
        $products = $db->execute($sql);
        $quentity = $db->execute("SELECT * FROM Inventory WHERE QUANTITY <= 10 ;");

         
        include './view/dashboard.php';
    }
    
}