<?php

class AdminPage extends Controller{
    public function index(){
        $this->view("templates/admin-header");
        $this->view("admin-page/index");
        $this->view("templates/admin-footer");
    }

    public function login(){
        $this->view("admin-page/login");
    }

    public function logout(){
        session_destroy();
        
        header("Location: ".BASE_URL."/AdminPage/login");
        exit;
    }
    public function userAuth(){
        $data = $this->model("Login_model")->getUser($_POST["username"]);
        if(password_verify($_POST["password"],$data["password"])){
           if($data["role"] == "admin"){
               $_SESSION["role"] = "admin";
               $_SESSION["username"] = $data["username"];
               header("Location: ".BASE_URL."/AdminPage");
               
                            
           }
        } else{
            $_SESSION["loginfail"] = true;
            header("Location: ".BASE_URL."/AdminPage/login");
            
        }
        
    }

    public function LaporanPenjualan(){
        $this->view("templates/admin-header");
        $this->view("admin-page/laporanJual");
        $this->view("templates/admin-footer");
    }
    public function formTambah(){
        $this->view("templates/admin-header");
        $this->view("admin-page/formTambah");
        $this->view("templates/admin-footer");
    }
    public function formUpdate($id){
        $data["product"] = $this->model("Produk_model")->getProductById($id);
        $this->view("templates/admin-header");
        $this->view("admin-page/form-update",$data);
        $this->view("templates/admin-footer");
    }
    public function Edit(){
        $data["product"] = $this->model("Produk_model")->getAllProducts();
        $this->view("templates/admin-header");
        $this->view("admin-page/edit",$data);
        $this->view("templates/admin-footer");
    }

    public function ubah(){
        if($this->model("Produk_model")->ubahProduk($_POST) > 0){
            header("Location: ".BASE_URL."/AdminPage/edit");
                exit;
        }
    }

    public function tambah(){
        
        if(isset($_POST["submit"])){
            
            $data["product_name"] = $_POST["nama-produk"];
            $data["product_price"] = number_format($_POST["harga-produk"],0,".",".");
            $data["product_brand"] = $_POST["brand-produk"];
            $data["kind"] = $_POST["jenis-produk"];
            $data["tags"] = $_POST["tag"];
            $data["description"] = $_POST["deskripsi"];
            $data["weight"] = $_POST["weight"];
            $check = getimagesize($_FILES["gambar-produk"]["tmp_name"]);
            if($check !== false){
                $oldName = explode(".", $_FILES["gambar-produk"]["name"]);
                $newName = round(microtime(true)).'.'.end($oldName);
                $data["product_image"] = $newName;
            } else{
                echo "bukan gambar,upload gagal";
            }

            if($this->model("Produk_model")->tambahProduk($data) > 0){  
                move_uploaded_file($_FILES["gambar-produk"]["tmp_name"], $_SERVER["DOCUMENT_ROOT"]."/tokopeda/public/assets/img/product/".$newName);
                
                header("Location: ".BASE_URL."/AdminPage/formTambah");
                exit;
            }
        }
    }

    public function hapus($id){
        if($this->model("Produk_model")->hapusProduk($id) > 0){
            header("Location: ".BASE_URL."/AdminPage/edit");
            exit;
        }
    }
   
}
