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

    protected $table = "products"; 
    public function getFilteredProducts ($name, $price, $category) {

        if ($name || $price || $category) {
            $sql = "SELECT * FROM products WHERE";
            if($name) {
                $sql .= "Product_Name LIKE '%$name%'";
            }
            if ($price) {
                if($name) {
                    $sql .= " AND ";
                }
                $sql .= "(
                        ($price = 0 AND New_Price <= 100000.00) OR
                        ($price = 100000.00 AND New_Price > 100000.00 AND New_Price <= 300000.00) OR
                        ($price = 300000.00 AND New_Price > 300000.00 AND New_Price <= 500000.00) OR
                        ($price = 500000.00 AND New_Price > 500000.00 AND New_Price <= 1000000.00) OR
                        ($price = 1000000.00 AND New_Price > 1000000.00)
                    )
                ";
            }
            if ($category) {
                if ($name || $price) {
                    $sql .= " AND ";
                }
                $sql .= "Category_Id = '$category'";
            }

            return $this->conn->query($sql);
        }
    }
}