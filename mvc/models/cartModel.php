<?php 
    class CartModel extends Database{

        public $cart_id;
        public $user_id;
        public $product_id;
        public $status;
        public $value;
        
    //====================================> construct ()
        public function __construct() {
            parent::__construct();
        }

    //====================================> cart () Lấy thông tin giỏ hàng
        public function cart () {

            if(isset($this->conn)) {
                $this->sql = " SELECT 

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

                categories.Category_Id,

                FROM Cart
                -- JOIN products ON Cart.Product_Id = products.Product_Id
                JOIN CartItem ON Cart.Cart_Id = CartItem.Cart_Id
                JOIN products ON CartItem.Product_Id = products.Product_Id
                JOIN categories ON products.Category_Id = categories.Category_Id
                WHERE Cart.Cart_Id = ? AND User_Id = ?";

                $this->prepare();
                $this->stmt->bind_param("ii", $this->cart_id, $this->user_id);
                $this->execute();

                $this->fetch_assoc();

                return $this->data;
            } else {
                return false;
            }
            // viết câu lệnh truy vấn tất cả các product có trong cart-Item
        }

    //====================================> add_new_cart () Thêm giỏ hàng mới
        public function add_new_cart () {
            if(isset($this->conn)) {
                $this->sql = "INSERT INTO cart (User_Id) VALUES (?)";

                $this->prepare();
                $this->stmt->bind_param("i", $this->user_id);
                $this->execute();

                if ($this->stmt->insert_id) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }

    //====================================> update_cart () Cập nhật giỏ hàng
        public function update_status () {
            if(isset($this->conn)) {
            $$this->sql = "UPDATE cart SET Status = ? WHERE Cart_Id = ?";
            
            $this->prepare();
            $this->stmt->bind_param("ii", $this->status, $this->cart_id);
            $this->execute();

            if ($this->stmt->affected_rows) {
                return true;
            } else {
                return false;
            }
            } else {
                return false;
            }
        }

    //====================================> cart_item_exits () Kiểm tra sản phẩm đã tồn tại trong giỏ hàng chưa
        public function cart_item_exits () {
            if(isset($this->conn)) {
                $this->sql = "SELECT * FROM Cart WHERE User_Id = ? AND Cart_Id = ? ";

                $this->prepare();
                $this->stmt->bind_param("ii", $this->user_id, $this->cart_id);
                $this->execute();

                $this->fetch_assoc();

                if ($this->stmt->num_rows()) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
    
    //====================================> add_cart_item () Thêm sản phẩm vào giỏ hàng
        public function cart_items() {
            
            if (isset($this->conn)) {
                $this->sql = "SELECT * FROM CartItem WHERE Cart_Id = ?";

                $this->prepare();
                $this->stmt->bind_param("i", $this->cart_id);
                $this->execute();

                $this->fetch_assoc();

                return $this->data;
            } else {
                return false;
            }
        }

    //====================================> add_cart_item () Thêm sản phẩm vào giỏ hàng
        public function add_cart_item () {
        
            if(isset($this->conn)) {
                $this->sql = "INSERT INTO CartItem (Cart_Id, Product_Id, Quantity, Price)
                VALUES (?, ?, 1, ?)";
                
                $this->prepare();
                $this->stmt->bind_param("iii", $this->cart_id, $this->product_id, $this->price);
                $this->execute();
            
                if ($this->stmt->insert_id) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }

    //====================================> update_cart_item () Cập nhật số lượng sản phẩm trong giỏ hàng
        public function update_cart_item() {
            if (isset($this->conn)) {
                $this->sql = "UPDATE CartItem SET Quantity = Quantity + ? WHERE Product_Id = ? AND Cart_Id = ?";
                
                $this->prepare();
                $this->stmt->bind_param("iii", $this->value, $this->product_id, $this->cart_id);
                $this->execute();

                if ($this->stmt->affected_rows) {
                    return true;
                } else {
                    return false;
                }

            } else {
                return false;
            }
        }
    //====================================> remove_cart_item ()
        public function remove_cart_item () {
            if(isset($this->conn)) {
                $this->sql = "DELETE FROM CartItem WHERE Product_Id = ? AND Cart_Id = ?";

                $this->prepare();
                $this->stmt->bind_param("ii", $this->product_id, $this->cart_id);
                $this->execute();

                if ($this->stmt->affected_rows) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }        
        }
    }

