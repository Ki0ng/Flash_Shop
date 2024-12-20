<?php

class Register_Controller extends Controller
{

    public $User_Model;
    public function __construct()
    {
        $this->User_Model = $this->model("User");
    }

    public function show()
    {
        $this->view("master2", [
            "Page" => "Register"
        ]);
    }

    public function register()
    {
        // lấy data khách hàng nhập
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST["name"];
            $password = $_POST["password"];
            $password = password_hash($password, PASSWORD_DEFAULT);
            $email = $_POST["email"];
            $phone = $_POST["phone"];

            // try {
            $kq = $this->User_Model->InsertNewUser($username, $password, $email, $phone);
            // $this->view("master2", []);
            // } catch (Exception) {
            //     $this->show();
            // }
        }
    }
}
