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

    public function ProductManagement()
    {
        $productModel = $this->model('ProductModel');
        $products = $productModel->products();

        $this->view('Admin/ProductManagementView', [
            'products' => $products
        ]);
    }
}
