<?php
class ProductModel extends Database
{
    public function products()
    { /* Products */
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


    // public function getAllProducts()
    // {
    //     try {
    //         $this->getConnection();
    //         $sql = "SELECT 
    //                     p.Product_Id, 
    //                     p.Product_Name AS Name, 
    //                     p.Image_URL AS Image, 
    //                     p.Old_price, 
    //                     p.New_Price, 
    //                     p.stock, 
    //                     c.Category_Name AS Category 
    //                 FROM Products p 
    //                 JOIN categories c ON p.Category_Id = c.Category_Id";
    //         $result = $this->conn->query($sql);

    //         $products = [];
    //         if ($result->num_rows > 0) {
    //             while ($row = $result->fetch_assoc()) {
    //                 $products[] = $row;
    //             }
    //         }
    //         return $products;
    //     } catch (Exception $e) {
    //         return [];
    //     }
    // }

    public function product($productId)
    {
        try {
            $this->getConnection();
            $sql = "select * from products where Product_id = '$productId'";
            $data = $this->conn->query($sql);
            return $data->fetch_assoc();
        } catch (Exception $e) {
            return false;
        }
    }

    public function getCategory()
    {
        try {
            $this->getConnection();
            $sql = "SELECT Category_Id,Category_Name FROM categories";
            $data = $this->conn->query($sql);
            return $data->fetch_all();
        } catch (Exception $e) {
            return false;
        }
    }

    public function search($character)
    {
        try {

            $this->getConnection();
            $sql = "SELECT * FROM products WHERE Product_Name LIKE '%$character%'";
            $data = $this->conn->query($sql);

            return $data->fetch_all();
        } catch (Exception $e) {
            return "ERROR";
        }
    }
}
