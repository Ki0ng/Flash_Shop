<?php 
    class CartController extends Controller{
        public function Default($cart_id){ /* Cart */
            if(isset($_SESSION["User_Id"])) {
                $user_id = $_SESSION["User_Id"];
                $database = $this->model('Users');
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

        public function Cart($array){
            $array = [];
            if (isset($_SESSION['Cart'])){
                if (array_key_exists($array['Product_Id'],$_SESSION['Cart'])){
                    $_SESSION['Cart'][$array['Product_Id']] = $array;
                    $_SESSION['Cart'][$array['Product_Id']]['Quantity'] = 1;
                }
            }
            else{
                $_SESSION['Cart'][$array['Product_Id']] = $array;
                $_SESSION['Cart'][$array['Product_Id']]['Quantity'] = 1;
            }
            $array = $_SESSION['Cart'];
            return $array;
        }
        public function addToCart(){
            // echo "<pre>";
            // print_r($_POST);
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $product =$this->model('Product')->select_row('*', ['Product_Id' => $_POST['slug']]);
                $array = [
                    'Product_Name'  => $product['Product_Name'],
                    'Product_Id'    => $product['Product_Id'],
                    'Image_URL'     => $product['Image_URL'],
                    'New_Price'     => $product['New_Price'],
                    'Quantity'      => $_POST['Quantity'] ? $_POST['Quantity'] : 1,
                ];
            }
        }
        
    }
?>