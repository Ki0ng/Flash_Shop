<?php

class OrderModel extends Database {
    
    public function getPendingOrderId($user_id) {
        $this->getConnection();
        $sql = "SELECT  Order_id FROM Orders WHERE User_id = ? AND status = 'pending'";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc()['Order_id'] ?? null;
    }

    public function createOrder($user_id) {
        $this->getConnection();
        $sql = "INSERT INTO Orders (User_id, Status) VALUES (?, 'pending')";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        return $this->conn->insert_id;
    }
}
?>