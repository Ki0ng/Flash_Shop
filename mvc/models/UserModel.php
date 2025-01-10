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
            Users (Name, Password, Email, Phone, Role)
            VALUES ( ?, ?, ?, ?, 1)";

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
            $this->update_phone();
            $this->update_address();
            $this->update_password();

        } else {
            return false;
        }
    }

    //====================================> update name ()
    public function update_name () {
        if (isset($this->conn) && $this->user_name) {

            $this->sql = "UPDATE Users SET Name = ? WHERE User_Id = ?";

            $this->prepare();
            $this->stmt->bind_param("si", $this->user_name, $this->user_id);
            $this->execute();
        }
    }  
    
    //====================================> update password ()
    public function update_password () {
        if (isset($this->conn) && $this->password) {

            $this->sql = "UPDATE Users SET Password = ? WHERE User_Id = ?";

            $this->prepare();
            $this->stmt->bind_param("si", $this->password, $this->user_id);
            $this->execute();
        }
    }

    //====================================> update address ()
    public function update_address () {
        if (isset($this->conn) && $this->user_name) {

            $this->sql = "UPDATE Users SET Address = ? WHERE User_Id = ?";

            $this->prepare();
            $this->stmt->bind_param("si", $this->address, $this->user_id);
            $this->execute();
        }
    }   

    //====================================> update phone ()
    public function update_phone () {
        if (isset($this->conn) && $this->user_name) {

            $this->query = "UPDATE Users SET Phone = ? WHERE User_Id = ?";

            $this->prepare();
            $this->stmt->bind_param("si", $this->phone, $this->user_id);
            $this->execute();
        }

    }

    //====================================> users () lấy thông tin tất cả user (admin)
    public function users () {
        if  (isset($this->conn)) {

            $this->sql = 
            " SELECT User_Id AS user_id,
            Name AS user_name,
            Email AS email,
            Phone AS phone,
            Password AS password,
            Role As role,
            Address AS address
            FROM Users";

            $this->prepare();
            $this->execute();
            $this->fetch_assoc();

            return $this->data;

        } else {
            return false;
        }
    }

    
}
