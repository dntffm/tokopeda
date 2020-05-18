<?php

class Login_model{
    private $table = "user";
    private $db;

    public function __construct(){
        $this->db = new Database;
    }
    public function getUser($username){
        $query = "SELECT * FROM ".$this->table." WHERE username = :username";
       
        $this->db->query($query);
        $this->db->bind("username",$username);
        return $this->db->single();

        
    }
}