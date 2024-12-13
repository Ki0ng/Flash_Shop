<?php
class Product {
    private $conn;
    private $table = "products"; // Tên bảng trong database

    // Constructor nhận kết nối từ database
    public function __construct($db) {
        $this->conn = $db;
    }

    // Hàm lấy danh sách tất cả sản phẩm
    public function getAllProducts() {
        $query = "SELECT * FROM " . $this->table;
        $result = $this->conn->query($query);
        return $result;
    }
}
?>
