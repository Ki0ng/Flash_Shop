<?php
include_once 'core/Database.php';
include_once 'models/Product.php';

class ProductController {
    private $productModel;

    public function __construct() {
        // Kết nối Database
        $database = new Database();
        $db = $database->getConnection();

        // Tạo đối tượng Product Model
        $this->productModel = new Product($db);
    }

    public function getProducts() {
        return $this->productModel->getAllProducts();
    }

    public function showHomepage() {
        // Lấy danh sách sản phẩm
        $products = $this->getProducts();

        // Bao gồm file giao diện
        include 'views/home.php';
    }
}
?>


