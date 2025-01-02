<?php 
    class CartModel extends Database{

        public function test() {
            $this->CartItem(1, 1);
        }
   
        public function CartItem($cartId, $userId) {
            
            $this->getConnection(); 
            
            // viết câu lệnh truy vấn tất cả các product có trong cart-Item 
            $sql = " SELECT 

                CartItem.Cart_Id,
                CartItem.Product_Id,

                Cart.User_Id,
                Cart.Cart_Id,
                Cart.Total_Price,
                Cart.Total_Quantity,

                products.Product_Name,
                products.Product_Id,
                products.Category_Id,
                products.Old_Price, 
                products.New_Price,
                products.Stock,
                products.Image_URL

                FROM Cart
                -- JOIN products ON Cart.Product_Id = products.Product_Id
                JOIN CartItem ON Cart.Cart_Id = CartItem.Cart_Id
                JOIN products ON CartItem.Product_Id = products.Product_Id
                WHERE Cart.Cart_Id = ?";
                
                
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("i", $cartId);
            $stmt->execute();
            print($stmt->error);
            $result = $stmt->get_result();
            $cart_items = [];

            while ($row = $result->fetch_assoc()) {
                $cart_items[] = $row;
            }
            return $cart_items;
        }

        public function createCart ($userId) {
            $this->getConnection();
            $query = "INSERT INTO cart(User_Id) VALUES (?)";
            $sql = $this->conn->prepare($query);
            $sql ->bind_param("i",$userId);
            if($sql->execute()) {
                return true;
            } else {
                return false;
            }
        }
        // public function updateCartQuantityPrice ( $cartId, /* ? */) {
        //     // ?
        // }

        public function updateCartStatus ($cartId/* ? */) {
            $this->getConnection();
            $query = "UPDATE cart SET Status = ?";
            $sql = $this->conn->prepare($query);
            $sql ->bind_param("i",$cartId);
            if($sql->execute()){
                return true;
            }
                return false;
        }

        
    // Lấy thông tin giỏ hàng của người dùng
    public function getCartByUserId($userId, $cartId) {
        $this->getConnection();
        $query = "SELECT * FROM Cart WHERE User_Id = ? AND Cart_Id = ? ";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ii", $userId, $cartId);  // 'i' cho integer
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();  // Trả về dữ liệu dưới dạng mảng kết hợp
    }
    
    // Lấy các sản phẩm trong giỏ hàng
    public function getCartItems($cartId) {
        $query = "SELECT p.Product_Name, ci.Quantity, ci.Total_Quantity, ci.Price, ci.Total_Price, ci.CartItem_Id
                  FROM CartItem ci
                  JOIN products p ON ci.Product_Id = p.Product_Id
                  JOIN cart c ON c.Cart_Id = ci.Cart_Id 
                  WHERE ci.Cart_Id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $cartId);  // 'i' cho integer
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);  // Trả về kết quả dưới dạng mảng kết hợp
    }
    
    // Thêm sản phẩm vào giỏ hàng
    public function addProductToCart($cartId, $productId, $quantity, $price) {
        $query = "INSERT INTO CartItem (Cart_Id, Product_Id, Quantity, Price)
                  VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("iiii", $cartId, $productId, $quantity, $price);
        $stmt->execute();
        // $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return true;
    }
    // Cập nhật số lượng sản phẩm trong giỏ
    public function updateCartItem($product_id, $quantity, $card_id) {
        $query = "UPDATE CartItem SET Quantity = ? WHERE Product_Id = ? AND Cart_Id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("iii", $quantity, $product_id, $card_id);  // 'i' cho integer
        $stmt->execute();
        return true;
    }
 
    public function removeProductFromCart($product_id, $cart_id) {
        // Kiểm tra trước khi xóa
        $checkQuery = "SELECT * FROM CartItem WHERE Product_Id = ? AND Cart_Id = ?";
        $stmtCheck = $this->conn->prepare($checkQuery);
        $stmtCheck->bind_param("ii", $product_id, $cart_id);
        $stmtCheck->execute();
        $result = $stmtCheck->get_result();
        
        if ($result->num_rows > 0) {
            // Nếu tồn tại sản phẩm, thực hiện xóa
            $query = "DELETE FROM CartItem WHERE Product_Id = ? AND Cart_Id = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param("ii", $product_id, $cart_id);
            $stmt->execute();
            return true;
        }
        return false;  // Trả về false nếu không tìm thấy sản phẩm trong giỏ
    }
    
    }
?>

