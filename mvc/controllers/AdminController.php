<?php
class AdminController extends Controller
{

    public function default()
    {
        $database = $this->model("Product");
        $products = $database->products();

        $this->view("Admin", [
            "Page" => "ProductManagement",
            "products" => $products,
        ]);
    }

    public function user_anagement()
    {
        // $database = $this->model("Admin");
        // $data = $database->getAllUsers();

        $this->view("Admin", [
            "Page" => "UserManagement",
            // "data" => $data
        ]);
    }

    public function AddProduct()
    {
        if (isset($_POST)) {
            $category_id = $_POST['category_id'];
            $product_name = $_POST['product_name'];
            $price = $_POST['price'];
            $stock = $_POST['stock'];

            // print_r($category_id);
            // $image_url = $_POST['image_url'];

            $database = $this->model("Admin");
            $query = $database->AddProduct($category_id, $product_name, $price, $stock);

            print_r($query);

            // header("Location: /Flash_Shop/Admin/");
        }
    }
    // public function ProductManagement()
    // {
    //     $productModel = $this->model('ProductModel');
    //     $products = $productModel->products();

    //     $this->view('Admin/ProductManagementView', [
    //         'products' => $products
    //     ]);
    // }

    public function dasboard () {
        $this->view("Admin", [
            "Page" => "Dasboard"
        ]); 
    }
}
