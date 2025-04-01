<?php
require_once './Models/Model.php';

class OrdersModel extends Model
{
    public $db;


    public function __construct()
    {
        $this->db = new DbConnect();
    }

    public function getLogs()
    {
        $sql = "SELECT 
                    *
                FROM LOGS 
               ";

        return $this->db->execute($sql);
    }



    
}