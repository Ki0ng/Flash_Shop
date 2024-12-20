<?php
    class Account_Controller extends Controller {
        public function show () {

            // if (isset($_SESSION["email"]) && isset($_SESSION["password"])) {

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
            // }

            // else {
            //     $this->view("Master", [
            //         "Page" => "Login"
            //     ]);
            // }


        }
    }

?>