<?php
require_once(__DIR__.'\Rajaongkir.php');
class Order_model{
    private $db;
    private $rj;

   

    public function __construct(){
        $this->db = new Database;
        $this->rj = new Rajaongkir;
    }

    public function insertOrder($data){
        

        
        $dst = $this->rj->getKotaById($data["kabupaten"],$data["provinsi"]);
        

        $query = "INSERT INTO orders 
                    VALUES('',:id_customer,:nm_penerima,:dst_province,:dst_city,:courier,:postal_code,:detail_address,
                            :phone,:notes,:od_created_at,:status_order
                    )
                ";
        $this->db->query($query);
        $this->db->bind("id_customer",$_SESSION["cust_id"]);
        $this->db->bind("nm_penerima",$data["namapenerima"]);
        $this->db->bind("dst_province",$dst["province"]);
        $this->db->bind("dst_city",$dst["city_name"]);
        $this->db->bind("courier",$data["kurir"]);
        $this->db->bind("postal_code",$data["kodepos"]);
        $this->db->bind("detail_address",$data["detail-alamat"]);
        $this->db->bind("phone",$data["phone"]);
        $this->db->bind("notes",$data["catatan"]);
        $this->db->bind("od_created_at",date("Y-m-d H:i:s"));
        $this->db->bind("status_order","paid");

        $this->db->execute();

        return $this->db->lastInsertId();
    }

    public function insertOrderDetail($id){
        $query = "INSERT INTO order_detail
                    VALUES('',:id_order_od,:id_barang,:kuantitas)
            ";

        $this->db->query($query);
        $this->db->bind("id_order",$id);

        for ($i=0; $i < count($_SESSION["cart"]) ; $i++) { 
            $this->db->query($query);
            $this->db->bind("id_order_od",$id);
            $this->db->bind("id_barang",$_SESSION["cart"][$i]["product_id"]);
            $this->db->bind("kuantitas",$_SESSION["cart"][$i]["qty"]);
            $this->db->execute();
        }

        return $this->db->rowCount();
    }

    public function minStock(){
        $query = "UPDATE product SET stock=stock-1 WHERE product_id=:product_id";

        for ($i=0; $i < count($_SESSION["cart"]) ; $i++) { 
            
            $this->db->query($query);
            $this->db->bind("product_id",$_SESSION["cart"][$i]["product_id"]);
            $this->db->execute();
            
        }

        return $this->db->rowCount();
    }

    public function getOrder(){
        $query = "SELECT * FROM orderlist";
        
        $this->db->query($query);

        return $this->db->resultSet();

    }

    public function getOrderByDay($date){
        $query = "SELECT * FROM orderlist WHERE day(od_created_at) = $date";
        $this->db->query($query);

        return $this->db->resultSet();
    }
    public function getOrderByMonth($date){
        $query = "SELECT * FROM orderlist WHERE month(od_created_at) = $date";
        $this->db->query($query);

        return $this->db->resultSet();
    }
    public function getOrderByYear($date){
        $query = "SELECT * FROM orderlist WHERE year(od_created_at) = $date";
        $this->db->query($query);

        return $this->db->resultSet();
    }

    public function getOrderListByUser($id){
        $query = "SELECT * FROM orderlist WHERE id_customer=:id_customer";
        $this->db->query($query);
        $this->db->bind("id_customer",$id);

        return $this->db->resultSet();
    }

    public function getOrderListById($id){
        $query = "SELECT * FROM orderlist WHERE id_order = :id_order";
        $this->db->query($query);
        $this->db->bind("id_order",$id);

        return $this->db->resultSet();
    }
  
    public function ubahStatus($id,$status){
        $query = "UPDATE order_detail SET status_order_dtl=:status_order_dtl WHERE id_orderdetail=:id_orderdetail";

        $this->db->query($query);
        $this->db->bind("id_orderdetail",$id);
        $this->db->bind("status_order_dtl",$status);
        $this->db->execute();

        return $this->db->rowCount();
    }
    public function getCustomerUsername($id){
        $query = "SELECT cust_uname FROM customer WHERE cust_id=:cust_id";
        $this->db->query($query);
        $this->db->bind("cust_id",$id);
        $this->db->execute();

        return $this->db->single();
    }
}