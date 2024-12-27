    <?php
    class AdminModel extends Database {
    
        public function getAllProducts() {
            try {
                $this->getConnection(); 
                $sql = "SELECT 
                            p.Product_Id, 
                            p.Product_Name AS Name, 
                            p.Image_URL AS Image, 
                            p.Old_price, 
                            p.New_Price, 
                            p.stock, 
                            c.Category_Name AS Category 
                        FROM Products p 
                        JOIN categories c ON p.Category_Id = c.Category_Id";
                $result = $this->conn->query($sql);

                $products = [];
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $products[] = $row;
                    }
                }
                return $products;
            } catch (Exception $e) {
                return [];
            }
        }


        public function getAllUsers($data) {
            try {
                $this->getConnection();
                $sql = "SELECT * FROM Users";
                $result = $this->conn->query($sql);

                $users = [];
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $users[] = $row;
                    }
                }
                return $users;
            } catch (Exception $e) {
                return [];
            }
        }
    }
    ?>