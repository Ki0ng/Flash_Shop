<?php
class AdminController extends Controller
{

    public function Default()
    {
        $database = $this->model("Product");
        $products = $database->products();

        $this->view("Admin", [
            "Page" => "ProductManagement",
            "products" => $products,
        ]);
    }

    public function UserManagement()
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

            // print_r($query);

            header("Location: /Flash_Shop/Admin/");
        }
    }
 
    public function EditProduct()
    {
        if (isset($_POST)) {
            $product_id = $_POST['product_id'];
            $category_id = $_POST['category_id'];
            $product_name = $_POST['product_name'];
            $price = $_POST['price'];
            $stock = $_POST['stock'];

            $database = $this->model("Admin");
            $query = $database->EditProduct($product_id, $category_id, $product_name, $price, $stock);

            header("Location: /Flash_Shop/Admin/");
        }
    }

    public function DeleteProduct()
    {
        $product_id = $_GET['product_id'];

        $database = $this->model("Admin");
        $query = $database->DeleteProduct($product_id);

        header("Location: /Flash_Shop/Admin/");
    }
    
    public function UpdateProduct()
    {
        $productModel = $this->model('ProductModel');
        $products = $productModel->products();

        $this->view('Admin/ProductManagementView', [
            'products' => $products
        ]);
    }
    public function GetProduct() {
        $product_id = $_GET['product_id'];
        $database = $this->model("Product");
        $product = $database->product($product_id);

        $this->view("Admin", [
            "Page" => "EditProduct",
            "product" => $product
        ]);
    }

    // public function ProductManagement()
    // {
    //     $productModel = $this->model('ProductModel');
    //     $products = $productModel->products();

    //     $this->view('Admin/ProductManagementView', [
    //         'products' => $products
    //     ]);
    // }
}