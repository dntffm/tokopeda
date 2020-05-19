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
                    "qty" => 1
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
}