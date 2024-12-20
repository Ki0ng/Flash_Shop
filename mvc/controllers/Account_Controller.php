<?php
    class Account_Controller extends Controller {
        public function show () {

                $_SESSION["email"] = "binhdo@gmail.com";
                $_SESSION["password"] = "binh123@";
            
                $email = $_SESSION["email"];
                $password = $_SESSION["password"];

                $database = $this->model("Account");

                
                $data = $database->get_account($email, $password);

                $this->view("Master", [
                    "Page" => "Account",
                    "account" => $data
                ]);
        }

        public function update_account () {
        $database = $this->model("Account");

        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $name =     $_POST [ "name"] ;
            $phone =    $_POST [ "phone"];
            $email =     $_POST [ "email"];
            $address =  $_POST [ "address"];
            $password = $_POST ["password"];


            $_SESSION["email"] = $email;
            $_SESSION["password"] = $password;


        $database->update_account($name, $phone, $email, $password, $address);
        $this->show();
    }
    }

    }

?>