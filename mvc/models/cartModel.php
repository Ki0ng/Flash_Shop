<?php 
    class CartModel extends Database{
        function addToCart($quantity,$id){
            $this->getConnection();
            $quantity = mysqli_real_escape_string($this->conn,$quantity);
            $id = mysqli_real_escape_string($this->conn,$id);
            $sId = session_id();
            $sql = "SELECT * FROM Products WHERE Product = '$id'";
            $result = $this ->conn->query($sql);
            return $result->fetch_assoc(); 

            $image = $result['URL'];
            $price = $result['price'];
            $productName = $result['Product_Name'];

            $queryInsert = "INSERT INTO Cart(Product_ID, Quantity, sId, image, price, Product_Name) VALUES
            ('$id', '$Quantity','$sId', '$image', '$price', '$productName')";

            $insertCart = $this ->conn->insert($queryInsert);

            if($insertCart){
                header('location:./views/cart.php');
            }else{
                header('location:404.php');
            }
        }
        public function getProductCart(){
            $sId = session_id();
            $query = "SELECT * FROM Cart WHERE sId='$sId'";
            $result = $this ->conn->select($query);
            return  $result;
        }

    }
?>