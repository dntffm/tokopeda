<?php

class Cart extends Controller{
    public function index(){
        $this->view("templates/header");
        $this->view("cart/index");
        $this->view("templates/footer");
    }

    public function add($id){
        if(isset($_SESSION["isauth"])){
            if($_SESSION["isauth"] == true){
                $data = $this->model("Produk_model")->getProductById($id);
                
                $data = array(
                    "product_id" => $data["product_id"],
                    "product_name" => $data["product_name"],
                    "product_price" => $data["product_price"],
                    "stock" => $data["stock"],
                    "qty" => 1,
                    "weight" => $data["weight"]
                );  

                if(!empty($_SESSION["cart"])){
                    for($i=0; $i<count($_SESSION["cart"]); $i++){
                        if($data["product_id"] == $_SESSION["cart"][$i]["product_id"]){
                            $sama = true;
                        break;
                        }
                    }
                    if(!$sama){
                        $_SESSION["cart"][] = $data;
                        header("Location: ".BASE_URL."/cart");
                    } else{
                        header("Location: ".BASE_URL."/cart");
                        
                    }
                } else{
                    $_SESSION["cart"][] = $data;
                    header("Location: ".BASE_URL."/cart");
                }
                
                
               /*  echo "<pre>";
                var_dump($_SESSION["cart"]);
                echo "</pre>";
                die(); */
            }
        } else {
            $_SESSION["signfirst"] = "signfirst";
            header("Location: ".BASE_URL."/signup");
        }
    }

    public function update(){
        $cart = $_SESSION["cart"];
       
        if(isset($_POST["update"])){
            for($i = 0; $i < count($cart); $i++){
                $cart[$i]["qty"] = $_POST["qty"][$i];
            }
        }
        $_SESSION["cart"] = $cart;
        header("Location: ".BASE_URL."/cart");
    }

    public function delete($id){
        $cart = $_SESSION["cart"];
    
        for($i=0; $i<count($cart); $i++){
            if($cart[$i]["product_id"] == $id){
                unset($cart[$i]);
            }
        }

        $_SESSION["cart"] = $cart;
        header("Location: ".BASE_URL."/cart");
    }

    public function checkout(){
        $data["provinsi"] = $this->model("Rajaongkir")->getProvinsi();
        $this->view("templates/header");
        $this->view("cart/checkout",$data);
       
    }

    public function note(){
        
    }

    public function getKotaByProvId(){
        $this->model("Rajaongkir")->getKota($_POST["idProv"]);
        
    }

    public function getDataOngkir(){ 
        $data["berat"] = $_POST["berat"];
        $data["kotaTujuan"] =$_POST["kotaTujuan"];
        $data["kurir"] = $_POST["kurir"];
        $this->model("Rajaongkir")->getOngkir($data);

    }
}