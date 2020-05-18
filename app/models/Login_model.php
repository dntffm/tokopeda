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
    public function getCustomer($username){
        $query = "SELECT * FROM customer WHERE cust_uname = :username";
       
        $this->db->query($query);
        $this->db->bind("username",$username);
        return $this->db->single();

        
    }
    public function registerCustomer($data){
        $query = "INSERT INTO customer
                    VALUES('',:cust_uname,:password,:email_cust)";

        $this->db->query($query);
        
        $this->db->bind("cust_uname",$data["username"]);
        $this->db->bind("password",$data["password"]);
        $this->db->bind("email_cust",$data["email"]);
        
        $this->db->execute();
      
        return $this->db->rowCount();
    }
}