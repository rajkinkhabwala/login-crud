<?php
class Database{

    public $db;

    public function __construct()
    {
        $this->db = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);
        
    }
}
?>