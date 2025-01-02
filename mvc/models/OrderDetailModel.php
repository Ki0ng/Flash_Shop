<?php
class OrderDetailModel extends Database {
    //lấy chi tiết đơn hàng
    public function getOrderDetail($order_id, $product_id) {
        $this->getConnection();
        $sql = "SELECT * FROM Order_Detail WHERE Order_id = ? AND Product_Id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ii", $order_id, $product_id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
//cập nhật số lượng sản phẩm trong giỏ hàng 
    public function updateQuantity($order_id, $product_id, $quantity) {
        $this->getConnection();
        $sql = "UPDATE Order_Detail SET Quantity = ? WHERE Order_id = ? AND Product_Id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("iii", $quantity, $order_id, $product_id);
        $stmt->execute();
    }
// thêm sản phẩm vào giỏ hàng 
    public function addProductToOrder($order_id, $product_id, $quantity, $price) {
        $this->getConnection();
        $sql = "INSERT INTO Order_Detail (Order_id, Product_Id, Quantity, Price) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("iiii", $order_id, $product_id, $quantity, $price);
        $stmt->execute();
    }
// select bảng orderDetail 
    public function getOrderDetails($order_id) {
        $this->getConnection();
        $sql = "
            SELECT c.Category_Name, p.Product_Name, p.Image_URL, p.New_Price, od.Quantity, (p.New_Price * od.Quantity) AS line_total
            FROM Order_Detail  od
            JOIN products p ON od.Product_Id = p.Product_Id
            JOIN categories c ON p.Category_Id= c.Category_Id
            WHERE od.Order_id  = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $order_id);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }


    // tính tổng giá tất cả các sản phẩm có trong giỏ hàng 

    public function getTotalQuantityCart($order_id) {
        $this->getConnection();
        $sql = "select sum(Quantity) as total_quantity from Order_Detail where Order_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $order_id);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
}
?>