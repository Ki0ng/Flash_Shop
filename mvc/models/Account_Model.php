<?php
    class Account_Model extends Database  {

        function login ($email, $password) {

                $database = $this->connect();
                
                $sql = "SELECT
                Email,
                Password
                from users 
                where Email = '$email' AND  Password = '$password'";

                $sql = "Select * from users";

                $data_raw = $database->query($sql);
                $data = $data_raw->fetch_assoc();

                return $data;
        }

        function register ($name, $email, $phone, $password) {
            $database = $this->connect();

            $sql = "INSERT INTO users (Name, Email, Phone, Password ) VALUE ('$name', '$email', '$phone', '$password')";
            $database->query($sql);
            return true;
        }

        function get_account ($email, $password) {
            
            $database = $this->connect();
                
            $sql = "SELECT * from users where Email = '$email' and Password = '$password'";

            $data_raw = $database->query($sql);
            $data = $data_raw->fetch_assoc();

            return $data;
        }

        function update_account ($User_id, $name, $email, $password, $addresss)  {
            $database = $this->connect();
            
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

            $database->query($sql);
        }

        function connect () {
            $conn = new Database();
            return $conn->getConnection();
        }
    }
?>  