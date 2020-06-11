<?php

class AdminPage extends Controller{
    public function index(){
        $data["jmlproduk"] = $this->model("Produk_model")->countProduct();
        $date = [
            'day' => date("d"),
            'month' =>date('m'),
            'year' => date('Y')
        ];
        $data["dailyProduct"] = $this->model("Produk_model")->countSoldProductDaily($date["day"],$date["month"],$date["year"]);
        $data["monthlyProduct"] = $this->model("Produk_model")->countSoldProductMonthly($date["month"],$date["year"]);
        $data["annualProduct"] = $this->model("Produk_model")->countSoldProductAnnual($date["year"]);

        $this->view("templates/admin-header");
        $this->view("admin-page/index",$data);
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
            Flasher::setFlash("error","Login Gagal","Username atau password salah");
            header("Location: ".BASE_URL."/AdminPage/login");
            
        }
        
    }

    public function LaporanPenjualan(){
        $data = $this->model("Order_model")->getOrder();

        if(isset($_POST["filterByTime"])){
            $request = $_POST["filterByTime"];
            $date = [
                'day' => date("d"),
                'month' =>date('m'),
                'year' => date('Y')
            ];
            if($request == "daily"){
                $_SESSION["selected"] = 'daily';
                $data = $this->model("Order_model")->getOrderByDay($date["day"]);
            } else if($request == "monthly") {
                $_SESSION["selected"] = 'monthly';
                $data = $this->model("Order_model")->getOrderByMonth($date["month"]);
            } else if($request == "annual") {
                $_SESSION["selected"] = 'annual';
                $data = $this->model("Order_model")->getOrderByYear($date["year"]);
            } else {
                $_SESSION["selected"] = 'all';
                $data = $this->model("Order_model")->getOrder();;
            }

           
        }

        $this->view("templates/admin-header");
        $this->view("admin-page/laporanJual",$data);
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
        $gambar = $_FILES["gambar-produk"]["tmp_name"];
        $check = getimagesize($gambar);
            if($check !== false){
                $oldName = explode(".", $gambar);
                $newName = round(microtime(true)).'.'.end($oldName);
                $data["product_image"] = $newName;
            } else{
                echo "bukan gambar,upload gagal";
            }
        $data["nongambar"] = $_POST;
        $data["gambar"] = $newName;
        if($this->model("Produk_model")->ubahProduk($data) > 0){
            move_uploaded_file($gambar,$_SERVER["DOCUMENT_ROOT"]."/tokopeda/public/assets/img/product/".$newName);
            Flasher::setFlash('success','Ubah Produk Berhasil','');
            header("Location: ".BASE_URL."/AdminPage/edit");
            exit;
        } else{
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
                Flasher::setFlash('success','Tambah Produk Berhasil','');
                header("Location: ".BASE_URL."/AdminPage/formTambah");
                exit;
            }
        }
    }

    public function hapusStok($id){
        if($this->model("Produk_model")->hapusStokProduk($id) > 0){
            Flasher::setFlash('warning','Stok Produk telah dihapus','');
            header("Location: ".BASE_URL."/AdminPage/Edit");
            exit;
        }
    }

    public function ubahStatusorder($id,$status){
        if($this->model("Order_model")->ubahStatus($id,$status) > 0){
            header("Location: ".BASE_URL."/adminpage/laporanpenjualan");
        }
    }
    
 
}
