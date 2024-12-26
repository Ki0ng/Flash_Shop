<?php 
 class CartController extends Controller{
    public function Default($id){ /* Cart */
        // Hiển thị ở bên nào chọn model để hiển thị
        $database = $this->model('User');
        if($database){
            $data = $database->Cart();
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
        //update
        //insert
    }

 }
?>