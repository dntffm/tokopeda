<?php

class Cart extends Controller{
    public function index(){
        $this->view("templates/header");
        $this->view("cart/index");
        $this->view("templates/footer");
    }
}