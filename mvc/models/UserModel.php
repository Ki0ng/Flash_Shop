<?php
class UserModel extends Database {
    public function Register ($username, $password, $email, $phone){
        try {
            $this->getConnection();
            $sql = "INSERT INTO users (Name, Password, Email, Phone, Role) VALUE ('$username', '$password', '$email' , '$phone',1 )";
            $this->conn->query($sql);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
    public function UpdateUser($name, $phone, $email, $password, $address)  {
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
    public function Login ( $email, $password ) {
        try {
            $this->getConnection();
            $sql = "SELECT Email, Password FROM Users WHERE Email = '$email' AND Password = '$password'";
            $login = $this->conn->query($sql);
            return $login->num_rows > 0;
        } catch (Exception $e) {
            return false;
        }
    }
    public function Profile ( $email, $password ) {
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
    public function Cart($cart_id , $user_id){
        $this->getConnection();
        $sql = "SELECT * form cart WHERE Cart_Id = '$cart_id' AND User_Id = '$user_id'";
        $data = $this->conn->query($sql);
        $cart = $data->fetch_assoc();
        return $cart;
    }

    public function Cart_Item($cart_id, $user_id) {
        $this->getConnection(); 
        // viết câu lệnh truy vấn tất cả các product có trong cart-Item 
        $sql = "SELECT cart.Cart_Id, cart.User_Id, cart.Product_Id, 
                   p.Product_Name, p.Category_Id, p.Old_price, 
                   p.New_Price, p.Stock, p.Image_URL, p.Description, 
                   cart.Total_Price, cart.Quantity
            FROM cart_item cart
            JOIN products p ON cart.Product_Id = p.Product_Id
            WHERE cart.Cart_Id = ? AND cart.User_Id = ?";
            
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ii", $cart_id, $user_id); // Gán biến vào câu lệnh SQL
        $stmt->execute();
        $result = $stmt->get_result();
        $cart_items = $result->fetch_all(MYSQLI_ASSOC);
        return $cart_items;
    }
    public function add_to_cart($id, $quantity){
        try{
            $this->getConnection();
            // format quantity
            $quantity = mysqli_real_escape_string($this->conn, $quantity);
            $id = mysqli_real_escape_string($this->conn,$id);
            $sql = "SELECT * FROM products WHERE Product_Id = '$id'";
            $data = $this->conn->query($sql);
            $add_cart = $data->fetch_assoc();
            return $add_cart;
        }
        catch(Exception $e) {
            return false;
        }
    }
}