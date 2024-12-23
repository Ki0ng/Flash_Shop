<?php
class ProductController extends Controller
{
    public function Default()
    {

        $database = $this->model("Product");
        $data = $database->products();

        $this->view("User", [
            "Page" => "Product/Products",
            "data" => $data
        ]);
    }

    public function Detail($id) {
        if (preg_match("/^[0-9]$/", $id)) {
            $database = $this->model("Product");

            $data = $database->product($id);

            $this->view("User", [
                "Page" => "Product/Detail",
                "proDetail_data" => $data
            ]);

        } else {
            $this->view("User", [
                "Page" => "User/Error",
                "data" => "THE PARAMS NOT MATCH"
            ]);
        }
    }

        //loc san pham
    public function getFilteredProducts() {

        //  $name = isset($_GET["name"]) ?  $_GET["name"] : null;                
            $price = isset($_GET["New_Price"]) ? $_GET["New_Price"] : null;                
            $category = isset($_GET["Category_Id"]) ? $_GET["Category_Id"] : null;                
    
            if($price || $category) {
                $product_model = $this->model("Product");
    
                $filter = $product_model->getFilteredProducts( $price, $category);
            
                $this->view("master", [
                    "Page" => "ProductFilter",
                    "filter"=>$filter
                ]);
            } else {
                $this->view("master", [
                    "Page" => "ProductFilter",
                    "filter"=>[ $price, $category]
                ]);
              
            }
            
        }
}
