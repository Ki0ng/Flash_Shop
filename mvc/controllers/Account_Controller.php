<?php
    class Account_Controller extends Controller {
        public function show ($email) {

            $database = $this->model("Account");

            $data = $database->get_account($email);
            $this->view("Master", [
                "Page" => "Account",
                "account" => $data
            ]);
        }
    }

?>