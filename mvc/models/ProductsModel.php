<?php
class ProductsModel extends Database
{
    public $product_id;
    public $product_name;
    public $category_id;
    public $old_price;
    public $new_price;
    public $stock;
    public $image_url;
    public $description;
    public $query;

    //==============================> construct [ connect database]
    public function __construct()
    {
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
    //==============================> products() show all products
    public function products()
    {
        if (isset($this->conn)) {

            $this->sql = $this->query;

            $this->prepare();
            $this->execute();
            $this->fetch_assoc();

            return $this->data;
        } else {

            return false;
        }
    }

    //==============================> categories () get all category name
    public function categories()
    {
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

    //==============================> product() get product by id
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

    //==============================> search() search product by name
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

    //==============================> add_product() add new product (admin)
    public function add_product()
    {
        if (isset($this->conn)) {

            $this->sql = "INSERT INTO products (Category_Id, Product_Name, New_Price, Stock, Image_URL) VALUES ( ?, ?, ?, ?, ?)";

            $this->prepare();
            $this->stmt->bind_param("ssiis", $this->category_id, $this->product_name, $this->new_price, $this->stock, $this->image_url);
            $this->execute();

            return true;
        } else {
            return false;
        }
    }

    //==============================> delete_product() delete product by id (admin)
    public function delete_product()
    {
        if (isset($this->conn)) {

            $this->sql = "DELETE FROM products WHERE Product_Id = ?";

            $this->prepare();
            $this->stmt->bind_param("i", $this->product_id);
            $this->execute();

            return true;
        } else {
            return false;
        }
    }

    //==============================> update_product() update product by id (admin)
    public function update_product()
    {
        if (isset($this->conn)) {

            $this->sql = "UPDATE products SET Category_Id = ?, Product_Name = ?, Old_Price = ?, New_Price = ?, Stock = ?, Image_URL = ?, Description = ? WHERE Product_Id = ?";

            $this->prepare();
            $this->stmt->bind_param("isiiissi", $this->category_id, $this->product_name, $this->old_price, $this->new_price, $this->stock, $this->image_url, $this->description, $this->product_id);
            $this->execute();

            return true;
        } else {
            return false;
        }
    }

    //==============================> product_analysist() get data for analysist (admin)    
    public function product_analysist () {
        if (isset($this->conn)) {

            $this->sql = "SELECT 
                Category_Name AS category_name,
                SUM(Stock) AS stock,
                COUNT(Product_Id) AS product_count

                FROM categories

                JOIN products
                ON categories.Category_Id = products.Category_Id
                GROUP BY Category_Name
            ";

            $this->prepare();
            $this->execute();
            $this->fetch_assoc();

            return $this->data;
        } else {
            return false;
        }
    }
}
