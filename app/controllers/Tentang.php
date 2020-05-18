<?php

class Tentang extends Controller{
    public function index(){
        $this->view("templates/header");
        $this->view("tentang/index");
        $this->view("templates/footer");
    }
}