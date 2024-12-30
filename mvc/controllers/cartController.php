<?php 
 class CartController extends Controller{
    // Quản lý session trong một phương thức riêng để tránh sự không nhất quán
    public function checkUserSession() {
        if (!isset($_SESSION['user_id'])) {
            header("location: /Flash_shop/User/Login");
            exit();
        }
        return $_SESSION['user_id'];
    }
    // Sử dụng phương thức checkUserSession() trong các phương thức khác
    public function Default($cart_id){ /* Cart */
        $user_id = $this->checkUserSession();
        if(isset($_SESSION["user_id"])) {
            $user_id = $_SESSION["user_id"];
            $database = $this->model('User');
            if($database){
                $data = $database->Cart($cart_id, $user_id);
                if($data){
                    $this->view('cart',[
                        'Page' => "views/cart",
                        'home_data'=> $data
                    ]);
                }else {
                    $this->view("User", [
                        "Page" => "User/Error",
                        "data" => "THE PARAMS NOT MATCH"
                    ]);
                }
            }
        } else {
            header("location: /Flash_shop/User/Login");
        }
        // Hiển thị ở bên nào chọn model để hiển thị
        //update
        //insert
    }     
    public function add(){
        $this->view("cart", [
            'Page' => 'views/cart'
        ]);
    }

    public function addToCart(){
        $user_id = $this->checkUserSession();
        if(!isset($_SESSION['User_id'])){
            echo json_encode(["success" => false, "message" => "Bạn cần đăng nhập để thêm sản phẩm vào giỏ hàng."]);
            return;
        }

        $user_id = $_SESSION['user_id'];
        $data = json_decode(file_get_contents("php://input"), true);
        $product_id = $data['Product_id'];
    
        $orderModel = new OrderModel();
        $orderDetailModel = new OrderDetailModel();
        $productModel = new ProductModel();
    
        $order_id = $orderModel->getPendingOrderId($user_id);
        if (!$order_id) {
            $order_id = $orderModel->createOrder($user_id);
        }
        $price = $productModel->getProductPrice($product_id);
    
        $existingProduct = $orderDetailModel->getOrderDetail($order_id, $product_id);
        
        //Kiểm tra xem trong giỏ hàng có sản phẩm hay chưa 
        if ($existingProduct) {
            $newQuantity = $existingProduct['quantity'] + 1;
            $orderDetailModel->updateQuantity($order_id, $product_id, $newQuantity);
            echo json_encode(["success" => true, "message" => "Đã cập nhật số lượng sản phẩm."]);
        } else {
            $orderDetailModel->addProductToOrder($order_id, $product_id, 1, $price);
            echo json_encode(["success" => true, "message" => "Đã thêm sản phẩm mới vào giỏ hàng."]);
        }
    }

    public function viewCart() {

        if (!isset($_SESSION['user_id'])) {
            $this->view("Cart", ["cartItems" => []]);
            return;
        }

        $user_id = $_SESSION['user_id'];

        $orderModel = new OrderModel();
        $orderDetailModel = new OrderDetailModel();

        $order_id = $orderModel->getPendingOrderId($user_id);
        $cartItems = [];
        $totalQuantity = [];
        if ($order_id) {
            $cartItems = $orderDetailModel->getOrderDetails($order_id);
            $totalQuantity = $orderDetailModel->getTotalQuantityCart($order_id);
        }
        $this->view("Cart", ["cartItems" => $cartItems, "totalQuantity" => $totalQuantity]);
    }
 }
?>