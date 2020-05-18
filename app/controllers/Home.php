<?php

class Home extends Controller{
    public function index(){
        $data["sepeda"] = $this->model("Produk_model")->getProductSepeda();
        $data["asesoris"] = $this->model("Produk_model")->getProductAsesoris();
        $this->view("templates/header");
        $this->view("home/index",$data);
        $this->view("templates/footer");
    }
}