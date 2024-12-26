<?php 
 class CartController extends Controller{
    public function Default($cart_id){ /* Cart */

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
 }
?>