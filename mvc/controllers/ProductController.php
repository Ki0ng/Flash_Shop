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
}
