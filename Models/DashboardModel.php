<?php
require_once './Models/Model.php';

class DashboardModel extends Model
{
    public $db;

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

    public function getRecentItems()
    {
        date_default_timezone_set("Europe/Riga");
        $Mytime = date('Y-m-d H:i:s');
        $Agrāk = date('Y-m-d H:i:s', strtotime('-8 days'));
        $sql = "SELECT * FROM Inventory WHERE LASTUPDATE >= '$Agrāk' AND LASTUPDATE <= '$Mytime'";
        return $this->db->execute($sql);
    }
}