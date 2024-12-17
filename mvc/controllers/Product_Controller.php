<?php
class Product_Controller extends Controller
{
    public function show()
    {

        $product_model = $this->model("Product");
        $product_data = $product_model->get_product_data();

        $this->view("Master", [
            "Page" => "Product",
            "product_data" => $product_data
        ]);
    }

    public function ProductDetail()
    {
        $product_model = $this->model("Product");

        $proDetail_data = $product_model->get_proDetail_data();

        $this->view("Master", [
            "Page" => "ProductDetail",
            "proDetail_data" => $proDetail_data
        ]);
    }
    // hàm lọc sản phẩm
    
}
