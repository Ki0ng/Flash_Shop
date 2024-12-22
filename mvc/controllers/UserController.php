<?php
    class UserController extends Controller {
        public function Default () { /*Profile */

            $database =  $this->model("User");

            if (isset($_POST["email"]) && isset($_POST["password"])) {

                $email = $_POST["email"];
                $password = $_POST["password"];

                if ($database->login($email, $password)) {
                    $_SESSION["email"] = $email;
                    $_SESSION["password"] = $password;
                } else {
                    return $this->view("Authentication", [
                        "Page" => "Login",
                        "Error" => ""
                    ]);
                }
            }

            if(isset($_SESSION["email"]) && isset($_SESSION["password"])) {
                $email = $_SESSION["email"];
                $password = $_SESSION["password"];
                $database = $this->model("User");
                $account = $database->Profile($email, $password);
                $this->view("User", [
                    "Page" => "User/Profile",
                    "account" => $account
                ]);
            } else {
                $this -> view("Authentication", [
                "Page" => "Login",
                ]);
            }
        }

        public function UpdateUser () {
            $database = $this->model("User");

            if($_SERVER["REQUEST_METHOD"] == "POST") {
            $name =     $_POST [ "name"] ;
            $phone =    $_POST [ "phone"];
            $email =     $_POST [ "email"];
            $address =  $_POST [ "address"];
            $password = $_POST ["password"];


            $_SESSION["email"] = $email;
            $_SESSION["password"] = $password;


        $database->UpdateUser($name, $phone, $email, $password, $address);
        $this->Default();
            }
        }

        public function Login () {
            $this -> view("Authentication", [
                "Page" => "Login"
            ]);
        }

        public function Register () {
            $this -> view("Authentication", [
                "Page" => "Register"
            ]);
        }


        // public function register()
        // {
        //     // lấy data khách hàng nhập
        //     if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //         $username = $_POST["name"];
        //         $password = $_POST["password"];
        //         $password = password_hash($password, PASSWORD_DEFAULT);
        //         $email = $_POST["email"];
        //         $phone = $_POST["phone"];

        //         // try {
        //         $database->InsertNewUser($username, $password, $email, $phone);
        //         // $this->view("master2", []);
        //         // } catch (Exception) {
        //         //     $this->show();
        //         // }
        //     }
        // }



    }            