<?php
class UserModel extends Database
{
    public $user_id;
    public $user_name;
    public $password;
    public $email;
    public $phone;
    public $address;
    public $query;

    //====================================> construct ()
    public function __construct() {

        parent::__construct();
        $this->query = 
        " SELECT    User_Id AS user_id,
                    Name AS user_name,
                    Email AS email,
                    Phone AS phone,
                    Password AS password,
                    Role As role,
                    Address AS address

        FROM Users
        
        WHERE ";
    }

    //====================================> register ()
    public function register() {
        if ($this->conn) {

            $this->sql = "INSERT INTO
            users (Name, Password, Email, Phone, Role)
            VALUES ( ?, ?, ?, ? 1)";

            $this->prepare();
            $this->stmt->bind_param(  "ssss", $this->user_name, $this->password, $this->email, $this->phone);
            $this->execute();

            if ($this->stmt->insert_id) {
                return true;

            } else {
                return false;
            }

        } else {
            return false;
        }
    }

    //====================================> account ()
    public function  account () {
        if (isset($this->conn)) {
            if (isset($this->user_id)) {

                $this->query .= " User_Id = ?";
                $this->sql = $this->query;
                $this->prepare();
                $this->stmt->bind_param("i", $this->user_id);
            
            } else {
            
                $this->query .= " Email = ?";
                $this->sql = $this->query;
                $this->prepare();
                $this->stmt->bind_param("s", $this->email);
            }
            
            $this->execute();
            $this->fetch_assoc();

            return $this->data;
        } else {

            return false;
        }
    }

    //====================================> updat ()
    public function update () {
        if (isset($this->conn)) {
            $this->update_name();
            $this->update_password();
            $this->update_phone();
            $this->update_address();
        } else {
            return false;
        }
    }

    //====================================> update name ()
    public function update_name () {
        if (isset($this->conn) && $this->user_name) {

            $this->query = "UPDATE User SET Name = ? WHERE User_Id = ?";

            $this->prepare();
            $this->stmt->bind_param("si", $this->user_name, $this->user_id);
            $this->execute();

            return true;
        } else {

            return false;
        }
    }  
    
    //====================================> update password ()
    public function update_password () {
        if (isset($this->conn) && $this->password) {

            $this->query = "UPDATE User SET Password = ? WHERE User_Id = ?";

            $this->prepare();
            $this->stmt->bind_param("si", $this->password, $this->user_id);
            $this->execute();

            return true;
        } else {

            return false;
        }
    }

    //====================================> update address ()
    public function update_address () {
        if (isset($this->conn) && $this->user_name) {

            $this->query = "UPDATE User SET Address = ? WHERE User_Id = ?";

            $this->prepare();
            $this->stmt->bind_param("si", $this->address, $this->user_id);
            $this->execute();

            return true;
        } else {

            return false;
        }
    }   

    //====================================> update phone ()
    public function update_phone () {
        if (isset($this->conn) && $this->user_name) {

            $this->query = "UPDATE User SET Phone = ? WHERE User_Id = ?";

            $this->prepare();
            $this->stmt->bind_param("si", $this->phone, $this->user_id);
            $this->execute();

            return true;
        } else {

            return false;
        }

    }   

    }
    
    // public function Register($username, $password, $email, $phone)
    // {
    //     try {
    //         $this->getConnection();
    //         $sql = "INSERT INTO users (Name, Password, Email, Phone, Role) VALUE ('$username', '$password', '$email' , '$phone',1 )";
    //         $this->conn->query($sql);
    //         return true;
    //     } catch (Exception $e) {
    //         return false;
    //     }
    // }
    // public function UpdateUser($name, $phone, $email, $password, $address)
    // {
    //     try {
    //         $this->getConnection();
    //         $sql = "UPDATE Users SET Email = '$email' ";

    //         if ($name !== "null") {
    //             $sql = "$sql, Name = '$name'";
    //         }
    //         if ($password !== "null") {
    //             $sql = "$sql, Password = '$password'";
    //         }
    //         if ($phone !== "null") {
    //             $sql = "$sql, Phone = '$phone'";
    //         }
    //         if ($address !== "null") {
    //             $sql = "$sql, Address = '$address'";
    //         }
    //         $sql = "$sql where Email = '$email'";
    //         $this->conn->query($sql);
    //         return true;
    //     } catch (Exception $e) {
    //         return false;
    //     }
//     // }
//     public function Login($email, $password)
//     {
//         try {
//             $this->getConnection();
//             $sql = "SELECT Email, Password FROM Users WHERE Email = '$email' AND Password = '$password'";
//             $login = $this->conn->query($sql);
//             return $login->num_rows > 0;
//         } catch (Exception $e) {
//             return false;
//         }
//     }
//     public function Profile($email, $password)
//     {
//         try {
//             $this->getConnection();
//             $sql = "SELECT * from users where Email = '$email' and Password = '$password'";
//             $data = $this->conn->query($sql);
//             $account = $data->fetch_assoc();
//             return $account;
//         } catch (Exception $e) {
//             return false;
//         }
//     }
//     // viết câu lệnh truy vấn
//     // public function Cart($cart_id , $user_id){
//     //     $this->getConnection();
//     //     $sql = "SELECT * form cart WHERE Cart_Id = '$cart_id' AND User_Id = '$user_id'";
//     //     $data = $this->conn->query($sql);
//     //     $cart = $data->fetch_assoc();
//     //     return $cart;
//     // }
// }
