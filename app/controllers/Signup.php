<?php

class Signup extends Controller{
    public function index(){
        $this->view("templates/header");
        $this->view("signup/index");
        $this->view("templates/footer");
    }

    public function daftar(){
        if(isset($_POST["register"])){
            $data["username"] = filter_input(INPUT_POST,"user-name",FILTER_SANITIZE_STRING);
            $data["password"] = password_hash($_POST["user-password"],PASSWORD_DEFAULT);
            $data["email"] = filter_input(INPUT_POST,"user-email",FILTER_VALIDATE_EMAIL);

            if($this->model("Login_model")->registerCustomer($data) > 0){
                $_SESSION["regsuccess"] = true;
                header("Location: ".BASE_URL."/signup");
                exit;
            }
        }
    }

    public function customerAuth(){
        if(isset($_POST["login"])){
            $data = $this->model("Login_model")->getCustomer($_POST["user-name"]);
            
            if(password_verify($_POST["user-password"],$data["password"])){
                $_SESSION["username"] = $data["cust_uname"];
                $_SESSION["cust_id"] = $data["cust_id"];
                $_SESSION["isauth"] = true;
                header("Location: ".BASE_URL);
            } else{
                $_SESSION["isauth"] = false;
                header("Location: ".BASE_URL."/signup");
            }
        }
    }

    public function logout(){
        session_destroy();
        header("Location: ".BASE_URL);
    }
}