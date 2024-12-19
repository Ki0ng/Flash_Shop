<?php
class Product_Model extends Database
{
    public function get_product_data()
    {
        $conn = new Database(); 

        if ($conn) {
            $database = $conn->getConnection();

            $sql = "select * from products";

            $data_raw = $database->query($sql);

            $data = $data_raw->fetch_all();

            return $data;
        } else {
            return false;
        }
    }
//productDetail
    public function get_proDetail_data($id)
    {
        $conn = new Database();

        if ($conn) {
            $database = $conn->getConnection();

            $sql = "select * from products where Product_id = $id";

            $data_raw = $database->query($sql);

            $data = $data_raw->fetch_assoc();

            return $data;
        } else {
            return false;
        }
    }
    // loc san pham 
    protected $table = "products";  
    public function getFilteredProducts ($name, $price, $categories) {
        $sql = "SELECT * FROM $this->table 
            WHERE Product_Name LIKE '%$name%'
            AND (
                ($price = 0 AND price <= 100) OR
                ($price = 100 AND price <= 300) OR
                ($price = 300 AND price <= 500) OR
                ($price = 500 AND price <= 1000) OR
                ($price = 1000 AND price > 1000)
            )
            AND category = '$categories'
            ORDER BY price DESC";
        return $this->queryManyRows($sql);
    }
    public function getProductsByCategories ($name, $categories) {
        $sql = "SELECT * FROM $this->table 
            WHERE Product_Name LIKE '%$name%'
            AND category = '$categories'";
        return $this->queryManyRows($sql);
    }
    public function getProductsByPrice ($name, $price) {
        $sql = "SELECT * FROM $this->table 
            WHERE Product_Name LIKE '%$name%'
            AND (
                ($price = 0 AND price <= 100) OR
                ($price = 100 AND price <= 300) OR
                ($price = 300 AND price <= 500) OR
                ($price = 500 AND price <= 1000) OR
                ($price = 1000 AND price > 1000)
            ) ORDER BY price DESC";
        return $this->queryManyRows($sql);
    }
    public function getProducts () {
        $sql = "SELECT * FROM $this->table";
        return $this->queryManyRows($sql);
    }
    public function getProductsByPriceCategories ($price, $categories) {
        $sql = "SELECT * FROM $this->table 
            WHERE  (
                    ($price = 0 AND price <= 100) OR
                    ($price = 100 AND price <= 300) OR
                    ($price = 300 AND price <= 500) OR
                    ($price = 500 AND price <= 1000) OR
                    ($price = 1000 AND price > 1000)
            )
            AND category = '$categories'
            ORDER BY price DESC";
        return $this->queryManyRows($sql);
    }
}
