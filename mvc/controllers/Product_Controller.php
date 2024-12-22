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
    //loc san pham 
    public function getFilteredProducts ($data) {
        $name = $data['Product_Name'];
        $price = $data['filter-price'];
        $categories = $data['filter-categories'];
        if ($name &&  $price && $categories) {
             return $this->Product_Model->getFilteredProducts($name, $price, $categories);
        } elseif ($name && $categories && !$price) {
             return $this->Product_Model->getProductsByCategories($name, $categories);
        } elseif ($name && $price) {
             return $this->Product_Model->getProductsByPrice($name, $price);
        } elseif ($price && $categories) {
             return $this->Product_Model->getProductsByPriceCategories ($price, $categories);
        } elseif ($name) {
             return $this->Product_Model->getProductsByName ($name);
        }else {
             return $this->Product_Model->getProducts();
        }
     }
    }
