<?php
class Product_Controller extends Controller
{
    public function show()
    {

        $this->view("Master", [
            "Page" => "Product"
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
}
