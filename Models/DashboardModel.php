<?php
require_once './Models/Model.php';

class DashboardModel extends Model
{
    private $db;

    public function __construct()
    {
        $this->db = new DbConnect();
    }

    public function getTotalItems()
    {
        $sql = "SELECT COUNT(*) as total FROM inventory";

        return $this->db->execute($sql);
    }

    public function getLowStockItems()
    {
        $sql ="SELECT * FROM Inventory WHERE QUANTITY <= 10 ;";

        return $this->db->execute($sql);
    }
}