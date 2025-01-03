<?php 
// Tạo đối tượng model và controller
    class CartController extends Controller{
            public function Default() {

            $database = $this->model('Cart'); // Sửa tên model nếu cần
            if ($database) {
                $data = $database->CartItem($this->cart_session, $this->userId); // Giả sử dữ liệu được lấy từ phương thức CartItem()
                // $data = $database->get_All();
                    // Truyền đúng biến vào view
                    $this->view('cart', [
                        'Page' => "views/cart",
                        'home_data' => $data  // Đảm bảo truyền đúng dữ liệu
                    ]);
            }

        }

        private $cartModel; // undefine
        
        private $userId;

        private $cart_session;

        public function __construct() {


            $_SESSION['User_Id'] = 2;    // Giả định user_id = 1
            $_SESSION['cart_session'] = 2;    // Giả định cart_id = 1    

            $this->userId = $_SESSION["User_Id"];
            $this->cart_session = $_SESSION["cart_session"];
            $this->cartModel = $this->model("Cart");
        }
        // Thêm sản phẩm vào giỏ
        public function addToCart() {
  
            $get = $this->methodGet();
            // $get[] = $_GET[]
            if (isset($get["product_id"]) ) {
                $productId = $get["product_id"];
                $price = $get["price"];

                $cart = $this->cartModel->getCartItems($productId, $this->cart_session);

                if (!$cart) {
                    // Tạo giỏ hàng mới nếu chưa có
                    $this->cartModel->addProductToCart($this->cart_session, $productId, $price);
                } else {
                    $this->updateCartItem();
                }
                header("location: /Flash_shop/Cart");
            }
        }
    
        // Cập nhật số lượng sản phẩm trong giỏ -- done --
        public function updateCartItem() {
            $get = $this->methodGet();
            $productId = isset($get["product_id"]) ? $get["product_id"] : -1;
            $value = isset($get["value"]) ? $get["value"] : 0;
            
            $this->cartModel->updateCartItem($productId, $this->cart_session, $value);
            header("location: /Flash_shop/Cart");
        }
    
        // Xóa sản phẩm khỏi giỏ hàng  -- done --
        public function removeFromCart() {
            $get = $this->methodGet();
            if (isset($get["product_id"])) {    
                $product_id = $get["product_id"];
                $a = $this->cartModel->removeProductFromCart($product_id, $this->cart_session);
                header("location: /Flash_shop/Cart");    
            
            }
        }
    }
?>
