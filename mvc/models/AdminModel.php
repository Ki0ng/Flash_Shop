<?php
class AdminModel extends Database
{
    public function GetAllUser() {

    }
    public function AddProduct ( $category_id, $product_name, $price, $stock) {
        try {
            $this->getConnection();
            $sql = "INSERT INTO products (Category_Id, Product_Name, Old_price, New_Price, stock) VALUE ('$category_id', '$product_name', '$price', '$price', '$stock')";
            $this->conn->query($sql);
            return true;
        } catch (Exception $e) {
            return false ;
        }
    }
    public function EditProduct ($name, $category_id, $price, $stock, $product_id) {
        try {
            $this -> getConnection();
            $sql = "UPDATE products set Category_id = '$category_id', Product_Name = '$name', Old_price = '$price', New_Price = '$price', stock = '$stock' where Product_Id = '$product_id'";
            $this->conn->query ($sql);
            return true;
        } catch (Exception $e) {
            return false;
        }
    } 

    public function DeleteProduct ($product_id) {
        try {
            $this->getConnection();
            $sql = "DELETE FROM products where Product_Id = '$product_id'";
            $this->conn->query($sql);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}
