<?php
require_once './Models/Model.php';

class UserModel extends Model
{
    public $db;

    public function register($username, $password, $passwordAgain, $role)
    {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $this->db->execute("INSERT INTO user (username, password, role) VALUES (?, ?, ?)", [$username, $password, $role]); //ķipa vajadzētu iet
    }
}