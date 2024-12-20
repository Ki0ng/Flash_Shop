<?php
class User_Model extends Database
{
    public function InsertNewUser($username, $password, $email, $phone)
    {
        $this->getConnection();
        $qr = "INSERT INTO users (Name, Password, Email, Phone, Role) VALUE ('$username', '$password', '$email' , '$phone',1 )";
        // $qr = "INSERT INTO users VALUE ('$username', '$password', '$email' , '$phone',1 )";

        $result = false;
        if (mysqli_query($this->conn, $qr)) {
            $result = true;
        }

        return json_encode($result);
    }
}
