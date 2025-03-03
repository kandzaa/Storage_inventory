<?php

class DbConnect{

    public $dbconn;
    private $config;

    function __construct()
    {
        $this->config = require "config.php";
        $this->dbconn = new PDO ('mysql:'.http_build_query($this->config,"",";"));
        $this->dbconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->dbconn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }

    function __destruct()
    {
        $this->dbconn = null;
    }

    function getConnection(){
        return $this->dbconn;
    }
}
 
