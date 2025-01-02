<?php 
// Tạo đối tượng model và controller
    class CartController extends Controller{
        public function Default($cart_id) {
            $_SESSION['User_Id'] = 1;    // Giả định user_id = 1
            $_SESSION['cart_session'] = 1;    // Giả định cart_id = 1    

                $user_id = $_SESSION["User_Id"];
                $cart_id = $_SESSION["cart_session"];
                $database = $this->model('Cart'); // Sửa tên model nếu cần
                if ($database) {
                    // $data = $database->CartItem($cart_id, $user_id); // Giả sử dữ liệu được lấy từ phương thức CartItem()
                    $data = $database->CartItem($cart_id, $user_id); // Giả sử dữ liệu được lấy từ phương thức CartItem()
                    if ($data) {
                        // Truyền đúng biến vào view
                        $this->view('cart', [
                            'Page' => "views/cart",
                            'home_data' => $data  // Đảm bảo truyền đúng dữ liệu
                        ]);
                    }
                }

        }
       
        private $cartModel; // undefine
        
        private $userId;

        private $cart_session;

        // public function __construct() {
        //     $this->cartModel = $this->model("Cart");
        //     $this->userId = $_SESSION ["User_Id"];
        //     $this->cart_session = $_SESSION ["cart_session"];
        // }

        // public function __construct() {
        //     // Kiểm tra sự tồn tại của khóa 'User_Id' và 'cart_session' trong $_SESSION
        //     if (isset($_SESSION["User_Id"])) {
        //         $this->userId = $_SESSION["User_Id"];
        //     } else {
        //         // Xử lý nếu không có User_Id trong session
        //         header("location: /Flash_shop/User/Login");
        //         exit();
        //     }
            
        //     if (isset($_SESSION["cart_session"])) {
        //         $this->cart_session = $_SESSION["cart_session"];
        //     } else {
        //         // Xử lý nếu không có cart_session trong session
        //         header("location: /Flash_shop/Cart");
        //         exit();
        //     }
        
        //     $this->cartModel = $this->model("Cart");
        // }

        // Thêm sản phẩm vào giỏ
        public function addToCart() {
            // $cart = $this->cartModel->getCartByUserId($this->userId, $this->cart_session);
            
            // $get = $this->methodGet();
            // $productId = $get["productId"];
            // $quantity = $get["quantity"];
            // $price = $get["price"];
            $get = $this->methodGet();
            if (isset($get["productId"]) && isset($get["quantity"]) && isset($get["price"])) {
                $productId = $get["productId"];
                $quantity = $get["quantity"];
                $price = $get["price"];
            } else {
                // Xử lý nếu các tham số không tồn tại
                header("location: /Flash_shop/Cart");
                exit();
            }
            $cart = $this->cartModel->getCartByUserId($this->userId, $this->cart_session);
            if (!$cart) {
                // Tạo giỏ hàng mới nếu chưa có
                $this->cartModel->addProductToCart($this->cart_session, $productId, $quantity, $price);
            } else {
                $this->updateCartItem($productId, $quantity, $this->cart_session);
            }
            header("location: /Flash_shop/Cart");
        }
    
        // Cập nhật số lượng sản phẩm trong giỏ
        public function updateCartItem($productId, $quantity, $cart_session) {
            $this->cartModel->updateCartItem($productId, $quantity, $cart_session);
            header("location: /Flash_shop/Cart");
        }
    
        // Xóa sản phẩm khỏi giỏ hàng
        public function removeFromCart($cartItemId) {
            $this->cartModel->removeProductFromCart($cartItemId);
            header("location: /Flash_shop/Cart");
        }
    }
?>
