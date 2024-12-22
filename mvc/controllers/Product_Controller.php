
<?php
class Product_Controller extends Controller
{
    public function show()
    {


        $product_model = $this->model("Product");
        $product_data = $product_model->get_product_data();

        $this->view("master", [
            "Page" => "Product",
            "product_data" => $product_data
        ]);
    }
    // product detail
    public function ProductDetail($id)
    {
        $product_model = $this->model("Product");

        $proDetail_data = $product_model->get_proDetail_data($id);

        $this->view("master", [
            "Page" => "ProductDetail",
            "proDetail_data" => $proDetail_data
        ]);
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
          // $this->show();
     }
    

     
    }
    }
    