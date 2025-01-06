<?php
class ProductsModel extends Database
{
    public $product_id;
    public $product_name;
    public $category_id;
    public $query;

    //==============================> construct [ connect database]
    public function __construct() {
        parent::__construct();

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
    //==============================> show all products
    public function products()
    { 
        if(isset($this->conn)) {

            $this->sql = $this->query;

            $this->prepare();
            $this->execute();
            $this->fetch_assoc();

            return $this->data;
        } else {

            return false;
        }

    }

    //==============================> get all category name
    public function categories () {
        if (isset($this->conn)) {
            
            $this->sql = "SELECT 
            Category_Id AS category_id,
            Category_Name AS category_name
            FROM categories";

            $this->prepare();
            $this->execute();
            $this->fetch_assoc();

            return $this->data;
        } else {
            return false;
        }
    }

    //==============================> get product by id
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

    public function search()
    {
        if (isset($this->conn)) {

            $this->sql = $this->query . "  WHERE Product_Name LIKE ?";

            $this->prepare();
            $this->stmt->bind_param("s", $this->product_name);
            $this->execute();
            $this->fetch_assoc();

            return $this->data;
 
        } else {
            return false;
        }
    }

    // public function add_product() {
    //     //?
    //     if (isset($this->conn)) {
    //         $this->query = 3;
    //     }
    // }
}
