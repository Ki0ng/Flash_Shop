<?php 
    class CartModel extends Database{

        public $cart_id;
        public $user_id;
        public $product_id;
        public $price;
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

                CartItem.Cart_Id AS cart_id,
                CartItem.Product_Id AS product_id,
                CartItem.Quantity AS quantity,
                CartItem.Price AS price,

                Cart.User_Id AS user_id,
                Cart.Cart_Id AS cart_id,
                Cart.Total_Price AS total_price,
                Cart.Total_Quantity AS total_quantity,

                products.Product_Name AS product_name,
                products.Product_Id AS product_id,
                products.Category_Id AS category_id,
                products.Old_Price AS old_price, 
                products.New_Price AS new_price,
                products.Stock AS stock,
                products.Image_URL AS image_url,

                categories.Category_Id AS category_id

                FROM Cart
                -- JOIN products ON Cart.Product_Id = products.Product_Id
                JOIN CartItem ON Cart.Cart_Id = CartItem.Cart_Id
                JOIN products ON CartItem.Product_Id = products.Product_Id
                JOIN categories ON products.Category_Id = categories.Category_Id
                WHERE Cart.Cart_Id = ?";

                $this->prepare();
                $this->stmt->bind_param("i", $this->cart_id);
                $this->execute();

                $this->fetch_assoc();

                return $this->data;
            } else {
                return false;
            }
            // viết câu lệnh truy vấn tất cả các product có trong cart-Item
        }

    //====================================> cart_id_pendding () Lấy cart_id của giỏ hàng đang chờ xử lý
        public function cart_id_pendding () {
            if(isset($this->conn)) {
                $this->sql = "SELECT Cart_Id AS cart_id FROM Cart WHERE User_Id = ? AND Status = 'pending'";

                $this->prepare();
                $this->stmt->bind_param("i", $this->user_id);
                $this->execute();

                $this->fetch_assoc();

                return $this->data;
            } else {
                return false;
            }
        }

    //====================================> add_new_cart () Thêm giỏ hàng mới
        public function add_new_cart () {
            if(isset($this->conn)) {
                $this->sql = "INSERT INTO cart (User_Id, Status) VALUES (?, 'pending')";

                $this->prepare();
                $this->stmt->bind_param("i", $this->user_id);
                $this->execute();

                if ($this->stmt->insert_id) {
                    return $this->stmt->insert_id;
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
                $this->sql = "SELECT * FROM Cart 
                
                JOIN CartItem ON CartItem.Cart_Id = Cart.Cart_Id
                
                WHERE User_Id = ? AND Cart.Cart_Id = ? AND Product_Id = ?";

                $this->prepare();
                $this->stmt->bind_param("iii", $this->user_id, $this->cart_id, $this->product_id);
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

