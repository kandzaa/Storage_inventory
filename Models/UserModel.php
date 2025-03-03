<?php
require_once './Models/Model.php';

class UserModel extends Model
{
    public $db;

    public function register($username, $password, $role)
    {
        $password = password_hash($password, PASSWORD_DEFAULT);
        return $this->db->execute("INSERT INTO user (username, password, role) VALUES (?, ?, ?)", [$username, $password, $role]); //ķipa vajadzētu iet
    }
    public function getUser($username){
        return $this->db->execute("SELECT * FROM USER WHERE USERNAME = ?", [$username]);
    }
}