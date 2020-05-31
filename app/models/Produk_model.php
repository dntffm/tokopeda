<?php

class Produk_model{
    private $table = "product";
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function countProduct(){
       $this->db->query("SELECT COUNT(*) FROM ".$this->table);
       return $this->db->single();
    }

    public function getAllProducts(){
        $this->db->query("SELECT * FROM ".$this->table);
        return $this->db->resultSet();
    }

    public function getProductSepeda(){
        $this->db->query("SELECT * FROM ".$this->table.' WHERE kind="sepeda" AND status="visible"');
        return $this->db->resultSet(); 
    }

    public function getProductAsesoris(){
        $this->db->query("SELECT * FROM ".$this->table.' WHERE kind="asesoris" AND status="visible"');
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
                    ('',:product_name,:product_price,:stock,:kind,:status,:weight,:product_brand,:date_created,:updated_at,:description,:tags,:product_image)";
        
        $this->db->query($query);
        $this->db->bind("product_name",$data["product_name"]);
        $this->db->bind("product_price",$data["product_price"]);
        $this->db->bind("stock",1);
        $this->db->bind("kind",$data["kind"]);
        $this->db->bind("status","visible");
        $this->db->bind("weight",$data["weight"]);
        $this->db->bind("product_brand",$data["product_brand"]);
        $this->db->bind("date_created",date("Y-m-d H:i:s"));
        $this->db->bind("updated_at",date("Y-m-d H:i:s"));
        $this->db->bind("description",$data["description"]);
        $this->db->bind("tags",$data["tags"]);
        $this->db->bind("product_image",$data["product_image"]);
        
        $this->db->execute();
      
        return $this->db->rowCount();
        
    }
    public function ubahProduk($data){

       
        $query = "UPDATE product SET
                    product_name = :product_name,
                    product_price = :product_price,
                    stock = :stock,
                    kind = :kind,
                    status = :status,
                    product_brand = :product_brand,
                    description = :description,
                    tags = :tags
                WHERE product_id = :product_id
                ";
                
        
        $this->db->query($query);
        $this->db->bind("product_name",$data["nama-produk"]);
        $this->db->bind("product_price",$data["harga-produk"]);
        $this->db->bind("stock",$data["stock"]);
        $this->db->bind("kind",$data["jenis-produk"]);
        $this->db->bind("status",$data["status"]);
        $this->db->bind("product_brand",$data["brand-produk"]);
        $this->db->bind("description",$data["deskripsi"]);
        $this->db->bind("tags",$data["tag"]);
        $this->db->bind("product_id",$data["id"]);
       
        
        $this->db->execute();
      
        return $this->db->rowCount();
    }
    public function hapusStokProduk($id){
        $query = "UPDATE product SET stock = 0 WHERE product_id=:id";
        $this->db->query($query);
        $this->db->bind("id",$id);
        $this->db->execute();

        return $this->db->rowCount();
    }

}