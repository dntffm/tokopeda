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
    public function countSoldProductDaily($day,$month,$year){
        
       $this->db->query("SELECT COUNT(*) FROM orderlist WHERE day(od_created_at) = $day AND month(od_created_at) = $month AND year(od_created_at) = $year");
       return $this->db->single();
    }
    public function countSoldProductMonthly($month,$year){
       $this->db->query("SELECT COUNT(*) FROM orderlist WHERE month(od_created_at) = $month AND year(od_created_at) = $year");
       return $this->db->single();
    }
    public function countSoldProductAnnual($year){
       $this->db->query("SELECT COUNT(*) FROM orderlist WHERE year(od_created_at) = $year");
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

    public function getProdukBestSell(){
        $query = "SELECT id_barang,product_name,product_price,product_image,SUM(kuantitas) FROM `orderlist` GROUP BY id_barang ORDER BY SUM(kuantitas) desc LIMIT 5";
        $this->db->query($query);
        return $this->db->resultSet();
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
        var_dump($data);
       
        $query = "UPDATE product SET
                    product_name = :product_name,
                    product_price = :product_price,
                    stock = :stock,
                    kind = :kind,
                    status = :status,
                    product_brand = :product_brand,
                    updated_at = :updated_at,
                    description = :description,
                    tags = :tags,
                    product_image = :product_image
                WHERE product_id = :product_id
                ";
                
        
        $this->db->query($query);
        $this->db->bind("product_name",$data["nongambar"]["nama-produk"]);
        $this->db->bind("product_price",$data["nongambar"]["harga-produk"]);
        $this->db->bind("stock",$data["nongambar"]["stock"]);
        $this->db->bind("kind",$data["nongambar"]["jenis-produk"]);
        $this->db->bind("status",$data["nongambar"]["status"]);
        $this->db->bind("product_brand",$data["nongambar"]["brand-produk"]);
        $this->db->bind("updated_at",date("Y-m-d H:i:s"));
        $this->db->bind("description",$data["nongambar"]["deskripsi"]);
        $this->db->bind("tags",$data["nongambar"]["tag"]);
        $this->db->bind("product_image",$data["product_image"]);
        $this->db->bind("product_id",$data["nongambar"]["id"]);
     
       
        
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