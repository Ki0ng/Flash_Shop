<?php
class UserModel extends Database
{
    public function Register($username, $password, $email, $phone)
    {
        try {
            $this->getConnection();
            $sql = "INSERT INTO users (Name, Password, Email, Phone, Role) VALUE ('$username', '$password', '$email' , '$phone',1 )";
            $this->conn->query($sql);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
    public function UpdateUser($name, $phone, $email, $password, $address)
    {
        try {
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
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
    public function Login($email, $password)
    {
        try {
            $this->getConnection();
            $sql = "SELECT Email, Password FROM Users WHERE Email = '$email' AND Password = '$password'";
            $login = $this->conn->query($sql);
            return $login->num_rows > 0;
        } catch (Exception $e) {
            return false;
        }
    }
    public function Profile($email, $password)
    {
        try {
            $this->getConnection();
            $sql = "SELECT * from users where Email = '$email' and Password = '$password'";
            $data = $this->conn->query($sql);
            $account = $data->fetch_assoc();
            return $account;
        } catch (Exception $e) {
            return false;
        }
    }
    // viết câu lệnh truy vấn
    // public function Cart($cart_id , $user_id){
    //     $this->getConnection();
    //     $sql = "SELECT * form cart WHERE Cart_Id = '$cart_id' AND User_Id = '$user_id'";
    //     $data = $this->conn->query($sql);
    //     $cart = $data->fetch_assoc();
    //     return $cart;
    // }
}
