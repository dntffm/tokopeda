<?php

class AdminPage extends Controller{
    public function index(){
        $this->view("templates/admin-header");
        $this->view("admin-page/index");
        $this->view("templates/admin-footer");
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

    public function tambah(){
        
        if(isset($_POST["submit"])){
            echo $_SERVER["DOCUMENT_ROOT"];
            $data["product_name"] = $_POST["nama-produk"];
            $data["product_price"] = number_format($_POST["harga-produk"],0,".",".");
            $data["product_brand"] = $_POST["brand-produk"];
            $data["kind"] = $_POST["jenis-produk"];
            $data["tags"] = $_POST["tag"];
            $data["description"] = $_POST["deskripsi"];

            $check = getimagesize($_FILES["gambar-produk"]["tmp_name"]);
            if($check !== false){
                $oldName = explode(".", $_FILES["gambar-produk"]["name"]);
                $newName = round(microtime(true)).'.'.end($oldName);
                $data["product_image"] = $newName;
            } else{
                echo "bukan gambar,upload gagal";
            }

            if($this->model("Produk_model")->tambahProduk($data) > 0){  
                move_uploaded_file($_FILES["gambar-produk"]["tmp_name"], $_SERVER["DOCUMENT_ROOT"]."/UAS-ECOMMERCE/public/assets/img/product/".$newName);
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