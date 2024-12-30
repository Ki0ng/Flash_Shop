<?php
class ProductController extends Controller
{
    public function Default()
    {

        $database = $this->model("Product");
        $data = $database->products();
        $categories = $database->getCategory();

        $this->view("User", [
            "Page" => "Product/Products",
            "data" => $data,
            "categories" => $categories
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

    public function search () {

        $get = $this->methodGet();

        $character = $get["search"];
        $database = $this->model(("Product"));
        $data = $database->search($character);      
        $categories = $database->getCategory();

        $this->view("User", [
            "Page" => "Product/Products",
            "data" => $data,
            "categories" => $categories
        ]);
    }
}
