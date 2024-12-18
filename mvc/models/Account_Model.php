<?php
    class Account_Model extends Database  {

        private $conn = new Database();
        private $database = $this->conn->getConnection();

        function login ($id) {
                $sql = "select *  from webUser where id = $id";
                $data_raw = $this->database->query($sql);
                $data = $data_raw->fetch_assoc();
            }

        function register ($name, $email, $phone, $password) {
            $sql = "INSERT INTO users (Name, Email, Phone, Password ) VALUE ($name, $email, $phone, $password)";
            $this->database->query($sql);
        }
        function update_account ($User_id, $name, $email, $password, $addresss)  {
            $columns_values = "User_id = $User_id";
            if ($name != "" ) {
                $columns_values .= ", Name = $name";
            }
            if ($email != "") {
                $columns_values .= ", Email = $email";
            }
            if ($password != "") {
                $columns_values .= ", Password = $password";
            }
            if ($addresss != "") {
                $columns_values .= ", Address = $addresss";
            }

            $sql = "ALTER TABLE users SET $columns_values WHER User_id = $User_id";

            $this->database->query($sql);
        }


    }
?>  