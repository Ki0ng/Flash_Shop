<?php
class ProductModel extends Database
{
    public $product_id;
    public $product_name;
    public $category_id;
    public $query;
    public $connect_database;


    public function __construct() {
        parent::__construct();
        $this->connect_database = isset($this->conn) ? true : false; 

        $this->query = 
            "SELECT DISTINCT
            products.Product_Id AS   product_id,
            products.Category_Id AS  category_id,
            products.Product_Name AS product_name,       
            products.Old_price AS    old_price,          
            products.New_Price AS    new_price,          
            products.Stock AS        stock,              
            products.Image_URL AS    image_url,          
            products.Description AS  description,

            categories.Category_Name AS category_name 

            FROM products

            JOIN categories
            ON products.Category_Id = categories.Category_Id
            ";
    }
    public function products()
    { 
        if($this->conn) {

            $this->sql = $this->query;

            $this->prepare();
            $this->execute();
            $this->fetch_assoc();

            return $this->data;

        } else {
            return false;
        }

    }

    public function product()
    {
        if (isset($this->conn)) {
            
            $this->sql = $this->query . " WHERE Product_Id = ?";

            $this->prepare();
            $this->stmt->bind_param("i", $this->product_id);
            $this->execute();
            $this->fetch_assoc();

            return $this->data;

        } else {
            return false;
        }
    }

    // public function getCategory()
    // {
    //     try {
    //         $this->getConnection();
    //         $sql = "SELECT Category_Id,Category_Name FROM categories";
    //         $data = $this->conn->query($sql);
    //         return $data->fetch_all();
    //     } catch (Exception $e) {
    //         return false;
    //     }
    // }

    public function search()
    {
        if (isset($this->conn)) {

            $this->sql = $this->query . " WHERE Product_Name LIKE %?%";

            $this->prepare();
            $this->stmt->bind_param("i", $this->product_id);
            $this->execute();
            $this->fetch_assoc();

            return $this->data;
 
        } else {
            return false;
        }
    }
}
