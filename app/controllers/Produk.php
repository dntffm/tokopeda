<?php

class Produk extends Controller{
    public function index(){
        $data["sepeda"] = $this->model("Produk_model")->getProductSepeda();
        $data["asesoris"] = $this->model("Produk_model")->getProductAsesoris();
        $this->view("templates/header");
        $this->view("produk/index",$data);
        $this->view("templates/footer");
    }

    public function produk_detail($id){
        $data["product"] = $this->model("Produk_model")->getProductById($id);
        $this->view("templates/header");
        $this->view("produk/produk_detail",$data);
        $this->view("templates/footer");
    }
}
