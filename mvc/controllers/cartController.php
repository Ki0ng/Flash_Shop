<?php 
// Tạo đối tượng model và controller
    class CartController extends Controller{

    //====================================> construct ()
        public function __construct() {
            parent::__construct("Cart");

            
        }
    //====================================> default ()
        public function default() {

            $this->add_new_cart();

            $this->call_model->cart_id = $_SESSION["cart_id"];

            $this->data = $this->call_model->cart();


            $this->view("User", [
                "Page" => "User/Cart",
                "data" => $this->data
            ]);
        }
    //====================================> add_new_cart () Thêm giỏ hàng mới nếu chưa có và lấy cart_id
        protected function add_new_cart() {
            if (isset($_SESSION["user_id"])) {

                $this->call_model->user_id = $_SESSION["user_id"];
                
                if($this->call_model->connect_database) {

                    if($this->call_model->cart_id_pendding()) {

                        $_SESSION["cart_id"] = $this->call_model->cart_id_pendding()[0]["cart_id"];

                    }   else

                        $_SESSION["cart_id"] = $this->call_model->add_new_cart();
                } else {
                    $this->error("CAN NOT CONNECT TO DATABASE");
                }
            } else {
                header("location: /Flash_shop/User/login");
            }
        }

    //====================================> add_to_cart () Thêm sản phẩm vào giỏ
        public function add_to_cart() {

            if (isset($this->call_get["product_id"])) {

                $this->call_model->cart_id = $_SESSION["cart_id"];
                $this->call_model->product_id = $this->call_get["product_id"];
                $this->call_model->price = $this->call_get["price"];
                $this->call_model->value = $this->call_get["value"];

                if($this->call_model->connect_database) {

                    if($this->call_model->cart_item_exits()) {

                        $this->call_model->update_cart_item();
                    } else {

                        $this->call_model->add_cart_item();
                    }

                    print_r($this->call_model->cart_item_exits());
                } else {

                    $this->error("CAN NOT CONNECT TO DATABASE");
                }

                header("location: /Flash_shop/Cart");
            }
        }
    //====================================> update_cart_item () Cập nhật số lượng sản phẩm trong giỏ
        public function update_cart_item() {
            if (isset($this->call_get["product_id"]) && isset($this->call_get["value"])) {

                $this->call_model->cart_id = $_SESSION["cart_id"];
                $this->call_model->product_id = $this->call_get["product_id"];
                $this->call_model->value = $this->call_get["value"];
                
                if ($this->call_model->connect_database) {

                    $this->call_model->update_cart_item();

                    header("location: /Flash_shop/Cart");
                } else {

                    $this->error("CAN NOT CONNECT TO DATABASE");
                }
                
                header("location: /Flash_shop/Cart");
            } else {

                $this->error("NOT ENOUGHT CONDITION TO 'UPDATE'");
            }
        }
    
    //====================================> remove_cart_item () // Xóa sản phẩm khỏi giỏ hàng
        public function remove_cart_item () {
            if (isset($this->call_get["product_id"])) {

                $this->call_model->product_id = $this->call_get["product_id"];
                $this->call_model->cart_id = $_SESSION["cart_id"];

                if ($this->call_model->connect_database) {

                    $this->call_model->remove_cart_item();

                    header("location: /Flash_shop/Cart");
                } else {

                    $this->error("CAN NOT CONNECT TO DATABASE");
                }
            } else {

                $this->error("NOT ENOUGHT CONDITION TO 'REMOVE'");
            }
        }
    }
