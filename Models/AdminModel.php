<?php
require_once './Models/Model.php';

class AdminModel extends Model
{
    public $db;

    public function __construct()
    {
        $this->db = new DbConnect();
    }


    public function getUsers()
    {
        $sql = "SELECT * FROM USER";


        return $this->db->execute($sql);
    }
}