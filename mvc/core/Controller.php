<?php
    class Controller {

        protected $call_get;
        protected $call_model;
        protected $data;

        public function __construct($model) {
            $this->method_get();
            $this->call_model = $this->model($model);
            $this->data = [];
        }


        //call file model php to get data
        public function model($model){
            if (file_exists("./mvc/models/". $model ."Model.php")) {
                require_once "./mvc/models/". $model ."Model.php";
                return new ($model."Model");
            } else {
                return false;
            }
        }

        //call file view php to show data from model
        public function view ($view, $data=[]) {
            require_once "./mvc/views/".$view.".php";
        }

        private function method_get () {
            $this->call_get = [];
            $url = $_SERVER["REQUEST_URI"];
            $process = explode(	"?", $url);
            $get = "";
            for( $i = 0; $i < count($process); $i++ ) {
                if ($i > 0) {
                    $get .= $process[$i];
                }
            }
            parse_str($get, $this->call_get);
        }

        public function error ($data) {
            $this->view("User", [
                "Page" => "User/Error",
                "data" => $data
            ]);
        }
        
        public function Cart($array){
            $array = [];
            if(isset($_SESSION['cart']))
            {
                if(array_key_exists($array['Product_Id'],$_SESSION['cart'])){
                    $_SESSION['cart'][$array['Product_Id']]['Quantity'] +=1;
                }
                else
                {
                    $_SESSION['cart'][$array['Product_Id']] = $array;
                    $_SESSION['cart'][$array['Product_Id']]['Quantity'] +=1;

                }
            }
            else
            {
                $_SESSION['cart'][$array['Product_Id']] = $array;
                $_SESSION['cart'][$array['Product_Id']]['Quantity'] +=1;
            }
            $array = $_SESSION['cart'];
            return $array;
        }
    }
    
?>