<?php
class AdminModel extends Database
{
    public function getAllUsers() {}
    public function AddProduct($category_id, $product_name, $price, $stock)
    {
        // $this->getConnection();
        // $sql = "INSERT INTO products (Category_Id, Product_Name, New_Price, Stock) VALUES (?, ?, ?, ?)";
        // $stmt = $this->conn->prepare($sql);
        // $stmt->bind_param("isii", $category_id, $product_name, $price, $stock);
        // $stmt->execute();
        return $category_id;
    }
}
