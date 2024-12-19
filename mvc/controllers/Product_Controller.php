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

    public function ProductDetail($id)
    {
        $product_model = $this->model("Product");

        $proDetail_data = $product_model->get_proDetail_data($id);

        $this->view("master", [
            "Page" => "ProductDetail",
            "proDetail_data" => $proDetail_data
        ]);
    }
}
