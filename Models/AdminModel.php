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

    public function updateUser($id, $username, $password, $role)
    {
        $sql = "UPDATE USER SET USERNAME = ?, PASSWORD = ?, ROLE = ? WHERE ID = ?";
        return $this->db->execute($sql, [$username, $password, $role, $id]);
    }
}
