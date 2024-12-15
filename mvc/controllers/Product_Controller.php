<?php
    class Product_Controller extends Controller {
        public function show () {
            
        }

        public function ProductDetail () {
            $product_model = $this->model("Product");

            $proDetail_data = $product_model->get_proDetail_data();
            
            $this->view("Master", [
                "page" => "ProducDetail",
                "proDeil_data" => $proDetail_data
            ]);
        }
    }
?>