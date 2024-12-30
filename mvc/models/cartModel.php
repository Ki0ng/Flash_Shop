<?php 
    class CartModel extends Database{
        function addToCart($quantity,$id){
            $this->getConnection();
            $quantity = mysqli_real_escape_string($this->conn,$quantity);
            $id = mysqli_real_escape_string($this->conn,$id);
            // $sId = session_id();
            $sql = "SELECT * FROM Products WHERE Product = '$id'";
            $result = $this ->conn->query($sql);
            return $result->fetch_assoc(); 
        }
    }
?>