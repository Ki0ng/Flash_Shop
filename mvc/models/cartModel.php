<?php 
    class CartModel extends Database{

        public function __construct() {
            $this->getConnection();
        }
            
        public function test() {
            $this->CartItem(1, 1);
        }
   
        public function CartItem($cartId, $userId) {
            
            
            // viết câu lệnh truy vấn tất cả các product có trong cart-Item 
            $sql = " SELECT 

                CartItem.Cart_Id,
                CartItem.Product_Id,
                CartItem.Quantity,
                CartItem.Price,

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
                WHERE Cart.Cart_Id = ? AND User_Id = ?";
                
                
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("ii", $cartId, $userId);
            $stmt->execute();
            $result = $stmt->get_result();
            $cart_items = [];

            while ($row = $result->fetch_assoc()) {
                $cart_items[] = $row;
            }
            return $cart_items;
        }

        public function createCart ($userId) {
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
        $query = "SELECT * FROM Cart WHERE User_Id = ? AND Cart_Id = ? ";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ii", $userId, $cartId);  // 'i' cho integer
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();  // Trả về dữ liệu dưới dạng mảng kết hợp
    }
    
    // Lấy các sản phẩm trong giỏ hàng
    public function getCartItems($productId, $cartId) {
        $query = "SELECT * FROM CartItem WHERE Product_Id = ? AND Cart_Id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ii", $productId, $cartId);  // 'i' cho integer
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();  // Trả về kết quả dưới dạng mảng kết hợp
    }
    
    // Thêm sản phẩm vào giỏ hàng
    public function addProductToCart($cartId, $productId, $price) {
        $query = "INSERT INTO CartItem (Cart_Id, Product_Id, Quantity, Price)
                  VALUES (?, ?, 1 , ?) ";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("iii", $cartId, $productId, $price);
        $stmt->execute();
    }

    // Cập nhật số lượng sản phẩm trong giỏ
    public function updateCartItem($product_id, $card_id, $value) {
        $query = "UPDATE CartItem SET Quantity = Quantity + ? WHERE Product_Id = ? AND Cart_Id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("iii", $value, $product_id, $card_id);  // 'i' cho integer
        $stmt->execute();
    }
 
        public function removeProductFromCart($product_id , $cart_id) {
            $query = "DELETE FROM CartItem WHERE Product_Id = ? AND Cart_Id = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param("ii", $product_id, $cart_id);
            $stmt->execute();
        }
    }
?>

