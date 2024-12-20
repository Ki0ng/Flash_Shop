<?php
    class Account_Model extends Database  {


        function get_account ($email, $password) {
            
            $this->getConnection();

            $sql = "SELECT * from users where Email = '$email' and Password = '$password'";

            $data_raw = $this->conn->query($sql);
            $account = $data_raw->fetch_assoc();

            return $account;
        }

        function update_account ($name, $phone, $email, $password, $address)  {
            
            $this->getConnection();

            $sql = "UPDATE Users SET Email = '$email' ";
            
            if ($name !== "null") {
                $sql = "$sql, Name = '$name'";
            }

            if ($password !== "null") {
                $sql = "$sql, Password = '$password'";
            }

            if ($phone !== "null") {
                $sql = "$sql, Phone = '$phone'";
            }

            if ($address !== "null") {
                $sql = "$sql, Address = '$address'";
            }

            $sql = "$sql where Email = '$email'";

            $this->conn->query($sql);
        }

    }
?>  