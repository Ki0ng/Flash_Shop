<?php
class ProductModel extends Database {
    public function products(){ /* Products */ 
        try {
            $this->getConnection();

            $sql = "SELECT /* 0 */ Product_Id,         
                           /* 1 */ Category_Id,        
                           /* 2 */ Product_Name,       
                           /* 3 */ Old_price,          
                           /* 4 */ New_Price,          
                           /* 5 */ stock,              
                           /* 6 */ Image_URL,          
                           /* 7 */ Decription          
                            FROM products";
                            
            $data = $this->conn->query($sql);
            return $data->fetch_all(); 
        } catch (Exception $e) {
            return false;
        }
    }
    public function product ($productId) {
        try {
            $this->getConnection();
            $sql = "select * from products where Product_id = '$productId'";
            $data = $this->conn->query($sql);
            return $data->fetch_assoc(); 
        } catch (Exception $e) {
            return false;
        }
    }
}