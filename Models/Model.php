<?php
require_once 'DbConnect.php';
abstract class Model
{
    public $db;

    public function __construct()
    {
        $this->db = new DbConnect();
    }
}
