<?php
    class Account_Controller extends Controller {
        public function show ($id) {
            
            $this->view("Master", [
                "Page" => "Account",
                "account_data" => [
                    "Name" => "Binh Do",
                    "ID" => "1",
                    "Phone" => "032323232323",
                    "email" => "Binh@gmail.com",
                    "Address" => "Kon Tum",
                    "id" => $id
                ]
            ]);
        }
        public function updatePassword ($id) {

        }

        public function updateAddress ($id) {
            
        }
    }
?>