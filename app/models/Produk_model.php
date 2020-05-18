<?php

class Produk_model{
    private $table = "product";
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getAllProducts(){
        $this->db->query("SELECT * FROM ".$this->table);
        return $this->db->resultSet();
    }

    public function getProductSepeda(){
        $this->db->query("SELECT * FROM ".$this->table.' WHERE kind="sepeda"');
        return $this->db->resultSet(); 
    }

    public function getProductAsesoris(){
        $this->db->query("SELECT * FROM ".$this->table.' WHERE kind="asesoris"');
        return $this->db->resultSet(); 
    }

    public function getProductById($id){
        $this->db->query("SELECT * FROM ".$this->table." WHERE product_id=:id");
        $this->db->bind("id",$id);
        return $this->db->single();
    }

    public function tambahProduk($data){
        
        $query = "INSERT INTO product
                    VALUES
                    ('',:product_name,:product_price,:stock,:kind,:status,:product_brand,:date_created,:description,:tags,:product_image)";
        
        $this->db->query($query);
        $this->db->bind("product_name",$data["product_name"]);
        $this->db->bind("product_price",$data["product_price"]);
        $this->db->bind("stock",1);
        $this->db->bind("kind",$data["kind"]);
        $this->db->bind("status","ready");
        $this->db->bind("product_brand",$data["product_brand"]);
        $this->db->bind("date_created",date("Y-m-d H:i:s"));
        $this->db->bind("description",$data["description"]);
        $this->db->bind("tags",$data["tags"]);
        $this->db->bind("product_image",$data["product_image"]);
        
        $this->db->execute();
      
        return $this->db->rowCount();
        
    }

    public function hapusProduk($id){
        $query = "DELETE FROM product WHERE product_id=:id";

        $this->db->query($query);
        $this->db->bind("id",$id);
        $this->db->execute();

        return $this->db->rowCount();
    }

}